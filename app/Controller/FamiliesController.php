<?php

App::uses('AppController', 'Controller');

/**
 * Families Controller
 *
 * @property Family $Family
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FamiliesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Family->recursive = 0;
        $this->set('families', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
        $this->request->data = $this->Family->find('first', $options);
        $this->set('family', $this->Family->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Family->create();
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
            $this->request->data = $this->Family->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Family->id = $id;
        if (!$this->Family->exists()) {
            throw new NotFoundException(__('Invalid family'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Family->delete()) {
            $this->Session->setFlash(__('The family has been deleted.'));
        } else {
            $this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Family->recursive = 0;
        $this->set('families', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
        $this->request->data = $this->Family->find('first', $options);
        $this->set('family', $this->Family->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Family->create();
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
            $this->request->data = $this->Family->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Family->id = $id;
        if (!$this->Family->exists()) {
            throw new NotFoundException(__('Invalid family'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Family->delete()) {
            $this->Session->setFlash(__('The family has been deleted.'));
        } else {
            $this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * 
     */
    public function jsfindFamily() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array();
        $response = array();
        $results = array();
        try {

            switch ($this->request->query['format']) {
                case 'fullsearch': {
                        if ("0" !== $this->request->query['familyid'] && "" !== $this->request->query['familyid']) {

                            $arrayConditions = array(
                                'Family.id >= ' => 1,
                                'Family.id = ' => $this->request->query['familyid']
                            );
                        } else {
                            $arrayConditions = array(
                                "OR" => array(
                                    'Family.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                                )
                            );
                        }
                        $this->Family->recursive = 1; /// buscar todo con relaciones
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = $results;
                    }
                    break;
                case 'autocompletelist': {
                        $this->Family->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            "OR" => array(
                                'Family.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                            )
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value) {
                            $response[$key]["id"] = $value["Family"]["id"];
                            $response[$key]["value"] = $value["Family"]["firstname"] . ' ' . $value["Family"]["lastname"] . " (" . $value['Family']['familyname'] . ")";
                        }
                    }
                    break;
                case 'typeahead': {
                        $this->Family->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            'Family.id >= ' => 1
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value) {
                            $response[$key]["id"] = $value["Family"]["id"];
                            $response[$key]["value"] = $value["Family"]["firstname"] . ' ' . $value["Family"]["lastname"] . " (" . $value['Family']['Familyname'] . ")";
                        }
                    }
                    break;
                case 'all': {
                        $this->Family->recursive = 1;
                        $arrayConditions = array(
                            'Family.id >= ' => 1,
                            'Family.status' => array(StatusOfFamily::Active)
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = array(
                            'success' => true,
                            'xData' => $results,
                            'message' => 'Correcto'
                        );
                    }
                    break;
                default :
                    break;
            }
        } catch (Exception $ex) {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);
    }
    
    /**
		 * JSON API method
		 * generated by mcred/Cakeular Plugin
		 *
		 * @link          https://github.com/mcred/Cakeular
		 *
		 * @return void
		 * @throws exception
		 */
		public function api($id = null)
		{
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->layout = 'ajax';
            
            
            $response = array(
                'success' => false,
                'message' => 'No Action',
                'xData' => array()
            );

			switch ($this->request->method())
			{
				case 'GET':
					if (!$id)
					{
						if( isset($this->request->query["parent_field"]) && isset($this->request->query["parent_value"]) )
						{
							try {
								$parentField = $this->request->query["parent_field"];
								$parentValue = $this->request->query["parent_value"];

								$this->Account->recursive = -1;
								$orders = $this->Account->find('all', array(
									'conditions' => array(
										'Account.'. $parentField . ' LIKE ' => '%' . $parentValue . '%'
									)
								));
								
                                $response = array(
                                    'success' => true,
                                    'message' => 'OK',
                                    'xData' => $orders
                                );
								echo json_encode($response);
								return;
							}
							catch(Exception $ex)
							{
                                $response = array(
                                    'success' => false,
                                    'message' => $ex->getMessage(),
                                    'xData' => array()
                                );
                                echo json_encode($response);
                                return;
							}
						} 
						else {
						    $orders = $this->Account->find('all', array());
                            $response = array(
                                'success' => true,
                                'message' => 'OK',
                                'xData' => $orders
                            );
							echo json_encode($response);
							return;
						}

					} elseif(!$this->Account->exists($id))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('El cliente no fue encontrado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
						$order = $this->Account->find('first', array('conditions' => array('Account.' . $this->Account->primaryKey => $id)));
                        $response = array(
                            'success' => true,
                            'message' => 'OK',
                            'xData' => $order
                        );
                        echo json_encode($response);
                        return;
					}
					break;
				case 'POST':
					if(!isset($this->request->data['body']))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('Los datos del POST no fueron encontrados'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					}
					$this->Account->create();
					try
					{
						if ( $this->Account->save( $this->request->data['body'] ) )
						{
						    $order = $this->Account->read(null, $this->Account->getLastInsertID());
							
                            $response = array(
                                'success' => true,
                                'message' => __('El cliente fue guardado'),
                                'xData' => $order
                            );
                            echo json_encode($response);
                            return;
                            
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El cliente no fue guardado'),
                                'xData' => $this->Account->validationErrors
                            );
                            echo json_encode($response);
                            return;
						}
					}
					catch(Exception $ex)
					{
                        $response = array(
                            'success' => false,
                            'message' => $ex->getMessage(),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					}					
					break;
				case 'PUT':
					if(!$id)
					{
                        $response = array(
                            'success' => false,
                            'message' => __('EL parametro ID no fue encontrado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
						break;
					}
					if(!isset($this->request->data['body']))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('Los datos del POST no fueron encontrados'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
						break;
					}
					try {
						if ( $this->Account->save( $this->request->data['body'] ) )
						{
						    $order = $this->Account->read(null, $this->request->data['body']["id"]);
                            $response = array(
                                'success' => true,
                                'message' => __('El cliente fue actualizado'),
                                'xData' => $order
                            );
                            echo json_encode($response);
                            return;
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El cliente no fue guardado'),
                                'xData' => $this->Account->validationErrors
                            );
                            echo json_encode($response);
                            return;
						}
					}
					catch(Exception $ex)
					{
                        $response = array(
                            'success' => false,
                            'message' => $ex->getMessage(),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					}					
					break;
				case 'DELETE':
					if(!$id)
					{
                        $response = array(
                            'success' => false,
                            'message' => __('EL parametro ID no fue encontrado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					}
					$this->Account->id = $id;
					if ($this->Account->delete())
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El cliente fue eliminado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El cliente no fue eliminado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					}
					break;
				default:
                    $response = array(
                        'success' => false,
                        'message' => 'Invalid Request Method',
                        'xData' => array()
                    );
                    echo json_encode($response);
                    return;
			}
		}
}
