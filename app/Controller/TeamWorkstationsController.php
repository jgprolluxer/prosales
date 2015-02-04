<?php
App::uses('AppController', 'Controller');
/**
 * TeamWorkstations Controller
 *
 * @property TeamWorkstation $TeamWorkstation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TeamWorkstationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session', 'DataTable', 'Navigation');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TeamWorkstation->recursive = 0;
		$this->set('teamWorkstations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeamWorkstation->exists($id)) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		$options = array('conditions' => array('TeamWorkstation.' . $this->TeamWorkstation->primaryKey => $id));
		$this->set('teamWorkstation', $this->TeamWorkstation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeamWorkstation->create();
			if ($this->TeamWorkstation->save($this->request->data)) {
				$this->Session->setFlash(__('The team workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team workstation could not be saved. Please, try again.'));
			}
		}
		$teams = $this->TeamWorkstation->Team->find('list');
		$workstations = $this->TeamWorkstation->Workstation->find('list');
		$createdBies = $this->TeamWorkstation->CreatedBy->find('list');
		$updatedBies = $this->TeamWorkstation->UpdatedBy->find('list');
		$this->set(compact('teams', 'workstations', 'createdBies', 'updatedBies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TeamWorkstation->exists($id)) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeamWorkstation->save($this->request->data)) {
				$this->Session->setFlash(__('The team workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team workstation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeamWorkstation.' . $this->TeamWorkstation->primaryKey => $id));
			$this->request->data = $this->TeamWorkstation->find('first', $options);
		}
		$teams = $this->TeamWorkstation->Team->find('list');
		$workstations = $this->TeamWorkstation->Workstation->find('list');
		$createdBies = $this->TeamWorkstation->CreatedBy->find('list');
		$updatedBies = $this->TeamWorkstation->UpdatedBy->find('list');
		$this->set(compact('teams', 'workstations', 'createdBies', 'updatedBies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TeamWorkstation->id = $id;
		if (!$this->TeamWorkstation->exists()) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeamWorkstation->delete()) {
			$this->Session->setFlash(__('The team workstation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team workstation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TeamWorkstation->recursive = 0;
		$this->set('teamWorkstations', $this->Paginator->paginate());
	}

    /**
     * @param null $teamID
     */
    public function jsindexadmin($teamID = null)
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array(
            'TeamWorkstation.id >=' => 1
        );
        if(null !== $teamID)
        {
            $arrayConditions = array(
                'TeamWorkstation.id >=' => 1,
                'Team.id =' => $teamID
            );
        }

        $this->paginate = array(
            'fields' => array(
                'TeamWorkstation.id',
                "CONCAT('<a href=\"" . Router::url("/admin/Workstations/view/") . "', Workstation.id, '\">', Workstation.title ,'</a>') as workstationview",
                "CONCAT('<a href=\"" . Router::url("/admin/TeamWorkstations/view/") . "', TeamWorkstation.id, '\" class=\"btn btn-xs btn-info\">', '<i class=\"fa fa-eye fa-fw\"></i>' ,'</a>') as teamworkstationview",
            ),
            'conditions' => $arrayConditions
        );

        $this->DataTable->fields = array(
            'TeamWorkstation.id',
            '0.productview',
            '0.teamworkstationview',
        );

        $this->DataTable->filterFields = array(
            'TeamWorkstation.id',
        );

        echo json_encode($this->DataTable->getResponse());
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TeamWorkstation->exists($id)) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		$options = array('conditions' => array('TeamWorkstation.' . $this->TeamWorkstation->primaryKey => $id));
		$this->set('teamWorkstation', $this->TeamWorkstation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TeamWorkstation->create();
			if ($this->TeamWorkstation->save($this->request->data)) {
				$this->Session->setFlash(__('The team workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team workstation could not be saved. Please, try again.'));
			}
		}
		$teams = $this->TeamWorkstation->Team->find('list');
		$workstations = $this->TeamWorkstation->Workstation->find('list');
		$createdBies = $this->TeamWorkstation->CreatedBy->find('list');
		$updatedBies = $this->TeamWorkstation->UpdatedBy->find('list');
		$this->set(compact('teams', 'workstations', 'createdBies', 'updatedBies'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TeamWorkstation->exists($id)) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeamWorkstation->save($this->request->data)) {
				$this->Session->setFlash(__('The team workstation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team workstation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeamWorkstation.' . $this->TeamWorkstation->primaryKey => $id));
			$this->request->data = $this->TeamWorkstation->find('first', $options);
		}
		$teams = $this->TeamWorkstation->Team->find('list');
		$workstations = $this->TeamWorkstation->Workstation->find('list');
		$createdBies = $this->TeamWorkstation->CreatedBy->find('list');
		$updatedBies = $this->TeamWorkstation->UpdatedBy->find('list');
		$this->set(compact('teams', 'workstations', 'createdBies', 'updatedBies'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TeamWorkstation->id = $id;
		if (!$this->TeamWorkstation->exists()) {
			throw new NotFoundException(__('Invalid team workstation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeamWorkstation->delete()) {
			$this->Session->setFlash(__('The team workstation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team workstation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function getTeam()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array(
            'success' => false,
            'message' => '',
            'xData' => array()
        );
        try{
            $uLogged = CakeSession::read('Auth.User');
        }catch(Exception $ex)
        {

        }

        echo json_encode($response);
    }
}
