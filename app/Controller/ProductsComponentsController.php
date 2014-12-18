<?php
App::uses('AppController', 'Controller');
/**
 * ProductsComponents Controller
 *
 * @property ProductsComponent $ProductsComponent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsComponentsController extends AppController {

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
		$this->ProductsComponent->recursive = 0;
		$this->set('productsComponents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsComponent->exists($id)) {
			throw new NotFoundException(__('Invalid products component'));
		}
		$options = array('conditions' => array('ProductsComponent.' . $this->ProductsComponent->primaryKey => $id));
		$this->set('productsComponent', $this->ProductsComponent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsComponent->create();
			if ($this->ProductsComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The products component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products component could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductsComponent->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductsComponent->exists($id)) {
			throw new NotFoundException(__('Invalid products component'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The products component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products component could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsComponent.' . $this->ProductsComponent->primaryKey => $id));
			$this->request->data = $this->ProductsComponent->find('first', $options);
		}
		$products = $this->ProductsComponent->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductsComponent->id = $id;
		if (!$this->ProductsComponent->exists()) {
			throw new NotFoundException(__('Invalid products component'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductsComponent->delete()) {
			$this->Session->setFlash(__('The products component has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products component could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProductsComponent->recursive = 0;
		$this->set('productsComponents', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProductsComponent->exists($id)) {
			throw new NotFoundException(__('Invalid products component'));
		}
		$options = array('conditions' => array('ProductsComponent.' . $this->ProductsComponent->primaryKey => $id));
		$this->set('productsComponent', $this->ProductsComponent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProductsComponent->create();
			if ($this->ProductsComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The products component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products component could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductsComponent->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProductsComponent->exists($id)) {
			throw new NotFoundException(__('Invalid products component'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsComponent->save($this->request->data)) {
				$this->Session->setFlash(__('The products component has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products component could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsComponent.' . $this->ProductsComponent->primaryKey => $id));
			$this->request->data = $this->ProductsComponent->find('first', $options);
		}
		$products = $this->ProductsComponent->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProductsComponent->id = $id;
		if (!$this->ProductsComponent->exists()) {
			throw new NotFoundException(__('Invalid products component'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductsComponent->delete()) {
			$this->Session->setFlash(__('The products component has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products component could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
