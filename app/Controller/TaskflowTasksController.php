<?php

App::uses('AppController', 'Controller');

/**
 * TaskflowTasks Controller
 *
 * @property TaskflowTask $TaskflowTask
 */
class TaskflowTasksController extends AppController {

    public $components = array('DataTable', 'ControllerList');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TaskflowTask->recursive = 0;
        $this->set('taskflowTasks', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    public function api_index() {
        $taskflowTasks = $this->TaskflowTask->find('all');
        $this->set(array(
            'taskflowTasks' => $taskflowTasks,
            '_serialize' => array('taskflowTasks')
        ));
    }

    public function jsindex($relObjId = 0) {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(4, 5, 6)));
        $this->DataTable->showActions = array("idCol" => 0);

        if ($relObjId != 0 && $relObjId != "") {
            $arrayConditions = array(
                'TaskflowTask.taskflow_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskflowTask.id >=' => 1
            );
        }

        $this->paginate = array(
            'fields' => array('TaskflowTask.id', 'TaskflowTask.order',
                "CONCAT('<a href=\"" . Router::url("/TaskflowTasks/edit/") . "', TaskflowTask.id, '\">', TaskflowTask.name ,'</a>') as planName",
                'TaskflowTask.duration', 'TaskflowTask.monitor_object',
                'TaskflowTask.updated', 'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions,
        );
        $this->DataTable->fields = array('TaskflowTask.id', 'TaskflowTask.order', '0.planName', 'TaskflowTask.monitor_object', 'TaskflowTask.duration', 'TaskflowTask.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('TaskflowTask.id', 'TaskflowTask.order', 'TaskflowTask.name', 'TaskflowTask.monitor_object', 'TaskflowTask.duration', 'TaskflowTask.updated', 'UpdatedBy.username');

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
                'TaskflowTask.taskflow_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskflowTask.id >=' => 1
            );
        }
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskflowTask.id LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.order LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.name LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.monitor_object LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.duration LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $taskflowTask = $this->TaskflowTask->find('all', array(
            'fields' => array('TaskflowTask.order',
                " TaskflowTask.name",
                'TaskflowTask.duration',
                'TaskflowTask.monitor_object',
                'TaskflowTask.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Orden', 'Nombre', 'Duracion', 'Objeto relacionado', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflowTask)) {
            $row = 0;
            foreach ($taskflowTask as $value) {
                $data[$row] = array(
                    $value['TaskflowTask']['order'],
                    $value['TaskflowTask']['name'],
                    $value['TaskflowTask']['duration'],
                    $value['TaskflowTask']['monitor_object'],
                    $value['TaskflowTask']['updated'],
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
                'TaskflowTask.taskflow_id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskflowTask.id >=' => 1
            );
        }
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskflowTask.id LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.order LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.name LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.monitor_object LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.duration LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowTask.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $taskflowTask = $this->TaskflowTask->find('all', array(
            'fields' => array('TaskflowTask.order',
                " TaskflowTask.name",
                'TaskflowTask.duration',
                'TaskflowTask.monitor_object',
                'TaskflowTask.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Orden', 'Nombre', 'Duracion', 'Objeto relacionado', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflowTask)) {
            $row = 0;
            foreach ($taskflowTask as $value) {
                $data[$row] = array(
                    $value['TaskflowTask']['order'],
                    $value['TaskflowTask']['name'],
                    $value['TaskflowTask']['duration'],
                    $value['TaskflowTask']['monitor_object'],
                    $value['TaskflowTask']['updated'],
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
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            throw new NotFoundException(__('Invalid taskflow task'));
        }
        $this->set('taskflowTask', $this->TaskflowTask->read(null, $id));
    }

    public function api_view($id = null) {
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            $this->set(array('message' => 'Invalid taskflow task',
                '_serialize' => array('message')
            ));
        } else {
            $this->set(array('taskflowTask' => $this->TaskflowTask->read(null, $id),
                '_serialize' => array('taskflowTask')
            ));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($taskflowId) {
        if ($this->request->is('post')) {
            $this->TaskflowTask->create();
            if ($this->TaskflowTask->save($this->request->data)) {
                $this->Session->setFlash(__('The taskflow task has been saved'));
                $taskId = $this->TaskflowTask->getLastInsertId();
                $this->redirect(array('action' => 'edit', $taskId));
            } else {
                $this->Session->setFlash(__('The taskflow task could not be saved. Please, try again.'));
            }
        }

        $taskflow = $this->TaskflowTask->Taskflow->read("", $taskflowId);
        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));


        $this->set(compact('taskflow', 'ctrlList'));
    }

    public function api_add() {
        $this->TaskflowTask->create();
        if ($this->TaskflowTask->save($this->request->data)) {
            $message = 'The taskflow task has been saved';
        } else {
            $message = 'The taskflow task could not be saved. Please, try again.';
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
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            throw new NotFoundException(__('Invalid taskflow task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TaskflowTask->save($this->request->data)) {
                $this->Session->setFlash(__('The taskflow task has been saved'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The taskflow task could not be saved. Please, try again.'));
            }
        }
        $this->request->data = $this->TaskflowTask->read(null, $id);
        $this->params['NAV_DISPLAY'] = $this->request->data["TaskflowTask"]["name"];

        $taskflowId = $this->request->data["TaskflowTask"]["taskflow_id"];
        $taskflow = $this->TaskflowTask->Taskflow->read("", $taskflowId);
        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));


        $this->set(compact('taskflow', 'ctrlList'));
    }

    public function api_edit($id = null) {
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            $message = 'Invalid taskflow task';
        } else {
            if ($this->TaskflowTask->save($this->request->data)) {
                $message = 'The taskflow task has been saved';
            } else {
                $message = 'The taskflow task could not be saved. Please, try again.';
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
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            throw new NotFoundException(__('Invalid taskflow task'));
        }
        if ($this->TaskflowTask->delete()) {
            $this->Session->setFlash(__('Taskflow task deleted'));
        }
        $this->Session->setFlash(__('Taskflow task was not deleted'));
        $this->Navigation->Process($this);
        $count = count($this->Navigation->trail);
        $count = $count - 1;
        $this->redirect("/" . $this->Navigation->trail[$count]['url']);
    }

    public function api_delete($id = null) {
        $this->TaskflowTask->id = $id;
        if (!$this->TaskflowTask->exists()) {
            $message = 'Invalid taskflow task';
        } else {
            if ($this->TaskflowTask->delete($id)) {
                $message = 'Taskflow task deleted';
            } else {
                $message = 'Taskflow task was not deleted';
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
