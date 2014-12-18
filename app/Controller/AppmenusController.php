<?php
App::uses('AppController', 'Controller');
/**
 * Appmenus Controller
 *
 * @property Appmenu $Appmenu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AppmenusController extends AppController {

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
		$this->Appmenu->recursive = 0;
		$this->set('appmenus', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Appmenu->exists($id)) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		$options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
		$this->set('appmenu', $this->Appmenu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Appmenu->create();
			if ($this->Appmenu->save($this->request->data)) {
				$this->Session->setFlash(__('The appmenu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appmenu could not be saved. Please, try again.'));
			}
		}
		$parentAppmenus = $this->Appmenu->ParentAppmenu->find('list');
		$parentAppmenus[0] = 'Ninguno';
		$this->set(compact('parentAppmenus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Appmenu->exists($id)) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Appmenu->save($this->request->data)) {
				$this->Session->setFlash(__('The appmenu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appmenu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
			$this->request->data = $this->Appmenu->find('first', $options);
		}
		$parentAppmenus = $this->Appmenu->ParentAppmenu->find('list');
		$parentAppmenus[0] = 'Ninguno';
		$this->set(compact('parentAppmenus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Appmenu->id = $id;
		if (!$this->Appmenu->exists()) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Appmenu->delete()) {
			$this->Session->setFlash(__('The appmenu has been deleted.'));
		} else {
			$this->Session->setFlash(__('The appmenu could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Appmenu->recursive = 0;
		$this->set('appmenus', $this->Paginator->paginate());

		//debug($this->Appmenu->generateTreeList(null,null,null,'&nbsp;&nbsp;&nbsp;'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Appmenu->exists($id)) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		$options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
		$this->set('appmenu', $this->Appmenu->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Appmenu->create();
			if ($this->Appmenu->save($this->request->data)) {
				$this->Session->setFlash(__('The appmenu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appmenu could not be saved. Please, try again.'));
			}
		}
		$parentAppmenus = $this->Appmenu->ParentAppmenu->find('list');
		$parentAppmenus[0] = 'Ninguno';
		$this->set(compact('parentAppmenus'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Appmenu->exists($id)) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Appmenu->save($this->request->data)) {
				$this->Session->setFlash(__('The appmenu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appmenu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
			$this->request->data = $this->Appmenu->find('first', $options);
		}
		$parentAppmenus = $this->Appmenu->ParentAppmenu->find('list');
		$parentAppmenus[0] = 'Ninguno';
		$this->set(compact('parentAppmenus'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Appmenu->id = $id;
		if (!$this->Appmenu->exists()) {
			throw new NotFoundException(__('Invalid appmenu'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Appmenu->delete()) {
			$this->Session->setFlash(__('The appmenu has been deleted.'));
		} else {
			$this->Session->setFlash(__('The appmenu could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * @param null $id
     * @param null $delta
     */
    public function movedown($id = null, $delta = null) {
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Appmenu->moveDown($this->Appmenu->id, abs($delta));
        } else {
            $this->Session->setFlash(
                'Please provide the number of positions the field should be' .
                'moved down.'
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    /**
     * @param null $id
     * @param null $delta
     */
    public function moveup($id = null, $delta = null) {
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Appmenu->moveUp($this->Appmenu->id, abs($delta));
        } else {
            $this->Session->setFlash(
                'Please provide a number of positions the category should' .
                'be moved up.'
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}
