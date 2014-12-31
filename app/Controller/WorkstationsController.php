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
	public function index()
    {
        $this->Workstation->recursive = 1;
        $workstations = $this->Workstation->find(
            'all',
            array(
                'conditions' => array(
                    'Workstation.id >=' => 1,
                    'Workstation.status' => array(StatusOfWorkstation::Active)
                )
            )
        );
        $this->set(compact('workstations'));

		$this->Workstation->recursive = 0;
		$this->set('workstations', $this->Paginator->paginate());

        $this->Workstation->recursive = 1;
		$treeObjQ = $this->Workstation->find('all', array(
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'left',
                    'conditions' => array(
                        'User.workstation_id = Workstation.id'
                    )
                ),
            )
        ));

        $treeObj = array();
        foreach ($treeObjQ as $key => $obj)
        {
            $userInfo = '<h6 class="text-success">'.$obj["Workstation"]["title"].'</h6><br/>';
            $treeObj[$key][0]["v"] = $obj["Workstation"]["id"];
            if(!empty($obj["User"]))
            {
                $userInfo .= '<h6 class="text-info">'.$obj["User"][0]["firstname"] . ' '. $obj["User"][0]["lastname"].'</h6><br/>';
                if("" != $obj["User"][0]["avatar"])
                {
                    $userInfo .= '<img width="40" height="40" src="'.$obj["User"][0]["avatar"].'" alt="avatar">';
                }
            } else
            {
                $userInfo .= '<span class="label label-danger">SIN USUARIO</span><br/>' ;
            }
            $treeObj[$key][0]["f"] = $userInfo;
            if($obj["ParentWorkstation"]["id"])
            {
                $treeObj[$key][1] = $obj["ParentWorkstation"]["id"];
            } else
            {
                $treeObj[$key][1] = "";
            }
            $treeObj[$key][2] = $obj["Workstation"]["title"];
            
        }

		$this->set('treeObj', $treeObj);

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
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}

        $parentWorkstations[0] = __('NONE');
        $parentWorkstations += $this->Workstation->ParentWorkstation->find('list');
        $stores[0] = __('NONE');
        $stores += $this->Workstation->Store->find('list');
        $pricelists[0] = __('NONE');
        $pricelists += $this->Workstation->Pricelist->find('list');

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
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
			$this->request->data = $this->Workstation->find('first', $options);
		}

        $parentWorkstations[0] = __('NONE');
        $parentWorkstations += $this->Workstation->ParentWorkstation->find('list');
        $stores[0] = __('NONE');
        $stores += $this->Workstation->Store->find('list');
        $pricelists[0] = __('NONE');
        $pricelists += $this->Workstation->Pricelist->find('list');

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
		$this->Workstation->recursive = 1;
        $workstations = $this->Workstation->find(
            'all',
            array(
                'conditions' => array(
                    'Workstation.id >=' => 1,
                    'Workstation.status' => array(StatusOfWorkstation::Active)
                )
            )
        );
        $this->set(compact('workstations'));
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
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}

        $parentWorkstations[0] = __('NONE');
        $parentWorkstations += $this->Workstation->ParentWorkstation->find('list');
        $stores[0] = __('NONE');
        $stores += $this->Workstation->Store->find('list');
        $pricelists[0] = __('NONE');
        $pricelists += $this->Workstation->Pricelist->find('list');

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
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Workstation.' . $this->Workstation->primaryKey => $id));
			$this->request->data = $this->Workstation->find('first', $options);
		}

        $parentWorkstations[0] = __('NONE');
        $parentWorkstations += $this->Workstation->ParentWorkstation->find('list');
        $stores[0] = __('NONE');
        $stores += $this->Workstation->Store->find('list');
        $pricelists[0] = __('NONE');
        $pricelists += $this->Workstation->Pricelist->find('list');

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
