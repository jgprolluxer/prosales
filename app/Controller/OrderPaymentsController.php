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
}
