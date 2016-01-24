<?php
App::uses('AppController', 'Controller');
/**
 * StoresProducts Controller
 *
 * @property StoresProduct $StoresProduct
 * @property PaginatorComponent $Paginator
 */
class StoresProductsController extends AppController {

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
		$this->StoresProduct->recursive = 0;
		$this->set('storesProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoresProduct->exists($id)) {
			throw new NotFoundException(__('Invalid stores product'));
		}
		$options = array('conditions' => array('StoresProduct.' . $this->StoresProduct->primaryKey => $id));
		$this->set('storesProduct', $this->StoresProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoresProduct->create();
			if ($this->StoresProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The stores product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stores product could not be saved. Please, try again.'));
			}
		}
		$stores = $this->StoresProduct->Store->find('list');
		$products = $this->StoresProduct->Product->find('list');
		$this->set(compact('stores', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StoresProduct->exists($id)) {
			throw new NotFoundException(__('Invalid stores product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoresProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The stores product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stores product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoresProduct.' . $this->StoresProduct->primaryKey => $id));
			$this->request->data = $this->StoresProduct->find('first', $options);
		}
		$stores = $this->StoresProduct->Store->find('list');
		$products = $this->StoresProduct->Product->find('list');
		$this->set(compact('stores', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoresProduct->id = $id;
		if (!$this->StoresProduct->exists()) {
			throw new NotFoundException(__('Invalid stores product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StoresProduct->delete()) {
			$this->Session->setFlash(__('The stores product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stores product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
