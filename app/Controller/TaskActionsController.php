<?php

App::uses('AppController', 'Controller');

/**
 * TaskActions Controller
 *
 * @property TaskAction $TaskAction
 */
class TaskActionsController extends AppController {

    public $components = array('DataTable', 'ControllerList');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TaskAction->recursive = 0;
        $this->set('taskActions', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    public function api_index() {
        $taskActions = $this->TaskAction->find('all');
        $this->set(array(
            'taskActions' => $taskActions,
            '_serialize' => array('taskActions')
        ));
    }

    public function jsindex($relObjId = "") {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(4, 5, 6)));
        $this->DataTable->showActions = array("idCol" => 0);

        if ($relObjId != "") {
            $arrayConditions = array(
                'TaskAction.task_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskAction.id >=' => 1
            );
        }

        $this->paginate = array(
            'fields' => array('TaskAction.id',
                "CONCAT('<a href=\"" . Router::url("/TaskActions/edit/") . "', TaskAction.id, '\">', TaskAction.name ,'</a>') as planName",
                'TaskAction.text', 'TaskAction.controller', 'TaskAction.action',
                'TaskAction.updated', 'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions,
        );
        $this->DataTable->fields = array('TaskAction.id', '0.planName', 'TaskAction.text', 'TaskAction.controller', 'TaskAction.action', 'TaskAction.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('TaskAction.id', 'TaskAction.name', 'TaskAction.text', 'TaskAction.controller', 'TaskAction.action', 'TaskAction.updated', 'UpdatedBy.username');

        echo json_encode($this->DataTable->getResponse());
    }

    /**
     * export excel method
     *
     * @return void
     */
    public function excel($relObjId = "", $dataFilter = "") {
        if ($relObjId != "") {
            $arrayConditions = array(
                'TaskAction.task_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskAction.id >=' => 1
            );
        }
    
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskAction.id LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.name LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.text LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.controller LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.action LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $taskAction = $this->TaskAction->find('all', array(
            'fields' => array(
                "TaskAction.name",
                'TaskAction.text',
                'TaskAction.controller',
                'TaskAction.action',
                'TaskAction.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Descripcion', 'Controlador', 'Accion', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskAction)) {
            $row = 0;
            foreach ($taskAction as $value) {
                $data[$row] = array(
                    $value['TaskAction']['name'],
                    $value['TaskAction']['text'],
                    $value['TaskAction']['controller'],
                    $value['TaskAction']['action'],
                    $value['TaskAction']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }
        $this->layout = 'excel';
        $this->set(array('data' => $data, 'headers' => $headers));
    }

    /**
     * export pdf method
     *
     * @return void
     */
    public function pdf($relObjId = "", $dataFilter = "") {
        if ($relObjId != "") {
            $arrayConditions = array(
                'TaskAction.task_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskAction.id >=' => 1
            );
        }

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskAction.id LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.name LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.text LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.controller LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.action LIKE' => '%' . $dataFilter . '%'),
                    array('TaskAction.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $taskAction = $this->TaskAction->find('all', array(
            'fields' => array(
                "TaskAction.name",
                'TaskAction.text',
                'TaskAction.controller',
                'TaskAction.action',
                'TaskAction.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Descripcion', 'Controlador', 'Accion', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskAction)) {
            $row = 0;
            foreach ($taskAction as $value) {
                $data[$row] = array(
                    $value['TaskAction']['name'],
                    $value['TaskAction']['text'],
                    $value['TaskAction']['controller'],
                    $value['TaskAction']['action'],
                    $value['TaskAction']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }
        $this->layout = 'pdf';
        $this->set(array('data' => $data, 'headers' => $headers));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            throw new NotFoundException(__('Invalid task action'));
        }
        $this->set('taskAction', $this->TaskAction->read(null, $id));
    }

    public function api_view($id = null) {
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            $this->set(array(
                'message' => 'Invalid task action',
                '_serialize' => array('message')
            ));
        } else {
            $this->set(array(
                'taskAction' => $this->TaskAction->read(null, $id),
                '_serialize' => array('taskAction')
            ));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($taskId) {
        if ($this->request->is('post')) {
            $this->TaskAction->create();
            if ($this->TaskAction->save($this->request->data)) {
                $this->Session->setFlash(__('The task action has been saved'));
                $actionId = $this->TaskAction->getLastInsertId();
                $this->redirect(array('action' => 'edit', $actionId));
            } else {
                $this->Session->setFlash(__('The task action could not be saved. Please, try again.'));
            }
        }
        $tasks = $this->TaskAction->Task->find('list');
        $this->set(compact('tasks'));

        $task = $this->TaskAction->Task->read("", $taskId);
        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));

        $this->set(compact('task', 'ctrlList'));
    }

    public function api_add() {
        $this->TaskAction->create();
        if ($this->TaskAction->save($this->request->data)) {
            $message = 'The task action has been saved';
        } else {
            $message = 'The task action could not be saved. Please, try again.';
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            throw new NotFoundException(__('Invalid task action'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TaskAction->save($this->request->data)) {
                $this->Session->setFlash(__('The task action has been saved'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task action could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->TaskAction->read(null, $id);
            $this->params['NAV_DISPLAY'] = $this->request->data["TaskAction"]["name"];
        }

        $taskId = $this->request->data["TaskAction"]["task_id"];
        $task = $this->TaskAction->Task->read("", $taskId);
        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));

        $this->set(compact('task', 'ctrlList'));
    }

    public function api_edit($id = null) {
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            $message = 'Invalid task action';
        } else {
            if ($this->TaskAction->save($this->request->data)) {
                $message = 'The task action has been saved';
            } else {
                $message = 'The task action could not be saved. Please, try again.';
            }
        }

        $this->set(array('message' => $message, '_serialize' => array('message')));
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
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            throw new NotFoundException(__('Invalid task action'));
        }
        if ($this->TaskAction->delete()) {
            $this->Session->setFlash(__('Task action deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Task action was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function api_delete($id = null) {
        $this->TaskAction->id = $id;
        if (!$this->TaskAction->exists()) {
            $message = 'Invalid task action';
        } else {
            if ($this->TaskAction->delete($id)) {
                $message = 'Task action deleted';
            } else {
                $message = 'Task action was not deleted';
            }
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }

    public function beforeFilter() {

        $this->params['ACTIVE_MENU'] = "#catalogs-nav";
        $this->params['CURRENT_PAGE'] = "catalog";
        parent::beforeFilter();
    }

}
