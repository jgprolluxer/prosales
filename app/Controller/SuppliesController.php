<?php
App::uses('AppController', 'Controller');
/**
 * Supplies Controller
 *
 * @property Supply $Supply
 * @property PaginatorComponent $Paginator
 */
class SuppliesController extends AppController {

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
		$this->Supply->recursive = 0;
		$this->set('supplies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Supply->exists($id)) {
			throw new NotFoundException(__('Invalid supply'));
		}
		$options = array('conditions' => array('Supply.' . $this->Supply->primaryKey => $id));
		$this->set('supply', $this->Supply->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Supply->create();
			if ($this->Supply->save($this->request->data)) {
				$this->Session->setFlash(__('The supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supply could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Supply->exists($id)) {
			throw new NotFoundException(__('Invalid supply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Supply->save($this->request->data)) {
				$this->Session->setFlash(__('The supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supply could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Supply.' . $this->Supply->primaryKey => $id));
			$this->request->data = $this->Supply->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Supply->id = $id;
		if (!$this->Supply->exists()) {
			throw new NotFoundException(__('Invalid supply'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Supply->delete()) {
			$this->Session->setFlash(__('The supply has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supply could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
