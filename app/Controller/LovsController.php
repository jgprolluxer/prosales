<?php
App::uses('AppController', 'Controller');
/**
 * Lovs Controller
 *
 * @property Lov $Lov
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LovsController extends AppController {

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
        $this->Lov->recursive = 1;
        $lovs = $this->Lov->find( 'all',
            array(
                'conditions' => array(
                    'Lov.id >=' => 1,
                    'Lov.status' => array(StatusOfLov::Active)
                )
            )
        );
        $this->set(compact('lovs'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lov->exists($id)) {
			throw new NotFoundException(__('Invalid lov'));
		}
		$options = array('conditions' => array('Lov.' . $this->Lov->primaryKey => $id));
        $this->request->data = $this->Lov->find('first', $options);
		$this->set('lov', $this->Lov->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lov->create();
			if ($this->Lov->save($this->request->data)) {
				$this->Session->setFlash(__('The lov has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lov could not be saved. Please, try again.'));
			}
		}
        $parentLovs = array();//$this->Lov->ParentLov->find('list');
        $parentLovsAll = $this->Lov->find('all', array(
            'fields' => array(
                'Lov.id',
                "CONCAT( Lov.type, '    --    ', Lov.value ) as elval"
            ),
            'order' => array('Lov.type', 'Lov.ordershow'),
        ));
        $parentLovs[0] = "Ninguno";
        foreach ($parentLovsAll as $key => $value)
        {
            $parentLovs[$value["Lov"]["id"]] = $value["0"]["elval"];
        }
		$this->set(compact('parentLovs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lov->exists($id)) {
			throw new NotFoundException(__('Invalid lov'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lov->save($this->request->data)) {
				$this->Session->setFlash(__('The lov has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lov could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lov.' . $this->Lov->primaryKey => $id));
			$this->request->data = $this->Lov->find('first', $options);
		}
        $parentLovs = array();//$this->Lov->ParentLov->find('list');
        $parentLovsAll = $this->Lov->find('all', array(
            'fields' => array(
                'Lov.id',
                "CONCAT( Lov.type, '    --    ', Lov.value ) as elval"
            ),
            'order' => array('Lov.type', 'Lov.ordershow'),
        ));
        $parentLovs[0] = "Ninguno";
        foreach ($parentLovsAll as $key => $value)
        {
            $parentLovs[$value["Lov"]["id"]] = $value["0"]["elval"];
        }
		$this->set(compact('parentLovs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Lov->id = $id;
		if (!$this->Lov->exists()) {
			throw new NotFoundException(__('Invalid lov'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Lov->delete()) {
			$this->Session->setFlash(__('The lov has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lov could not be deleted. Please, try again.'));
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
        $this->Lov->recursive = 1;
        $lovs = $this->Lov->find('all',
            array(
                'conditions' => array(
                    'Lov.id >=' => 1,
                    'Lov.status' => array(StatusOfLov::Active)
                )
            )
        );
        $this->set(compact('lovs'));
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Lov->exists($id)) {
			throw new NotFoundException(__('Invalid lov'));
		}
		$options = array('conditions' => array('Lov.' . $this->Lov->primaryKey => $id));
        $this->request->data = $this->Lov->find('first', $options);
		$this->set('lov', $this->Lov->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Lov->create();
			if ($this->Lov->save($this->request->data)) {
				$this->Session->setFlash(__('The lov has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lov could not be saved. Please, try again.'));
			}
		}
		$parentLovs = array();//$this->Lov->ParentLov->find('list');
        $parentLovsAll = $this->Lov->find('all', array(
            'fields' => array(
                'Lov.id',
                "CONCAT( Lov.type, '    --    ', Lov.value ) as elval"
            ),
            'order' => array('Lov.type', 'Lov.ordershow'),
        ));
        $parentLovs[0] = "Ninguno";
        foreach ($parentLovsAll as $key => $value)
        {
            $parentLovs[$value["Lov"]["id"]] = $value["0"]["elval"];
        }
		$this->set(compact('parentLovs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Lov->exists($id)) {
			throw new NotFoundException(__('Invalid lov'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lov->save($this->request->data)) {
				$this->Session->setFlash(__('The lov has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lov could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lov.' . $this->Lov->primaryKey => $id));
			$this->request->data = $this->Lov->find('first', $options);
		}
        $parentLovs = array();//$this->Lov->ParentLov->find('list');
        $parentLovsAll = $this->Lov->find('all', array(
            'fields' => array(
                'Lov.id',
                "CONCAT( Lov.type, '    --    ', Lov.value ) as elval"
            ),
            'order' => array('Lov.type', 'Lov.ordershow'),
        ));
        $parentLovs[0] = "Ninguno";
        foreach ($parentLovsAll as $key => $value)
        {
            $parentLovs[$value["Lov"]["id"]] = $value["0"]["elval"];
        }
		$this->set(compact('parentLovs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Lov->id = $id;
		if (!$this->Lov->exists()) {
			throw new NotFoundException(__('Invalid lov'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Lov->delete()) {
			$this->Session->setFlash(__('The lov has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lov could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
