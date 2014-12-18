<?php
App::uses('AppController', 'Controller');
/**
 * StoreTeams Controller
 *
 * @property StoreTeam $StoreTeam
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StoreTeamsController extends AppController {

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
		$this->StoreTeam->recursive = 0;
		$this->set('storeTeams', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreTeam->exists($id)) {
			throw new NotFoundException(__('Invalid store team'));
		}
		$options = array('conditions' => array('StoreTeam.' . $this->StoreTeam->primaryKey => $id));
		$this->set('storeTeam', $this->StoreTeam->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoreTeam->create();
			if ($this->StoreTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The store team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store team could not be saved. Please, try again.'));
			}
		}
		$stores = $this->StoreTeam->Store->find('list');
		$teams = $this->StoreTeam->Team->find('list');
		$this->set(compact('stores', 'teams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StoreTeam->exists($id)) {
			throw new NotFoundException(__('Invalid store team'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The store team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store team could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreTeam.' . $this->StoreTeam->primaryKey => $id));
			$this->request->data = $this->StoreTeam->find('first', $options);
		}
		$stores = $this->StoreTeam->Store->find('list');
		$teams = $this->StoreTeam->Team->find('list');
		$this->set(compact('stores', 'teams'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoreTeam->id = $id;
		if (!$this->StoreTeam->exists()) {
			throw new NotFoundException(__('Invalid store team'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StoreTeam->delete()) {
			$this->Session->setFlash(__('The store team has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store team could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StoreTeam->recursive = 0;
		$this->set('storeTeams', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StoreTeam->exists($id)) {
			throw new NotFoundException(__('Invalid store team'));
		}
		$options = array('conditions' => array('StoreTeam.' . $this->StoreTeam->primaryKey => $id));
		$this->set('storeTeam', $this->StoreTeam->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StoreTeam->create();
			if ($this->StoreTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The store team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store team could not be saved. Please, try again.'));
			}
		}
		$stores = $this->StoreTeam->Store->find('list');
		$teams = $this->StoreTeam->Team->find('list');
		$this->set(compact('stores', 'teams'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StoreTeam->exists($id)) {
			throw new NotFoundException(__('Invalid store team'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The store team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store team could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreTeam.' . $this->StoreTeam->primaryKey => $id));
			$this->request->data = $this->StoreTeam->find('first', $options);
		}
		$stores = $this->StoreTeam->Store->find('list');
		$teams = $this->StoreTeam->Team->find('list');
		$this->set(compact('stores', 'teams'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StoreTeam->id = $id;
		if (!$this->StoreTeam->exists()) {
			throw new NotFoundException(__('Invalid store team'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StoreTeam->delete()) {
			$this->Session->setFlash(__('The store team has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store team could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
