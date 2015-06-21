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
}
