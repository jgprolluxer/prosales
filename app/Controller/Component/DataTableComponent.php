<?php

/**
 * This component provides compatibility between the dataTables jQuery plugin and CakePHP 2
 * @author chris
 * @package DataTableComponent
 * @link http://www.datatables.net/release-datatables/examples/server_side/server_side.html parts of code borrowed from dataTables example
 */
class DataTableComponent extends Component{
    
    private $model;
    private $controller;
    public $conditionsByValidate = 0;
    public $emptyElements = 0;
    public $fields = array();
    public $filterFields = array();
    public $columnsStyle = array();
    public $showActions = array();
    
    public function initialize(Controller $controller){
        $this->controller = $controller;
        $modelName = $this->controller->modelClass;
        $this->model = $this->controller->{$modelName};
    }
    
/**
 * returns dataTables compatible array - just json_encode the resulting aray
 * @param object $controller optional
 * @param object $model optional
 * @return array
 */
    public function getResponse($controller = null, $model=null){
        
        /**
         * it is no longer necessary to pass in a controller or model
         * this is handled in the initialize method
         * $controller is disregarded.
         * $model is only necessary if you are using a model from a different controller such as if you are in 
         * a CustomerController but your method is displaying data from an OrdersModel.
         */
        
        if($model != null){  
            if(is_string($model)){
                $this->model = $this->controller->{$model};
            }
            else{
                $this->model = $model;
                unset($model);
            }
        }

        $conditions = isset($this->controller->paginate['conditions']) ? $this->controller->paginate['conditions'] : null;

        $isFiltered = false;
        
        if( !empty($conditions) ){
            $isFiltered = true;
        }
        
        // check for ORDER BY in GET request
        if(isset($this->controller->request->query) && isset($this->controller->request->query['iSortCol_0'])){
            $orderBy = $this->getOrderByStatements();
            if(!empty($orderBy)){
                $this->controller->paginate = array_merge($this->controller->paginate, array('order'=>$orderBy));
            }
        }
        
        // check for WHERE statement in GET request
        if(isset($this->controller->request->query) && !empty($this->controller->request->query['sSearch'])){
            $conditions = $this->getWhereConditions();

            if( !empty($this->controller->paginate['contain']) ){
                $this->controller->paginate = array_merge_recursive($this->controller->paginate, array('contain'=>$conditions));
            }
            else{
                $this->controller->paginate = array_merge_recursive($this->controller->paginate, array('conditions'=>$conditions));
            }
            $isFiltered = true;
        }
        
        // @todo avoid multiple queries for finding count, maybe look into "SQL CALC FOUND ROWS"
        // get full count
        $total = $this->model->find('count');
        
        $parameters = $this->controller->paginate;
        
        if($isFiltered){
            $filteredTotal = $this->model->find('count',$parameters);
        }
        
        $limit = '';
        
        // set sql limits
        if( isset($this->controller->request->query['iDisplayStart']) && $this->controller->request->query['iDisplayLength'] != '-1' ){
            $start = $this->controller->request->query['iDisplayStart'];
            $length = $this->controller->request->query['iDisplayLength'];
            $parameters['limit'] = $limit = "$start,$length";
        }

        
        // execute sql select
        //debug($parameters);
        $data = $this->model->find('all', $parameters);
        
        //debug($data);

        // dataTables compatible array
        $response = array(
            'sEcho' => isset($this->controller->request->query['sEcho']) ? intval($this->controller->request->query['sEcho']) : 1,
            'iTotalRecords' => $total,
        	//'bRender' => true,
            'iTotalDisplayRecords' => $isFiltered === true ? $filteredTotal : $total,
            'aaData' => array(),
        );
	
        // return data
        if(!$data){
            return $response;
        }
        else{
        	// failsafe for null records...
        	if(($data[0][$this->model->name]["id"] == null)) {
        		return $response;
        	}
        	
			$count=0;
            foreach($data as $i){
                $tmp = $this->getDataRecursively($i);

                if($this->emptyElements > 0){
                    $tmp = array_pad($tmp,count($tmp)+$this->emptyElements,'');
                }
                $response['aaData'][$count] = array_values($tmp);         
          	
                if(!empty($this->showActions)){

                	$view = new View($this->controller);
                	$html = $view->loadHelper('Html');
           
                	$id = $response['aaData'][$count][$this->showActions["idCol"]];
                	
                	$actions  ="";
                	if(!empty($this->showActions["oppty"])){
                		$actions = $actions . $html->link('<i></i>', array('controller'=>'quotes','action' => 'add', "0", "0", $id, "0" ), array('escape' => false, 'class'=>'glyphicons coins qtips','data-title'=>'Generar Cotizacion'));
                	}
                	
                	if(!empty($this->showActions["quote"])){
                            $actions = $actions . $html->link('<i></i>', array('controller'=>'Orders','action' => 'add', "0", "0", $id, "Quote" ), array('escape' => false, 'class'=>'glyphicons shopping_cart qtips','data-title'=>'Generar Pedido'));
                		$actions = $actions . $html->link('<i></i>', array('controller'=>'quotes','action' => 'viewPdf', $id ), array('escape' => false, 'class'=>'glyphicons file qtips','data-title'=>'Generar PDF', 'target' => '_blank'));
                	}     
                	
                	if(!empty($this->showActions["order"])){
                		$actions = $actions . $html->link('<i></i>', array('controller'=>'invoices','action' => 'add', "0", $id ), array('escape' => false, 'class'=>'glyphicons usd qtips','data-title'=>'Generar Factura'));
                	}
                	//$actions = $actions . $html->link('<i></i>', array('action' => 'edit', $id ), array('escape' => false, 'class'=>'glyphicons pencil qtips','data-title'=>'Editar'));
                	$actions = $actions . $html->link('<i></i>', array('action' => 'delete', $id), array('escape' => false,'class'=>'glyphicons bin qtips','data-title'=>'Cancelar'), __('Estas seguro de cancelar el registro # %s?', $id));
                	
                	$response['aaData'][$count][] = $actions;
               	}
               
                if($this->columnsStyle){
                	foreach($this->columnsStyle as $c){

                		$response['aaData'][$count]['style'] = $c;
                	}
                
                }
                $count++;
            }
            

        }

        return $response;
    }
    
/**
 * returns sql order by string after converting dataTables GET request into Cake style order by
 * @param void
 * @return string
 */
    private function getOrderByStatements(){
        
        if( !isset($this->controller->paginate['fields']) && !empty($this->controller->paginate['contain']) && empty($this->fields) ){
            throw new Exception("Missing field and/or contain option in Paginate. Please set the fields so I know what to order by.");
        }
        
        $orderBy = '';

        if(!empty($this->filterFields)) {
        	$fields = $this->filterFields;
        }
        else {
        	$fields = !empty($this->fields) ? $this->fields : $this->controller->paginate['fields'];
        }
        
        
        // loop through sorting columbns in GET
        //for ( $i=0 ; $i<intval( $this->controller->request->query['iSortingCols'] ) ; $i++ ){
            // if column is found in paginate fields list then add to $orderBy
            if( !empty($fields) && isset($this->controller->request->query['iSortCol_0']) ){
                $direction = $this->controller->request->query['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
                $orderBy =  $fields[ $this->controller->request->query['iSortCol_0'] ] .' '.$direction.', ';
                
            }
        //}
        
        if(!empty($orderBy)){
            return substr($orderBy,0, -2);
        }
        
        return $orderBy;
    }

/**
 * returns sql conditions array after converting dataTables GET request into Cake style conditions
 * will only search on fields with bSearchable set to true (which is the default value for bSearchable)
 * @param void
 * @return array
 */
    private function getWhereConditions(){
        
        if( !isset($this->controller->paginate['fields']) && empty($this->fields) ){
            throw new Exception("Field list is not set. Please set the fields so I know how to build where statement.");
        }
        
        $conditions = array();
		
        if(!empty($this->filterFields)) {
        	$fields = $this->filterFields;
        }
        else {	
        	$fields = !empty($this->fields) ? $this->fields : $this->controller->paginate['fields'];
        }
        
        foreach($fields as $x => $column){
            
            // only create conditions on bSearchable fields
            if( $this->controller->request->query['bSearchable_'.$x] == 'true' ){

                list($table, $field) = explode('.', $column);
                
                // attempt using definitions in $model->validate to build intelligent conditions
                if( $this->conditionsByValidate == 1 && array_key_exists($column,$this->model->validate) ){

                    if( !empty($this->controller->paginate['contain']) ){
                        if(array_key_exists($table, $this->controller->paginate['contain']) && in_array($field, $this->controller->paginate['contain'][$table]['fields'])){
                            $conditions[$table]['conditions'][] = $this->conditionByDataType($column);
                        }
                    }
                    else{
                        $conditions['OR'][] = $this->conditionByDataType($column);
                    }
                }
                else{
                    
                    if( !empty($this->controller->paginate['contain']) ){

                        if(array_key_exists($table, $this->controller->paginate['contain']) && in_array($field, $this->controller->paginate['contain'][$table]['fields'])){
                            $conditions[$table]['conditions'][] = $column.' LIKE "%'.$this->controller->request->query['sSearch'].'%"';
                        }
                    }
                    else{
                        $conditions['OR'][] = array(
                            $column.' LIKE' => '%'.$this->controller->request->query['sSearch'].'%'
                        );
                    }
                }
            }
        }
        return $conditions;
    }
    
/**
 * looks through the models validate array to determine to create conditions based on datatype, returns condition array. 
 * to enable this set $this->DataTable->conditionsByValidate = 1.
 * @param string $field
 * @return array
 */    
    private function conditionByDataType($field){
        foreach($this->model->validate[$field] as $rule => $j){
            switch($rule){
                case 'boolean':
                case 'numeric':
                case 'naturalNumber':
                    $condition = array($field => $this->controller->request->query['sSearch']);
                    break;
            }
        }
        return $condition;
    }
    
/**
 * finds data recursively and returns a flattened key => value pair array 
 * second parameter is not required and only used in callbacks to self
 * @param array $data
 * @param string $key
 * @return array
 */
    private function getDataRecursively($data,$key=null){
        $fields = array();

        // note: the chr() function is used to produce the arrays index to make sorting via ksort() easier.
       //debug($data);
        // loop through cake query result
        foreach($data as $x => $i){
            // go recursive
            if(is_array($i)){
                if(!array_key_exists($x,$this->model->hasMany)){
                	
                	$chfields = $this->getDataRecursively($i,$x);
                	$fields = array_merge($fields,$chfields);
                }
            }
            // check if component was given fields explicitely
            else if( !empty($this->fields) ){
                if(in_array("$key.$x", $this->fields)){
                    $index = array_search("$key.$x",$this->fields);
                    //echo "$key.$x = $index = $i \n";
                    // index needs to be a string so array_merge handles it properly
                    $fields[chr($index)] = "$i";
                }
                else{
                    //echo "$key.$x (NOT FOUND) \n";
                }
            }
            // dimension is not multi-dimensionable so add to $fields
            else if(isset($this->controller->paginate['fields'])){
                if(in_array("$key.$x", $this->controller->paginate['fields'])){
                    $index = array_search("$key.$x", $this->controller->paginate['fields']);
                    // index needs to be a string so array_merge handles it properly
                    $fields[chr($index)] = "$i";
                }
            }
            // will try to include all results but this will likely not work for you
            else{
                $fields["$key.$x "] = "$i";
            }
        }
        ksort($fields);
        //debug($fields);
        return $fields;
    }
        
}