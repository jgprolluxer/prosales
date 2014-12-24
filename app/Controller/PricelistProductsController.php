<?php
App::uses('AppController', 'Controller');
/**
 * PricelistProducts Controller
 *
 * @property PricelistProduct $PricelistProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PricelistProductsController extends AppController {

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
		$this->PricelistProduct->recursive = 0;
		$this->set('pricelistProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
		$this->set('pricelistProduct', $this->PricelistProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PricelistProduct->create();
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
			$this->request->data = $this->PricelistProduct->find('first', $options);
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PricelistProduct->id = $id;
		if (!$this->PricelistProduct->exists()) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PricelistProduct->delete()) {
			$this->Session->setFlash(__('The pricelist product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pricelist product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PricelistProduct->recursive = 0;
		$this->set('pricelistProducts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
		$this->set('pricelistProduct', $this->PricelistProduct->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PricelistProduct->create();
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
			$this->request->data = $this->PricelistProduct->find('first', $options);
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PricelistProduct->id = $id;
		if (!$this->PricelistProduct->exists()) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PricelistProduct->delete()) {
			$this->Session->setFlash(__('The pricelist product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pricelist product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
