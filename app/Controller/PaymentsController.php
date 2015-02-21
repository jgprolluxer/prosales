<?php

App::uses('AppController', 'Controller');

/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentsController extends AppController
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
        $this->Payment->recursive = 0;
        $this->set('payments', $this->Paginator->paginate());
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
        if (!$this->Payment->exists($id))
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
        $this->set('payment', $this->Payment->find('first', $options));
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
            $this->Payment->create();
            if ($this->Payment->save($this->request->data))
            {
                $this->Session->setFlash(__('The payment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Payment->Account->find('list');
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
        if (!$this->Payment->exists($id))
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Payment->save($this->request->data))
            {
                $this->Session->setFlash(__('The payment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
            $this->request->data = $this->Payment->find('first', $options);
        }
        $accounts = $this->Payment->Account->find('list');
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
        $this->Payment->id = $id;
        if (!$this->Payment->exists())
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Payment->delete())
        {
            $this->Session->setFlash(__('The payment has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The payment could not be deleted. Please, try again.'));
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
        $this->Payment->recursive = 0;
        $this->set('payments', $this->Paginator->paginate());
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
        if (!$this->Payment->exists($id))
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
        $this->set('payment', $this->Payment->find('first', $options));
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
            $this->Payment->create();
            if ($this->Payment->save($this->request->data))
            {
                $this->Session->setFlash(__('The payment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Payment->Account->find('list');
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
        if (!$this->Payment->exists($id))
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Payment->save($this->request->data))
            {
                $this->Session->setFlash(__('The payment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
            $this->request->data = $this->Payment->find('first', $options);
        }
        $accounts = $this->Payment->Account->find('list');
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
        $this->Payment->id = $id;
        if (!$this->Payment->exists())
        {
            throw new NotFoundException(__('Invalid payment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Payment->delete())
        {
            $this->Session->setFlash(__('The payment has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The payment could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter()
    {
        $this->params['ACTIVE_MENU'] = "payments-nav";
        $this->params['ACTIVE_SUBMENU'] = "payments-nav";
        $this->params['CURRENT_PAGE'] = "payments";
        parent::beforeFilter();
    }

    public function jsPayment()
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
                throw new Exception( __('PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET') );
            }

            switch($operation)
            {
                case "CREATE":
                {
                    $this->request->data["Payment"]["status"] = StatusOfPayment::Applied;
                    $this->request->data["Payment"]["folio"] = strtoupper(uniqid("1-"));

                    $this->Payment->recursive = -1;
                    $this->Payment->create();
                    if ($this->Payment->save($this->request->data))
                    {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                            'xData' => $this->Payment->read(null, $this->Payment->getLastInsertID())
                        );
                    } else
                    {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->Payment->validationErrors),
                            'xData' => array()
                        );
                    }

                }break;
                case "READ":
                {
                    if (isset($this->request->query['format']))
                    {
                        $format = $this->request->query['format'];
                        if(isset($this->request->query['paymentID']))
                        {
                            $paymentID = $this->request->query['paymentID'];
                            switch ($format)
                            {
                                case 'allByID':
                                {
                                    $this->Payment->recursive = 1;
                                    $arrayConditions = array(
                                        'Payment.id = ' => $paymentID
                                    );
                                    $results = $this->Payment->find('all', array(
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
                                    $results = $this->Payment->read(null, $paymentID);
                                    $response = array(
                                        'success' => true,
                                        'xData' => $results,
                                        'message' => 'Correcto'
                                    );
                                }break;
                            }

                        } else
                        {
                            throw new Exception( __('PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_ID_PAYMENT_NOT_SET') );
                        }
                    } else {
                        throw new Exception(__('PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_FORMAT_NOT_SET'));
                    }
                }break;
                case "UPDATE":
                {

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

}
