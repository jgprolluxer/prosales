<?php
App::uses('AppController', 'Controller');
/**
 * StoreProducts Controller
 *
 * @property StoreProduct $StoreProduct
 * @property PaginatorComponent $Paginator
 */
class StoreProductsController extends AppController {

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
		$this->StoreProduct->recursive = 0;
		$this->set('storeProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreProduct->exists($id)) {
			throw new NotFoundException(__('Invalid store product'));
		}
		$options = array('conditions' => array('StoreProduct.' . $this->StoreProduct->primaryKey => $id));
		$this->set('storeProduct', $this->StoreProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoreProduct->create();
			if ($this->StoreProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The store product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store product could not be saved. Please, try again.'));
			}
		}
		$stores = $this->StoreProduct->Store->find('list');
		$products = $this->StoreProduct->Product->find('list');
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
		if (!$this->StoreProduct->exists($id)) {
			throw new NotFoundException(__('Invalid store product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The store product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreProduct.' . $this->StoreProduct->primaryKey => $id));
			$this->request->data = $this->StoreProduct->find('first', $options);
		}
		$stores = $this->StoreProduct->Store->find('list');
		$products = $this->StoreProduct->Product->find('list');
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
		$this->StoreProduct->id = $id;
		if (!$this->StoreProduct->exists()) {
			throw new NotFoundException(__('Invalid store product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StoreProduct->delete()) {
			$this->Session->setFlash(__('The store product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
