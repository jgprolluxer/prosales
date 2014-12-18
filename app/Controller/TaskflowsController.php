<?php

App::uses('AppController', 'Controller');

/**
 * Taskflows Controller
 *
 * @property Taskflow $Taskflow
 */
class TaskflowsController extends AppController {

    public $components = array('DataTable', 'ControllerList');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Taskflow->recursive = 0;
        $this->set('taskflows', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    public function api_index() {
        $taskflows = $this->Taskflow->find('all');
        $this->set(array(
            'taskflows' => $taskflows,
            '_serialize' => array('taskflows')
        ));
    }

    public function jsindex() {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(4, 5, 6)));
        $this->DataTable->showActions = array("idCol" => 0);

        $this->paginate = array(
            'fields' => array('Taskflow.id',
                "CONCAT('<a href=\"" . Router::url("/Taskflows/edit/") . "', Taskflow.id, '\">', Taskflow.name ,'</a>') as planName",
                'Taskflow.type', 'Taskflow.trigger_object',
                'Taskflow.updated', 'UpdatedBy.username',
            ),
            'conditions' => array(
                'Taskflow.id >=' => 1
            )
        );
        $this->DataTable->fields = array('Taskflow.id', '0.planName', 'Taskflow.type', 'Taskflow.trigger_object', 'Taskflow.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('Taskflow.id', 'Taskflow.name', 'Taskflow.type', 'Taskflow.trigger_object', 'Taskflow.updated', 'UpdatedBy.username');

        echo json_encode($this->DataTable->getResponse());
    }

    /**
     * export excel method
     *
     * @return void
     */
    public function excel($dataFilter = "") {
        $arrayConditions = array('Taskflow.id >=' => 1);
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('Taskflow.id LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.name LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.type LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.trigger_object LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }
        $taskflow = $this->Taskflow->find('all', array(
            'fields' => array(
                " Taskflow.name",
                'Taskflow.type',
                'Taskflow.trigger_object',
                'Taskflow.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Tipo', 'Objeto relacionado', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflow)) {
            $row = 0;
            foreach ($taskflow as $value) {
                $data[$row] = array(
                    $value['Taskflow']['name'],
                    $value['Taskflow']['type'],
                    $value['Taskflow']['trigger_object'],
                    $value['Taskflow']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }
        $this->layout = 'excel';
        $this->set(array('data' => $data, 'headers' => $headers));
    }

    /**
     * export excel method
     *
     * @return void
     */
    public function pdf($dataFilter = "") {
        Configure::write('debug', 0);
        $arrayConditions = array('Taskflow.id >=' => 1);
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('Taskflow.id LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.name LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.type LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.trigger_object LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }
        $taskflow = $this->Taskflow->find('all', array(
            'fields' => array(
                " Taskflow.name",
                'Taskflow.type',
                'Taskflow.trigger_object',
                'Taskflow.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Tipo', 'Objeto relacionado', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflow)) {
            $row = 0;
            foreach ($taskflow as $value) {
                $data[$row] = array(
                    $value['Taskflow']['name'],
                    $value['Taskflow']['type'],
                    $value['Taskflow']['trigger_object'],
                    $value['Taskflow']['updated'],
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
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            throw new NotFoundException(__('Invalid taskflow'));
        }
        $this->set('taskflow', $this->Taskflow->read(null, $id));
    }

    public function api_view($id = null) {
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            $this->set(array('message' => 'Invalid taskflow',
                '_serialize' => array('message')
            ));
        } else {
            $this->set(array('taskflow' => $this->Taskflow->read(null, $id),
                '_serialize' => array('taskflow')
            ));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Taskflow->create();
            if ($this->Taskflow->save($this->request->data)) {

                $this->Session->setFlash(__('The taskflow has been saved'));
                $taskflowId = $this->Taskflow->getLastInsertId();
                $this->redirect(array('action' => 'edit', $taskflowId));
            } else {
                $this->Session->setFlash(__('The taskflow could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $planType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'TASKFLOW_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planObj = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'TASKFLOW_TRIG_OBJ',
                'Lov.active_flg =' => '1'),
        ));
        $this->set(compact('planObj', 'planType'));
    }

    public function api_add() {
        $this->Taskflow->create();
        if ($this->Taskflow->save($this->request->data)) {
            $message = 'The taskflow has been saved';
        } else {
            $message = 'The taskflow could not be saved. Please, try again.';
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
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            throw new NotFoundException(__('Invalid taskflow'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Taskflow->save($this->request->data)) {
                $this->Session->setFlash(__('The taskflow has been saved'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The taskflow could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Taskflow->read(null, $id);
            $this->params['NAV_DISPLAY'] = $this->request->data["Taskflow"]["name"];
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $planType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'TASKFLOW_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planObj = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'TASKFLOW_TRIG_OBJ',
                'Lov.active_flg =' => '1'),
        ));
        $this->set(compact('planObj', 'planType'));
    }

    public function api_edit($id = null) {
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            $message = 'Invalid taskflow';
        } else {
            if ($this->Taskflow->save($this->request->data)) {
                $message = 'The taskflow has been saved';
            } else {
                $message = 'The taskflow could not be saved. Please, try again.';
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
        if (!$this->request->is('post')) {
            //throw new MethodNotAllowedException();
        }
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            throw new NotFoundException(__('Invalid taskflow'));
        }
        if ($this->Taskflow->delete()) {
            $this->Session->setFlash(__('Taskflow deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Taskflow was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function api_delete($id = null) {
        $this->Taskflow->id = $id;
        if (!$this->Taskflow->exists()) {
            $message = 'Invalid taskflow';
        } else {
            if ($this->Taskflow->delete($id)) {
                $message = 'Taskflow deleted';
            } else {
                $message = 'Taskflow was not deleted';
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
