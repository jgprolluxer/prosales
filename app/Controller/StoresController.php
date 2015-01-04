<?php
App::uses('AppController', 'Controller');
/**
 * Stores Controller
 *
 * @property Store $Store
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StoresController extends AppController {

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
	public function index()
    {
        $this->Store->recursive = 2;
        $stores = $this->Store->find(
            'all',
            array(
                'conditions' => array(
                    'Store.id >=' => 1,
                    'Store.status' => array(StatusOfStore::Active)
                )
            )
        );
        $this->set(compact('stores'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
        $options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
        $this->request->data = $this->Store->find('first', $options);
        $this->set('store', $this->Store->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Store->create();
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}
        $owners[0] = __('Ninguno');
        $owners += $this->Store->Owner->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovStoreStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'STORE_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('owners', 'lovStoreStatus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
        ////// Find all owners of store
        $ownersAll = $this->Store->Owner->find('all');
        $owners[0] = __('Ninguno');
        ////// iterate owners to add title and user name of workstation
        foreach ($ownersAll as $key => $ownerAll)
        {
        	$owners[$key] = isset($ownerAll["User"][0]["id"]) ? $ownerAll["Owner"]["title"] . ' ' . 
        		$ownerAll["Owner"]["employeenumber"] . ' - ' . $ownerAll["User"][0]["firstname"] . ' ' . 
        		$ownerAll["User"][0]["lastname"] : $ownerAll["Owner"]["title"] . ' - ' . 
        		$ownerAll["Owner"]["employeenumber"] . ' ' . __('NOT_USER_ASSIGNED');
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovStoreStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'STORE_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('owners', 'lovStoreStatus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('The store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index()
    {
        $this->Store->recursive = 2;
        $stores = $this->Store->find(
            'all',
            array(
                'conditions' => array(
                    'Store.id >=' => 1,
                    'Store.status' => array(StatusOfStore::Active)
                )
            )
        );
        $this->set(compact('stores'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
        $this->request->data = $this->Store->find('first', $options);
		$this->set('store', $this->Store->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Store->create();
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}

        $owners[0] = __('Ninguno');
		$owners += $this->Store->Owner->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovStoreStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'STORE_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
		$this->set(compact('owners', 'lovStoreStatus'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
        ////// Find all owners of store
        $ownersAll = $this->Store->Owner->find('all');
        $owners[0] = __('Ninguno');
        ////// iterate owners to add title and user name of workstation
        foreach ($ownersAll as $key => $ownerAll)
        {
        	$owners[$key] = isset($ownerAll["User"][0]["id"]) ? $ownerAll["Owner"]["title"] . ' ' . 
        		$ownerAll["Owner"]["employeenumber"] . ' - ' . $ownerAll["User"][0]["firstname"] . ' ' . 
        		$ownerAll["User"][0]["lastname"] : $ownerAll["Owner"]["title"] . ' - ' . 
        		$ownerAll["Owner"]["employeenumber"] . ' ' . __('NOT_USER_ASSIGNED');
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovStoreStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'STORE_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
		$this->set(compact('owners', 'lovStoreStatus'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('The store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
