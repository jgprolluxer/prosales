<?php
App::uses('AppController', 'Controller');
/**
 * AdjAudits Controller
 *
 * @property AdjAudit $AdjAudit
 */
class AdjAuditsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AdjAudit->recursive = 0;
		$this->set('adjAudits', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AdjAudit->id = $id;
		if (!$this->AdjAudit->exists()) {
			throw new NotFoundException(__('Invalid adj audit'));
		}
		$this->set('adjAudit', $this->AdjAudit->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AdjAudit->create();
			if ($this->AdjAudit->save($this->request->data)) {
				$this->Session->setFlash(__('The adj audit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adj audit could not be saved. Please, try again.'));
			}
		}
		$adjustments = $this->AdjAudit->Adjustment->find('list');
		$users = $this->AdjAudit->User->find('list');
		$this->set(compact('adjustments', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AdjAudit->id = $id;
		if (!$this->AdjAudit->exists()) {
			throw new NotFoundException(__('Invalid adj audit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AdjAudit->save($this->request->data)) {
				$this->Session->setFlash(__('The adj audit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adj audit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AdjAudit->read(null, $id);
		}
		$adjustments = $this->AdjAudit->Adjustment->find('list');
		$users = $this->AdjAudit->User->find('list');
		$this->set(compact('adjustments', 'users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->AdjAudit->id = $id;
		if (!$this->AdjAudit->exists()) {
			throw new NotFoundException(__('Invalid adj audit'));
		}
		if ($this->AdjAudit->delete()) {
			$this->Session->setFlash(__('Adj audit deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Adj audit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
