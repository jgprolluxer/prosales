<?php
App::uses('AppController', 'Controller');
/**
 * Workstations Controller
 *
 * @property Workstation $Workstation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class WorkstationsController extends AppController {

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
		$this->Workstation->recursive = 0;
		$this->set('workstations', $this->Paginator->paginate());
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
            $workstations = $this->Workstation->find(
                'all',
                array(
                    'conditions' => array(
                        'Workstation.id >=' => 1,
                        'Workstation.status' => array(StatusOfWorkstation::Active)
                    )
                )
            );
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $workstations
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
		if (!$this->Workstation->exists($id)) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
        $this->request->data = $this->Workstation->find('first', $options);
		$this->set('workstation', $this->Workstation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Workstation->create();
			if ($this->Workstation->save($this->request->data)) {
				$this->Session->setFlash(__('The workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $message = '';
                if (isset($this->Workstation->validationErrors))
                {
                    foreach ($this->Workstation->validationErrors as $idx => $value)
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
				$this->Session->setFlash(__('The workstation could not be saved. '.$message.'<br/> Please, try again.'));
			}
		}
        $parentWorkstations = $this->Workstation->ParentWorkstation->find('list');
        $parentWorkstations[0] = __('NONE');
        $stores = $this->Workstation->Store->find('list');
        $stores[0] = __('NONE');
        $pricelists = $this->Workstation->Pricelist->find('list');
        $pricelists[0] = __('NONE');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovWorkstationRole = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_ROLE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationArea = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_AREA',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

        $this->set(compact('parentWorkstations', 'stores', 'pricelists', 'lovWorkstationRole', 'lovWorkstationStatus', 'lovWorkstationArea'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Workstation->exists($id)) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workstation->save($this->request->data)) {
				$this->Session->setFlash(__('The workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $message = '';
                if (isset($this->Workstation->validationErrors))
                {
                    foreach ($this->Workstation->validationErrors as $idx => $value)
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
				$this->Session->setFlash(__('The workstation could not be saved. '.$message.'<br/> Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
			$this->request->data = $this->Workstation->find('first', $options);
		}
        $parentWorkstations = $this->Workstation->ParentWorkstation->find('list');
        $parentWorkstations[0] = __('NONE');
        $stores = $this->Workstation->Store->find('list');
        $stores[0] = __('NONE');
        $pricelists = $this->Workstation->Pricelist->find('list');
        $pricelists[0] = __('NONE');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovWorkstationRole = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_ROLE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationArea = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_AREA',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('parentWorkstations', 'stores', 'pricelists', 'lovWorkstationRole', 'lovWorkstationStatus', 'lovWorkstationArea'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Workstation->id = $id;
		if (!$this->Workstation->exists()) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Workstation->delete()) {
			$this->Session->setFlash(__('The workstation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workstation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Workstation->recursive = 0;
		$this->set('workstations', $this->Paginator->paginate());
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
            $workstations = $this->Workstation->find(
                'all',
                array(
                    'conditions' => array(
                        'Workstation.id >=' => 1,
                        'Workstation.status' => array(StatusOfWorkstation::Active)
                    )
                )
            );
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $workstations
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
		if (!$this->Workstation->exists($id)) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
        $this->request->data = $this->Workstation->find('first', $options);
		$this->set('workstation', $this->Workstation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Workstation->create();
			if ($this->Workstation->save($this->request->data)) {
				$this->Session->setFlash(__('The workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $message = '';
                if (isset($this->Workstation->validationErrors))
                {
                    foreach ($this->Workstation->validationErrors as $idx => $value)
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
				$this->Session->setFlash(__('The workstation could not be saved. '.$message.'<br/> Please, try again.'));
			}
		}
		$parentWorkstations = $this->Workstation->ParentWorkstation->find('list');
        $parentWorkstations[0] = __('NONE');
		$stores = $this->Workstation->Store->find('list');
        $stores[0] = __('NONE');
		$pricelists = $this->Workstation->Pricelist->find('list');
        $pricelists[0] = __('NONE');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovWorkstationRole = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_ROLE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationArea = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_AREA',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

		$this->set(compact('parentWorkstations', 'stores', 'pricelists', 'lovWorkstationRole', 'lovWorkstationStatus', 'lovWorkstationArea'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Workstation->exists($id)) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workstation->save($this->request->data)) {
				$this->Session->setFlash(__('The workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $message = '';
                if (isset($this->Workstation->validationErrors))
                {
                    foreach ($this->Workstation->validationErrors as $idx => $value)
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
				$this->Session->setFlash(__('The workstation could not be saved.'.$message.'<br/> Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
			$this->request->data = $this->Workstation->find('first', $options);
		}
		$parentWorkstations = $this->Workstation->ParentWorkstation->find('list');
        $parentWorkstations[0] = __('NONE');
		$stores = $this->Workstation->Store->find('list');
        $stores[0] = __('NONE');
		$pricelists = $this->Workstation->Pricelist->find('list');
        $pricelists[0] = __('NONE');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovWorkstationRole = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_ROLE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovWorkstationArea = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'WORKSTATION_FIELD_AREA',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
		$this->set(compact('parentWorkstations', 'stores', 'pricelists', 'lovWorkstationRole', 'lovWorkstationStatus', 'lovWorkstationArea'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Workstation->id = $id;
		if (!$this->Workstation->exists()) {
			throw new NotFoundException(__('Invalid workstation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Workstation->delete()) {
			$this->Session->setFlash(__('The workstation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workstation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
