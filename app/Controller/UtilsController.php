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
    
		public function queryModel($params = null )
		{
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->layout = 'ajax';
        
			$response = array();

			try{
					$objParams = array();

				if($params)
				{
					$objParams = json_decode($params, true);

					$this->log('objParams');
					$this->log($objParams);
				
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
				}

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
		
		/*
		
				var objParams = {
			'dyn_model':'Favorite', 
			'type_search':'all', 
			'search_options': {
				"conditions": [
				"Favorite.objectId =" + $object.id,
				"Favorite.type = 'Opportunity'",  
				"Favorite.owner = " + $rootScope.currentUser.User.id
				], 
			"recursive": -1
			}
		};

		$http.get('//' + $location.host() + '/api/utils/?method=queryModel&params='+JSON.stringify(objParams)).success(function(data) {
			
			//console.log("toggleFavorite", data);
			if(data.length > 0) {
				$scope.favorite = {'flag':true, 'id': data[0].Favorite.id};
			}
			else {
				$scope.favorite = {'flag':false, 'id': 0};
			}
		});
		*/
}