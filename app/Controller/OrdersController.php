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
        $this->Order->recursive = 0;
        $this->set('orders', $this->Paginator->paginate());


        $this->loadModel('OrderProduct');
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
        $this->set('report', $report);
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
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
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

        $user = $this->User->read(null, $this->Session->read('Auth.User.id'));
        $workstation = array();
        $workstation = $this->Workstation->read(null, $user["Workstation"]["id"]);
        $store = array();
        $store = $this->Store->read(null, $workstation["Workstation"]["store_id"]);

        //$this->log('order ticket');
        //$this->log($order);
        $this->log('$user');
        $this->log($user);
        $this->log('$workstation');
        $this->log($workstation);
        $this->log('$store');
        $this->log($store);
        $this->log('order Product ticket');
        $this->log($orderProduct);
        $this->log('order Payment ticket');
        $this->log($orderPayment);

        $this->set(compact('order', 'orderProduct', 'orderPayment', 'user', 'workstation', 'store'));
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
                        throw new Exception(__('ORDER_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_FORMAT_NOT_SET'));
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

    public function beforeFilter()
    {

        $this->params['ACTIVE_MENU'] = "orders-nav";
        $this->params['CURRENT_PAGE'] = "orders";
        parent::beforeFilter();
    }

}
