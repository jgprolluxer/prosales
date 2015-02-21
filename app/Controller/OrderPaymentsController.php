<?php
App::uses('AppController', 'Controller');
/**
 * OrderPayments Controller
 *
 * @property OrderPayment $OrderPayment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrderPaymentsController extends AppController {

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
		$this->OrderPayment->recursive = 0;
		$this->set('orderPayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrderPayment->exists($id)) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		$options = array('conditions' => array('OrderPayment.' . $this->OrderPayment->primaryKey => $id));
		$this->set('orderPayment', $this->OrderPayment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderPayment->create();
			if ($this->OrderPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The order payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order payment could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->OrderPayment->Account->find('list');
		$orders = $this->OrderPayment->Order->find('list');
		$payments = $this->OrderPayment->Payment->find('list');
		$this->set(compact('accounts', 'orders', 'payments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrderPayment->exists($id)) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The order payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderPayment.' . $this->OrderPayment->primaryKey => $id));
			$this->request->data = $this->OrderPayment->find('first', $options);
		}
		$accounts = $this->OrderPayment->Account->find('list');
		$orders = $this->OrderPayment->Order->find('list');
		$payments = $this->OrderPayment->Payment->find('list');
		$this->set(compact('accounts', 'orders', 'payments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrderPayment->id = $id;
		if (!$this->OrderPayment->exists()) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderPayment->delete()) {
			$this->Session->setFlash(__('The order payment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrderPayment->recursive = 0;
		$this->set('orderPayments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrderPayment->exists($id)) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		$options = array('conditions' => array('OrderPayment.' . $this->OrderPayment->primaryKey => $id));
		$this->set('orderPayment', $this->OrderPayment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrderPayment->create();
			if ($this->OrderPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The order payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order payment could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->OrderPayment->Account->find('list');
		$orders = $this->OrderPayment->Order->find('list');
		$payments = $this->OrderPayment->Payment->find('list');
		$this->set(compact('accounts', 'orders', 'payments'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrderPayment->exists($id)) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The order payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderPayment.' . $this->OrderPayment->primaryKey => $id));
			$this->request->data = $this->OrderPayment->find('first', $options);
		}
		$accounts = $this->OrderPayment->Account->find('list');
		$orders = $this->OrderPayment->Order->find('list');
		$payments = $this->OrderPayment->Payment->find('list');
		$this->set(compact('accounts', 'orders', 'payments'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->OrderPayment->id = $id;
		if (!$this->OrderPayment->exists()) {
			throw new NotFoundException(__('Invalid order payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderPayment->delete()) {
			$this->Session->setFlash(__('The order payment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



    public function jsOrderPayment()
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
                throw new Exception( __('ORDER_PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET') );
            }

            switch($operation)
            {
                case "CREATE":
                {
                    $this->request->data["OrderPayment"]["status"] = StatusOfOrderPayment::Applied;
                    $this->request->data["OrderPayment"]["folio"] = strtoupper(uniqid("1-"));

                    $this->OrderPayment->recursive = -1;
                    $this->OrderPayment->create();
                    if ($this->OrderPayment->save($this->request->data))
                    {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                            'xData' => $this->OrderPayment->read(null, $this->OrderPayment->getLastInsertID())
                        );
                    } else
                    {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->OrderPayment->validationErrors),
                            'xData' => array()
                        );
                    }

                }break;
                case "READ":
                {
                    if (isset($this->request->query['format']))
                    {
                        $format = $this->request->query['format'];
                        if(isset($this->request->query['orderPaymentID']))
                        {
                            $paymentID = $this->request->query['orderPaymentID'];
                            switch ($format)
                            {
                                case 'allByID':
                                {
                                    $this->OrderPayment->recursive = 1;
                                    $arrayConditions = array(
                                        'Payment.id = ' => $paymentID
                                    );
                                    $results = $this->OrderPayment->find('all', array(
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
                                    $results = $this->OrderPayment->read(null, $paymentID);
                                    $response = array(
                                        'success' => true,
                                        'xData' => $results,
                                        'message' => 'Correcto'
                                    );
                                }break;
                            }

                        } else
                        {
                            throw new Exception( __('ORDER_PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_ID_PAYMENT_NOT_SET') );
                        }
                    } else {
                        throw new Exception(__('ORDER_PAYMENT_CONTROLLER') . ' ' . __('CRUD_OPERATION_READ_FORMAT_NOT_SET'));
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
