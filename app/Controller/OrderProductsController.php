<?php

App::uses('AppController', 'Controller');

/**
 * OrderProducts Controller
 *
 * @property OrderProduct $OrderProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrderProductsController extends AppController
{

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
    public function index()
    {
        $this->OrderProduct->recursive = 0;
        $this->set('orderProducts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->OrderProduct->exists($id))
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        $options = array('conditions' => array('OrderProduct.' . $this->OrderProduct->primaryKey => $id));
        $this->set('orderProduct', $this->OrderProduct->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post'))
        {
            $this->OrderProduct->create();
            if ($this->OrderProduct->save($this->request->data))
            {
                $this->Session->setFlash(__('The order product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order product could not be saved. Please, try again.'));
            }
        }
        $orderproducts = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orderproducts', 'products', 'resources'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->OrderProduct->exists($id))
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->OrderProduct->save($this->request->data))
            {
                $this->Session->setFlash(__('The order product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order product could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('OrderProduct.' . $this->OrderProduct->primaryKey => $id));
            $this->request->data = $this->OrderProduct->find('first', $options);
        }
        $orderproducts = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orderproducts', 'products', 'resources'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->OrderProduct->id = $id;
        if (!$this->OrderProduct->exists())
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->OrderProduct->delete())
        {
            $this->Session->setFlash(__('The order product has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The order product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->OrderProduct->recursive = 0;
        $this->set('orderProducts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->OrderProduct->exists($id))
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        $options = array('conditions' => array('OrderProduct.' . $this->OrderProduct->primaryKey => $id));
        $this->set('orderProduct', $this->OrderProduct->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post'))
        {
            $this->OrderProduct->create();
            if ($this->OrderProduct->save($this->request->data))
            {
                $this->Session->setFlash(__('The order product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order product could not be saved. Please, try again.'));
            }
        }
        $orderproducts = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orderproducts', 'products', 'resources'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->OrderProduct->exists($id))
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->OrderProduct->save($this->request->data))
            {
                $this->Session->setFlash(__('The order product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order product could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('OrderProduct.' . $this->OrderProduct->primaryKey => $id));
            $this->request->data = $this->OrderProduct->find('first', $options);
        }
        $orderproducts = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orderproducts', 'products', 'resources'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->OrderProduct->id = $id;
        if (!$this->OrderProduct->exists())
        {
            throw new NotFoundException(__('Invalid order product'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->OrderProduct->delete())
        {
            $this->Session->setFlash(__('The order product has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The order product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
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

								$this->OrderProduct->recursive = 1;
								$orderproducts = $this->OrderProduct->find('all', array(
									'conditions' => array(
										'OrderProduct.'. $parentField . ' = ' =>  $parentValue
									)
								));
								
                                $response = array(
                                    'success' => true,
                                    'message' => 'OK',
                                    'xData' => $orderproducts
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
						    $orderproducts = $this->OrderProduct->find('all', array());
                            $response = array(
                                'success' => true,
                                'message' => 'OK',
                                'xData' => $orderproducts
                            );
							echo json_encode($response);
							return;
						}

					} elseif(!$this->OrderProduct->exists($id))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('El producto de la orden no fue encontrado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
					    $this->OrderProduct->recursive = -1;
						$orderproduct = $this->OrderProduct->find('first', array('conditions' => array('OrderProduct.' . $this->OrderProduct->primaryKey => $id)));
                        $response = array(
                            'success' => true,
                            'message' => 'OK',
                            'xData' => $orderproduct
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
					$this->OrderProduct->create();
					try
					{
						if ( $this->OrderProduct->save( $this->request->data['body'] ) )
						{
						    $orderproduct = $this->OrderProduct->read(null, $this->OrderProduct->getLastInsertID());
							
                            $response = array(
                                'success' => true,
                                'message' => __('El producto fue guardado'),
                                'xData' => $orderproduct
                            );
                            
                            $this->log('PRODUCTO ORDER FUE GUARDADO');
                            $this->log($orderproduct);
                            
                            echo json_encode($response);
                            return;
                            
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El producto no fue guardado'),
                                'xData' => $this->OrderProduct->validationErrors
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
						if ( $this->OrderProduct->save( $this->request->data['body'] ) )
						{
						    $orderproduct = $this->OrderProduct->read(null, $this->request->data['body']["id"]);
                            $response = array(
                                'success' => true,
                                'message' => __('El producto de la orden fue actualizado'),
                                'xData' => $orderproduct
                            );
                            echo json_encode($response);
                            return;
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('El producto de la orden no fue guardado'),
                                'xData' => $this->OrderProduct->validationErrors
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
					$this->OrderProduct->id = $id;
					if ($this->OrderProduct->delete())
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El producto fue eliminado'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
                        $response = array(
                            'success' => true,
                            'message' => __('El producto no fue eliminado'),
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
