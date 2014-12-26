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
	public function index() {
		$this->Store->recursive = 0;
		$this->set('stores', $this->Paginator->paginate());
	}

    /**
     *
     */
    public function jsIndex()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try{
            $stores = $this->Store->find(
                'all',
                array(
                    'conditions' => array(
                        'Store.id >=' => 1,
                        'Store.status' => array(StatusOfStores::Active)
                    )
                )
            );
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $stores
            );
        }catch (Exeption $ex)
        {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }

        echo json_encode($response);
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
                $message = '';
                if (isset($this->Store->validationErrors))
                {
                    foreach ($this->Store->validationErrors as $idx => $value)
                    {
                        $message .='<br />';
                        if (is_array($value))
                        {
                            foreach ($value as $ldx => $prop)
                            {
                                $message .='<br />';
                                $message .= $ldx.' -> '.$prop;
                            }
                        } else
                        {
                            $message .= $idx.' -> '.$prop;
                        }
                    }
                }
                $this->Session->write('Operation', 'danger');
				$this->Session->setFlash(__('The store could not be saved. '.$message.'<br/> Please, try again.'));
			}
		}
        $owners = $this->Store->Owner->find('list');
        $owners[0] = __('Ninguno');

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
                $message = '';
                if (isset($this->Store->validationErrors))
                {
                    foreach ($this->Store->validationErrors as $idx => $value)
                    {
                        $message .='<br />';
                        if (is_array($value))
                        {
                            foreach ($value as $ldx => $prop)
                            {
                                $message .='<br />';
                                $message .= $ldx.' -> '.$prop;
                            }
                        } else
                        {
                            $message .= $idx.' -> '.$prop;
                        }
                    }
                }
                $this->Session->write('Operation', 'danger');
				$this->Session->setFlash(__('The store could not be saved. '.$message.'<br/> Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
        $owners = $this->Store->Owner->find('list');
        $owners[0] = __('Ninguno');

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
	public function admin_index() {
		$this->Store->recursive = 0;
		$this->set('stores', $this->Paginator->paginate());
	}

    /**
     *
     */
    public function adminjsIndex()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try{
            $stores = $this->Store->find(
                'all',
                array(
                    'conditions' => array(
                        'Store.id >=' => 1,
                        'Store.status' => array(StatusOfStores::Active)
                    )
                )
            );
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $stores
            );
        }catch (Exeption $ex)
        {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }

        echo json_encode($response);
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
                $message = '';
                if (isset($this->Store->validationErrors))
                {
                    foreach ($this->Store->validationErrors as $idx => $value)
                    {
                        $message .='<br />';
                        if (is_array($value))
                        {
                            foreach ($value as $ldx => $prop)
                            {
                                $message .='<br />';
                                $message .= $ldx.' -> '.$prop;
                            }
                        } else
                        {
                            $message .= $idx.' -> '.$prop;
                        }
                    }
                }
                $this->Session->write('Operation', 'danger');
				$this->Session->setFlash(__('The store could not be saved. '.$message.'<br/> Please, try again.'));
			}
		}
		$owners = $this->Store->Owner->find('list');
        $owners[0] = __('Ninguno');

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
                $message = '';
                if (isset($this->Store->validationErrors))
                {
                    foreach ($this->Store->validationErrors as $idx => $value)
                    {
                        $message .='<br />';
                        if (is_array($value))
                        {
                            foreach ($value as $ldx => $prop)
                            {
                                $message .='<br />';
                                $message .= $ldx.' -> '.$prop;
                            }
                        } else
                        {
                            $message .= $idx.' -> '.$prop;
                        }
                    }
                }
                $this->Session->write('Operation', 'danger');
				$this->Session->setFlash(__('The store could not be saved. '.$message.'<br/> Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
		$owners = $this->Store->Owner->find('list');
        $owners[0] = __('Ninguno');

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
