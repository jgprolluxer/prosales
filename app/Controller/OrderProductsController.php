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
        $orders = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orders', 'products', 'resources'));
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
        $orders = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orders', 'products', 'resources'));
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
        $orders = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orders', 'products', 'resources'));
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
        $orders = $this->OrderProduct->Order->find('list');
        $products = $this->OrderProduct->Product->find('list');
        $resources = $this->OrderProduct->Resource->find('list');
        $this->set(compact('orders', 'products', 'resources'));
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
     *
     */
    public function jsCancelOrderProduct()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array();
        $response = array();

        try
        {
            $this->OrderProduct->id = $this->request->data["OrderProduct"]["id"];
            $this->OrderProduct->recursive = -1;
            $this->OrderProduct->saveField('status', StatusOfOrderProduct::Inactive);

            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => array()
            );

        } catch (Exception $ex)
        {
            $this->log('Error to try update the OrderProduct');
            $this->log($ex->getMessage());
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);
    }

    /**
     *
     */
    public function jsfindOrderProduct()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array();
        $response = array();
        $results = array();
        try
        {
            switch ($this->request->query['format'])
            {
                case 'allForPOS':
                    {
                        $this->OrderProduct->recursive = 1;
                        $arrayConditions = array(
                            'OrderProduct.id >= ' => 1,
                            'OrderProduct.order_id =' => $this->request->query['orderID'],
                            'OrderProduct.status' => array(StatusOfOrderProduct::Active)
                        );
                        $results = $this->OrderProduct->find('all', array(
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
        } catch (Exception $ex)
        {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);
    }

    public function addFromPOSByJs()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';
        $response = array();

        try
        {
            $pricelistID = null;
            $productID = null;
            $orderID = null;
            if( isset($this->request->data["OrderProduct"]["product_id"])
                && isset($this->request->data["OrderProduct"]["pricelist_id"])
                && isset($this->request->data["OrderProduct"]["order_id"])  )
            {
                $pricelistID = $this->request->data["OrderProduct"]["pricelist_id"];
                $productID = $this->request->data["OrderProduct"]["product_id"];
                $orderID = $this->request->data["OrderProduct"]["order_id"];

            } else
            {
                throw new Exception( ''. __('PRICELIST_PRODUCT_ORDER_INCORRECT') );
            }
            $this->loadModel('PricelistProduct');
            $this->PricelistProduct->recursive = 3;
            $selectedProduct = $this->PricelistProduct->find('all', array(
                    'conditions' => array(
                        'PricelistProduct.id >=' => 1,
                        'Pricelist.id =' => $pricelistID,
                        'Product.id =' => $productID
                    )
            ));

            if(empty($selectedProduct))
            {
                throw new Exception( ''. __('PRODUCT_NOT_FOUNDED') );
            }else
            {
                $selectedProduct = $selectedProduct[0];
            }
            ////// first check if product exists
            $orderProductFounded = $this->OrderProduct->find('all', array(
                'conditions' => array(
                    'OrderProduct.id >=' => 1,
                    'OrderProduct.product_id =' => $productID,
                    'OrderProduct.order_id =' => $orderID,
                    'OrderProduct.status' => array(StatusOfOrderProduct::Active)
                )
            ));

            $this->OrderProduct->recursive = -1;
            if (0 < count($orderProductFounded))
            {
                $orderProduct = $orderProductFounded[0];
                $qty = $orderProduct["OrderProduct"]["product_qty"];
                $qty ++;
                $orderProduct["OrderProduct"]["product_qty"] = $qty;
                if (!$this->OrderProduct->save($orderProduct["OrderProduct"]))
                {
                    $valErrors = $this->OrderProduct->validationErrors;
                    $valMessage = "";
                    foreach ($valErrors as $valError)
                    {
                        $valMessage .=' ';
                        if (is_array($valError))
                        {
                            foreach ($valError as $prop)
                            {
                                $valMessage .= $prop . ' ';
                            }
                        } else
                        {
                            $valMessage .= $prop . ' ';
                        }
                    }
                    $response = array(
                        'success' => false,
                        'message' => $valMessage,
                        'xData' => array()
                    );
                } else
                {
                    $response = array(
                        'success' => true,
                        'message' => 'Correcto',
                        'xData' => $this->OrderProduct->read(null, $orderProduct["OrderProduct"]["id"])
                    );
                }
            } else
            {
                $orderProduct["OrderProduct"]["created"] = date("Y-m-d H:i:s");
                $orderProduct["OrderProduct"]["updated"] = date("Y-m-d H:i:s");
                $orderProduct["OrderProduct"]["created_by"] = $this->Session->read("Auth.User.id");
                $orderProduct["OrderProduct"]["updated_by"] = $this->Session->read("Auth.User.id");
                $orderProduct["OrderProduct"]["status"] = 'active';
                $orderProduct["OrderProduct"]["order_id"] = $orderID;
                $orderProduct["OrderProduct"]["product_id"] = $productID;
                $orderProduct["OrderProduct"]["product_qty"] = 1;
                $orderProduct["OrderProduct"]["product_disc"] = 0;
                $orderProduct["OrderProduct"]["product_price"] = $selectedProduct["PricelistProduct"]["unit_price"];
                $orderProduct["OrderProduct"]["product_tax"] = $selectedProduct["PricelistProduct"]["tax"];

                $this->OrderProduct->create();
                if (!$this->OrderProduct->save($orderProduct["OrderProduct"]))
                {
                    $valErrors = $this->OrderProduct->validationErrors;
                    $valMessage = "";
                    foreach ($valErrors as $valError)
                    {
                        $valMessage .=' ';
                        if (is_array($valError))
                        {
                            foreach ($valError as $prop)
                            {
                                $valMessage .= $prop . ' ';
                            }
                        } else
                        {
                            $valMessage .= $prop . ' ';
                        }
                    }
                    $response = array(
                        'success' => false,
                        'message' => $valMessage,
                        'xData' => array()
                    );
                } else
                {
                    $response = array(
                        'success' => true,
                        'message' => 'Correcto',
                        'xData' => $this->OrderProduct->read(null, $this->OrderProduct->getLastInsertID())
                    );
                }
            }

            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => array()
            );
        } catch (Exception $ex)
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
