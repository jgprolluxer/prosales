<?php
App::uses('AppController', 'Controller');
/**
 * OrderProductSupplies Controller
 *
 * @property OrderProductSupply $OrderProductSupply
 * @property PaginatorComponent $Paginator
 */
class OrderProductSuppliesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrderProductSupply->recursive = 0;
		$this->set('orderProductSupplies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrderProductSupply->exists($id)) {
			throw new NotFoundException(__('Invalid order product supply'));
		}
		$options = array('conditions' => array('OrderProductSupply.' . $this->OrderProductSupply->primaryKey => $id));
		$this->set('orderProductSupply', $this->OrderProductSupply->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderProductSupply->create();
			if ($this->OrderProductSupply->save($this->request->data)) {
				$this->Session->setFlash(__('The order product supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order product supply could not be saved. Please, try again.'));
			}
		}
		$orderProducts = $this->OrderProductSupply->OrderProduct->find('list');
		$supplies = $this->OrderProductSupply->Supply->find('list');
		$this->set(compact('orderProducts', 'supplies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrderProductSupply->exists($id)) {
			throw new NotFoundException(__('Invalid order product supply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderProductSupply->save($this->request->data)) {
				$this->Session->setFlash(__('The order product supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order product supply could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderProductSupply.' . $this->OrderProductSupply->primaryKey => $id));
			$this->request->data = $this->OrderProductSupply->find('first', $options);
		}
		$orderProducts = $this->OrderProductSupply->OrderProduct->find('list');
		$supplies = $this->OrderProductSupply->Supply->find('list');
		$this->set(compact('orderProducts', 'supplies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrderProductSupply->id = $id;
		if (!$this->OrderProductSupply->exists()) {
			throw new NotFoundException(__('Invalid order product supply'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderProductSupply->delete()) {
			$this->Session->setFlash(__('The order product supply has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order product supply could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
   
    /**
		 * JSON API method
		 *
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

								$this->OrderProductSupply->recursive = 1;
								$orderproductssupplies = $this->OrderProductSupply->find('all', array(
									'conditions' => array(
										'OrderProductSupply.'. $parentField . ' = ' =>  $parentValue
									)
								));
								
                                $response = array(
                                    'success' => true,
                                    'message' => 'OK',
                                    'xData' => $orderproductssupplies
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
						    $orderproductssupplies = $this->OrderProductSupply->find('all', array());
                            $response = array(
                                'success' => true,
                                'message' => 'OK',
                                'xData' => $orderproductssupplies
                            );
							echo json_encode($response);
							return;
						}

					} elseif(!$this->OrderProductSupply->exists($id))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('El ingrediente del producto no fue encontrado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
					    $this->OrderProductSupply->recursive = -1;
						$orderproductssupply = $this->OrderProductSupply->find('first', array(
								'conditions' => array(
									'OrderProductSupply.' . $this->OrderProductSupply->primaryKey => $id
									)
								));
                        $response = array(
                            'success' => true,
                            'message' => 'OK',
                            'xData' => $orderproductssupply
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
					$this->OrderProductSupply->create();
					try
					{
						if ( $this->OrderProductSupply->save( $this->request->data['body'] ) )
						{
						    $orderproductsupply = $this->OrderProductSupply->read(null, $this->OrderProductSupply->getLastInsertID());
							
                            $response = array(
                                'success' => true,
                                'message' => __('El ingrediente del producto fue guardado'),
                                'xData' => $orderproductsupply
                            );
                            
                            echo json_encode($response);
                            return;
                            
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El ingrediente del producto no fue guardado'),
                                'xData' => $this->OrderProductSupply->validationErrors
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
						if ( $this->OrderProductSupply->save( $this->request->data['body'] ) )
						{
						    $orderproductsupply = $this->OrderProductSupply->read(null, $this->request->data['body']["id"]);
                            $response = array(
                                'success' => true,
                                'message' => __('El ingrediente del producto fue actualizado'),
                                'xData' => $orderproductsupply
                            );
                            echo json_encode($response);
                            return;
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El ingrediente del producto no fue guardado'),
                                'xData' => $this->OrderProductSupply->validationErrors
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
					$this->OrderProductSupply->id = $id;
					if ($this->OrderProductSupply->delete())
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El ingrediente del producto fue eliminado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El ingrediente del producto no fue eliminado'),
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
