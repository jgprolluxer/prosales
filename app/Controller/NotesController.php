<?php

App::uses('AppController', 'Controller');

/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NotesController extends AppController {

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
        $this->Note->recursive = 0;
        $this->set('notes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
        $this->request->data = $this->Note->find('first', $options);
        $this->set('note', $this->Note->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Note->create();
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
            $this->request->data = $this->Note->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Note->id = $id;
        if (!$this->Note->exists()) {
            throw new NotFoundException(__('Invalid note'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Note->delete()) {
            $this->Session->setFlash(__('The note has been deleted.'));
        } else {
            $this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Note->recursive = 0;
        $this->set('notes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
        $this->request->data = $this->Note->find('first', $options);
        $this->set('note', $this->Note->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Note->create();
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
            $this->request->data = $this->Note->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Note->id = $id;
        if (!$this->Note->exists()) {
            throw new NotFoundException(__('Invalid note'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Note->delete()) {
            $this->Session->setFlash(__('The note has been deleted.'));
        } else {
            $this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function jsaddNote() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try {
            $arrayConditions = array();
            $results = array();
            switch ($this->request->query['format']) {
                case 'addNoteFromAccount':
                    $this->Note->save($this->request->query['noteValue']);
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

    public function jsNote() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array(
            'success' => true,
            'message' => 'NOTHING',
            'xData' => array()
        );

        $this->log("el note", "debug"); // app/tmp/logs/debug.log
        $this->log($this->request->data, "debug");


        $this->log("los parametros en get", "debug");
        $this->log($this->request->query, "debug");

        try {
            if (isset($this->request->query['CRUD_operation'])) {
                $operation = $this->request->query['CRUD_operation'];
            } else {
                throw new Exception(__('NOTE_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET'));
            }
            switch ($operation) 
            {
                case "CREATE":
                    $this->Note->recursive = -1;
                    $this->Note->create();
                    if ($this->Note->save($this->request->data)) {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                            'xData' => $this->Note->read(null, $this->Note->getLastInsertID())
                        );
                    } else {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->Note->validationErrors),
                            'xData' => array()
                        );
                    }
                    break;
                case "DELETE":
                    $noteID = $this->request->data['Note']['id'];
                    debug.log($noteID);
                    $this->Note->id = $noteID;
                    if (!$this->Note->exists()) {
			throw new NotFoundException(__('Invalid Note'));
                    }
                    $this->request->allowMethod('post', 'delete');                    
                    if ($this->Note->delete())
                    {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                        );
                    } 
                    else
                    {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->Note->validationErrors),
                            'xData' => array()
                        );
                    }                    
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
