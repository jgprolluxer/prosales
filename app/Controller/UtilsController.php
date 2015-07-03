<?php

App::uses('AppController', 'Controller');

/**
 * Dashboards Controller
 *
 * @property Dashboard $Dashboard
 */
class UtilsController extends AppController {

    var $name = 'Dashboards';
    var $uses = null; //declare that this controller has no model
    var $layout = 'default';
    
    public function index()
    {
        
    }
    
		public function queryModel()
		{
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->layout = 'ajax';
        
			$response = array();

			try{
					$objParams = array();
					$objParams = json_decode($this->request->query["params"], true);
				
					$dyn_model = $objParams["dyn_model"];
					$typeSearch = $objParams["type_search"];
					$searchOptions =  $objParams["search_options"];

					$this->loadModel($dyn_model);
					$elData = $this->$dyn_model->find($typeSearch, $searchOptions);
				    $response = array(
                        'success' => true,
                        'message' => __('OK'),
                        'xData' => $elData
                    );

			}catch(Exception $ex)
			{
			    $response = array(
                    'success' => false,
                    'message' => $ex->getMessage(),
                    'xData' => array()
                );
                
			}

			echo json_encode($response);
		}
}