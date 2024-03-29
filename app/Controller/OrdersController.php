<?php

App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrdersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    //public $AclView = new AclViewHelper();
    //public $helpers = array('MenuHelper');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Order->recursive = 1;
        $orders = $this->Order->find('all', array(
            'conditions' => array(
                'Order.id >=' => 1
            )
        ));
        $this->set('orders', $orders);


        /*$this->loadModel('OrderProduct');
        $arrFields = array('Product.name as name', 'sum(OrderProduct.product_price * OrderProduct.product_qty) as total');
        $arrConditions = array(
            'OrderProduct.id >=' => 1,
            'Order.status' => array('cancelled')
        );
        $arrOrder = array('total desc');
        $arrGroup = array('Product.name');
        $arrOptions = array(
            'recursive' => 1,
            'fields' => $arrFields,
            'conditions' => $arrConditions,
            'order' => $arrOrder,
            'group' => $arrGroup
        );

        $report = $this->OrderProduct->find('all', $arrOptions);
        $this->set('report', $report);*/
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
        if (!$this->Order->exists($id))
        {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->Order->recursive = 2;
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->request->data = $this->Order->find('first', $options);
        $this->set('order', $this->Order->find('first', $options));
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
            $this->Order->create();
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('accounts'));
    }

    /**
     * pos method
     *
     * @return void
     */
    public function pos($id = null)
    {
        if ($this->request->is('post'))
        {
            $this->Order->create();
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('id', 'accounts'));
    }

    /**
     * pos method
     *
     * @return void
     */
    public function owizard()
    {
        if ($this->request->is('post'))
        {
            $this->Order->create();
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('accounts'));
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
        if (!$this->Order->exists($id))
        {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
            if(StatusOfOrder::Closed == $this->request->data["Order"]["status"] )
            {
                $this->Session->write('Operation', 'warning');
                $this->Session->setFlash(__('La orden que intenta modificar se encuentra cerrada'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('accounts'));
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
        $this->Order->id = $id;
        if (!$this->Order->exists())
        {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Order->delete())
        {
            $this->Session->setFlash(__('The order has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
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
        $this->Order->recursive = 0;
        $this->set('orders', $this->Paginator->paginate());
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
        if (!$this->Order->exists($id))
        {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
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
            $this->Order->create();
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('accounts'));
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
        if (!$this->Order->exists($id))
        {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Order->save($this->request->data))
            {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }
        $accounts = $this->Order->Account->find('list');
        $this->set(compact('accounts'));
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
        $this->Order->id = $id;
        if (!$this->Order->exists())
        {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Order->delete())
        {
            $this->Session->setFlash(__('The order has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function serviceorders()
    {
    	$startDt = date("Y-m-d H:i:s", strtotime("-40 minutes"));
    	$endDt = date("Y-m-d H:i:s");
        $orders = $this->Order->find('all', array(
            'recursive' => 3,
            'conditions' => array(
                'Order.id >=' => 1,
				'Order.status' => array(StatusOfOrder::Pending, StatusOfOrder::Paid,StatusOfOrder::Closed),
				'Order.created >=' => $startDt,
				'Order.created <=' => $endDt
            ),
            'order' => array(
                'Order.created DESC'
                )
        ));
        $this->set('orders', $orders);
        
    }

    public function raiseticket($orderID = null)
    {
        $record = array();
        if(null !== $orderID)
        {
            $this->Order->recursive = 2;
            $order = $this->Order->read(null, $orderID);
            $orderProduct = $this->Order->OrderProduct->find('all', array(
                'conditions' => array(
                    'OrderProduct.id >=' => 1,
                    'OrderProduct.status' => array(StatusOfOrderProduct::Active),
                    'OrderProduct.order_id' => $orderID
                )
            ));
            $orderPayment = $this->Order->OrderPayment->find('all', array(
                'conditions' => array(
                    'OrderPayment.id >=' => 1,
                    'OrderPayment.order_id' => $orderID
                )
            ));
        }

        $this->loadModel('User');
        $this->loadModel('Store');
        $this->loadModel('Workstation');
        $this->loadModel('Config');

        $user = $this->User->read(null, $this->Session->read('Auth.User.id'));
        $workstation = array();
        $workstation = $this->Workstation->read(null, $user["Workstation"]["id"]);
        $store = array();
        $store = $this->Store->read(null, $workstation["Workstation"]["store_id"]);
        $config = $this->Config->read(null, 1);

        //$this->log('order ticket');
        //$this->log($order);
        /*$this->log('$user');
        $this->log($user);
        $this->log('$workstation');
        $this->log($workstation);
        $this->log('$store');
        $this->log($store);
        $this->log('order Product ticket');
        $this->log($orderProduct);
        $this->log('order Payment ticket');
        $this->log($orderPayment);*/

        $this->set(compact('order', 'orderProduct', 'orderPayment', 'user', 'workstation', 'store', 'config'));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
    }

    public function jsOrder()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array(
            'success' => true,
            'message' => 'NOTHING',
            'xData' => array()
        );

        try{
            if(isset($this->request->query['CRUD_operation']))
            {
                $operation = $this->request->query['CRUD_operation'];
            } else
            {
                throw new Exception( __('ORDER_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET') );
            }

            switch($operation)
            {
                case "CREATE":
                {
                    $this->request->data["Order"]["updated_by"] = $this->Session->read("Auth.User.id");
                    $this->request->data["Order"]["created_by"] = $this->Session->read("Auth.User.id");
                    $this->request->data["Order"]["updated"] = date("Y-m-d H:i:s");
                    $this->request->data["Order"]["created"] = date("Y-m-d H:i:s");
                    $this->request->data["Order"]["type"] = "POS";
                    $this->request->data["Order"]["status"] = StatusOfOrder::Open;
                    $this->request->data["Order"]["folio"] = strtoupper(uniqid("1-"));
                    $this->request->data["Order"]["type"] = "POS";
                    $this->request->data["Order"]["price"] = 0;
                    $this->request->data["Order"]["total_amt"] = 0;
                    $this->request->data["Order"]["subtotal_amt"] = 0;

                    $this->Order->recursive = -1;
                    $this->Order->create();
                    if ($this->Order->save($this->request->data))
                    {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                            'xData' => $this->Order->read(null, $this->Order->getLastInsertID())
                        );
                    } else
                    {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->Order->validationErrors),
                            'xData' => array()
                        );
                    }

                }break;
                case "READ":
                {
                    if (isset($this->request->query['format']))
                    {
                        $format = $this->request->query['format'];
                        if(isset($this->request->query['orderID']))
                        {
                            $orderID = $this->request->query['orderID'];
                            switch ($format)
                            {
                                case 'allByID':
                                {
                                    $this->Order->recursive = 1;
                                    $arrayConditions = array(
                                        'Order.id = ' => $orderID
                                    );
                                    $results = $this->Order->find('all', array(
                                        'conditions' => $arrayConditions
                                    ));
                                    $response = array(
                                        'success' => true,
                                        'xData' => $results,
                                        'message' => 'Correcto'
                                    );
                                }break;
                                case 'byID':
                                {
                                    $results = $this->Order->read(null, $orderID);
                                    $response = array(
                                        'success' => true,
                                        'xData' => $results,
                                        'message' => 'Correcto'
                                    );
                                }break;
                            }

                        } else
                        {
                            throw new Exception( __('ORDER_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_ID_ORDER_NOT_SET') );
                        }
                    } else {
                        throw new Exception(__('ORDER_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_FORMAT_NOT_SET'));
                    }
                }break;
                case "UPDATE":
                {
                    if (isset($this->request->query['format']))
                    {
                        $format = $this->request->query['format'];
                        if(isset($this->request->data['Order']['id']))
                        {
                            $orderID = $this->request->data['Order']['id'];
                            switch ($format)
                            {
                                case 'CloseOrder':
                                {
                                    $this->Order->recursive = 1;
                                    $this->Order->id = $orderID;
                                    if( $this->Order->saveField('status', StatusOfOrder::Closed) )
                                    {

                                        $response = array(
                                            'success' => true,
                                            'message' => 'Correcto',
                                            'xData' => $this->Order->read(null, $orderID)
                                        );
                                    }else
                                    {
                                        $response = array(
                                            'success' => false,
                                            'message' => json_encode($this->Order->validationErrors),
                                            'xData' => array()
                                        );
                                    }
                                }break;
                                case 'CancelOrder':
                                {
                                    $this->Order->recursive = 1;
                                    $this->Order->id = $orderID;
                                    if( $this->Order->saveField('status', StatusOfOrder::Cancelled) )
                                    {
                                        $response = array(
                                            'success' => true,
                                            'message' => 'Correcto',
                                            'xData' => $this->Order->read(null, $orderID)
                                        );
                                    }else
                                    {
                                        $response = array(
                                            'success' => false,
                                            'message' => json_encode($this->Order->validationErrors),
                                            'xData' => array()
                                        );
                                    }
                                }break;
                                case 'SetAccount':
                                {
                                    $this->Order->recursive = 1;
                                    $this->Order->id = $orderID;
                                    if( $this->Order->saveField('account_id', $this->request->data['Order']['account_id'] ) )
                                    {

                                        $response = array(
                                            'success' => true,
                                            'message' => 'Correcto',
                                            'xData' => $this->Order->read(null, $orderID)
                                        );
                                    }else
                                    {
                                        $response = array(
                                            'success' => false,
                                            'message' => json_encode($this->Order->validationErrors),
                                            'xData' => array()
                                        );
                                    }

                                }break;
                            }

                        } else
                        {
                            throw new Exception( __('ORDER_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_ID_ORDER_NOT_SET') );
                        }
                    } else {
                        
                        $this->Order->recursive = -1;
                        $this->Order->id = $this->request->data['Order']['id'];
                        if( $this->Order->save($this->request->data['Order'] ) )
                        {

                            $response = array(
                                'success' => true,
                                'message' => 'Correcto',
                                'xData' => $this->Order->read(null, $orderID)
                            );
                        }else
                        {
                            $response = array(
                                'success' => false,
                                'message' => json_encode($this->Order->validationErrors),
                                'xData' => array()
                            );
                        }
                    }

                }break;
                case "DELETE":
                {

                }break;
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

								$this->Order->recursive = -1;
								$orders = $this->Order->find('all', array(
									'conditions' => array(
										'Order.'. $parentField . ' LIKE ' => '%' . $parentValue . '%'
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
						    $orders = $this->Order->find('all', array());
                            $response = array(
                                'success' => true,
                                'message' => 'OK',
                                'xData' => $orders
                            );
							echo json_encode($response);
							return;
						}

					} elseif(!$this->Order->exists($id))
					{
                        $response = array(
                            'success' => false,
                            'message' => __('La venta no fue encontrada'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
						$order = $this->Order->find('first', array('conditions' => array('Order.' . $this->Order->primaryKey => $id)));
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
					$this->Order->create();
					try
					{
						if ( $this->Order->save( $this->request->data['body'] ) )
						{
						    $order = $this->Order->read(null, $this->Order->getLastInsertID());
							
                            $response = array(
                                'success' => true,
                                'message' => __('La venta fue guardada'),
                                'xData' => $order
                            );
                            echo json_encode($response);
                            return;
                            
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('La venta no fue guardada'),
                                'xData' => $this->Order->validationErrors
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
						if ( $this->Order->save( $this->request->data['body'] ) )
						{
						    $order = $this->Order->read(null, $this->request->data['body']["id"]);
                            $response = array(
                                'success' => true,
                                'message' => __('La venta fue actualizada'),
                                'xData' => $order
                            );
                            echo json_encode($response);
                            return;
						} else
						{
                            $response = array(
                                'success' => false,
                                'message' => __('La venta no fue guardada'),
                                'xData' => $this->Order->validationErrors
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
					$this->Order->id = $id;
					if ($this->Order->delete())
					{
                        $response = array(
                            'success' => true,
                            'message' => __('La venta fue eliminada'),
                            'xData' => array()
                        );
                        echo json_encode($response);
                        return;
					} else
					{
                        $response = array(
                            'success' => true,
                            'message' => __('La venta no fue eliminada'),
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

    public function beforeFilter()
    {

        $this->params['ACTIVE_MENU'] = "orders-nav";
        $this->params['CURRENT_PAGE'] = "orders";
        parent::beforeFilter();
    }

}
