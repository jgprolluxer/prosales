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

    public function pos($orderID = 0)
    {
        $this->set(compact('orderID'));
    }

    public function addByPOSJS()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try
        {
            $this->request->data["Order"]["updated_by"] = $this->Session->read("Auth.User.id");
            $this->request->data["Order"]["created_by"] = $this->Session->read("Auth.User.id");
            $this->request->data["Order"]["updated"] = date("Y-m-d H:i:s");
            $this->request->data["Order"]["created"] = date("Y-m-d H:i:s");
            $this->request->data["Order"]["type"] = "POS";
            $this->request->data["Order"]["status"] = StatusOfOrder::Cancelled;
            $this->request->data["Order"]["folio"] = strtoupper(uniqid("1-"));
            $this->request->data["Order"]["price"] = 0;
            $this->request->data["Order"]["total_amt"] = 0;
            $this->request->data["Order"]["subtotal_amt"] = 0;
            $this->request->data["Order"]["tax"] = 0;
            $this->request->data["Order"]["disc"] = 0;
            $this->request->data["Order"]["disc_desc"] = '-';
            $this->request->data["Order"]["account_id"] = 0;
            $this->request->data["Order"]["description"] = '-';
            $this->request->data["Order"]["saleschannel"] = "POS";

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

                $valErrors = $this->Order->validationErrors;
                $valMessage = '';
                foreach ($valErrors as $idx => $valError)
                {
                    $valMessage .=' ';
                    if (is_array($valError))
                    {
                        foreach ($valError as $odx => $prop)
                        {
                            $valMessage .=  $odx.' '. $prop . ' ';
                        }
                    } else
                    {
                        $valMessage .= $idx. ' '.$prop . ' ';
                    }
                }
                $response = array(
                    'success' => false,
                    'message' => $valMessage,
                    'xData' => array()
                );
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

    /**
     * 
     */
    public function jsfindOrder()
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
                case 'POSbyID':
                    {
                        $this->Order->recursive = 1;
                        $arrayConditions = array(
                            'Order.id = ' => $this->request->query['orderID'],
                            'Order.status' => array(StatusOfOrder::Cancelled)
                        );
                        $results = $this->Order->find('all', array(
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

    public function beforeFilter()
    {

        $this->params['ACTIVE_MENU'] = "orders-nav";
        $this->params['CURRENT_PAGE'] = "orders";
        parent::beforeFilter();
    }

}
