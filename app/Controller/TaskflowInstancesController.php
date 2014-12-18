<?php

App::uses('AppController', 'Controller');

/**
 * TaskflowInstances Controller
 *
 * @property TaskflowInstance $TaskflowInstance
 */
class TaskflowInstancesController extends AppController {

    public $components = array('DataTable', 'ControllerList');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TaskflowInstance->recursive = 0;
        $this->set('taskflowInstances', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    public function api_index() {
        $taskflowInstances = $this->TaskflowInstance->find('all');
        $this->set(array(
            'taskflowInstances' => $taskflowInstances,
            '_serialize' => array('taskflowInstances')
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
                'TaskflowInstance.id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskflowInstance.id >=' => 1,
                'TaskflowInstance.task_id =' => 0,
            );
        }

        $this->paginate = array(
            'joins' => array(
                array(
                    'table' => 'accounts',
                    'alias' => 'Account',
                    'type' => 'left outer',
                    'conditions' => array('TaskflowInstance.rel_object = Account.id')
                )
            ),
            'fields' => array('TaskflowInstance.id',
                "CONCAT('<a href=\"" . Router::url("/TaskflowInstances/edit/") . "', TaskflowInstance.id, '\">', Taskflow.name ,'</a>') as planName",
                "CONCAT('<a href=\"" . Router::url("/Accounts/edit/") . "', Account.id, '\">', Account.firstname ,' ', Account.lastname,'</a>') as accntName",
                "CONCAT('<div class=\"progress progress-striped progress-success\" style=\"margin-bottom:0px !important;\"><div style=\"width:', TaskflowInstance.progress, '%;\" class=\"bar\"></div></div>') as progress",
                'TaskflowInstance.updated', 'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions,
        );
        $this->DataTable->fields = array('TaskflowInstance.id', '0.planName', '0.accntName',
            '0.progress', 'TaskflowInstance.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('TaskflowInstance.id', 'Taskflow.name',
            'Account.firstname', 'TaskflowInstance.progress', 'TaskflowInstance.updated', 'UpdatedBy.username');

        echo json_encode($this->DataTable->getResponse());
    }

    /**
     * export excel method
     *
     * @return void
     */
    public function excel($relObjId = 0, $dataFilter = "") {

        if ($relObjId == 0) {
            $arrayConditions = array(
                'TaskflowInstance.id >=' => 1,
                'TaskflowInstance.task_id =' => 0,
            );
        } else {
            $arrayConditions = array(
                'TaskflowInstance.id =' => $relObjId,
            );
        }

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskflowInstance.id LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.name LIKE' => '%' . $dataFilter . '%'),
                    array('Account.firstname LIKE' => '%' . $dataFilter . '%'),
                    array('Account.lastname LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowInstance.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }

        $taskflowInstance = $this->TaskflowInstance->find('all', array(
            'joins' => array(
                array(
                    'table' => 'accounts',
                    'alias' => 'Account',
                    'type' => 'left outer',
                    'conditions' => array('TaskflowInstance.rel_object = Account.id')
                )
            ),
            'fields' => array(
                " Taskflow.name",
                "CONCAT( Account.firstname ,' ', Account.lastname) as accntName",
                "TaskflowInstance.progress",
                'TaskflowInstance.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Objeto relacionado', 'Progreso', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflowInstance)) {
            $row = 0;
            foreach ($taskflowInstance as $value) {
                $data[$row] = array(
                    $value['Taskflow']['name'],
                    $value[0]['accntName'],
                    $value['TaskflowInstance']['progress'],
                    $value['TaskflowInstance']['updated'],
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
    public function pdf($relObjId = 0, $dataFilter = "") {

        if ($relObjId != 0 && $relObjId != "") {
            $arrayConditions = array(
                'TaskflowInstance.id =' => $relObjId,
            );
        } else {
            $arrayConditions = array(
                'TaskflowInstance.id >=' => 1,
                'TaskflowInstance.task_id =' => 0,
            );
        }

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('TaskflowInstance.id LIKE' => '%' . $dataFilter . '%'),
                    array('Taskflow.name LIKE' => '%' . $dataFilter . '%'),
                    array('Account.firstname LIKE' => '%' . $dataFilter . '%'),
                      array('Account.lastname LIKE' => '%' . $dataFilter . '%'),
                    array('TaskflowInstance.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }
        $taskflowInstance = $this->TaskflowInstance->find('all', array(
            'joins' => array(
                array(
                    'table' => 'accounts',
                    'alias' => 'Account',
                    'type' => 'left outer',
                    'conditions' => array('TaskflowInstance.rel_object = Account.id')
                )
            ),
            'fields' => array(
                " Taskflow.name",
                "CONCAT( Account.firstname ,' ', Account.lastname) as accntName",
                "TaskflowInstance.progress",
                'TaskflowInstance.updated',
                'UpdatedBy.username',
            ),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Objeto relacionado', 'Progreso', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($taskflowInstance)) {
            $row = 0;
            foreach ($taskflowInstance as $value) {
                $data[$row] = array(
                    $value['Taskflow']['name'],
                    $value[0]['accntName'],
                    $value['TaskflowInstance']['progress'],
                    $value['TaskflowInstance']['updated'],
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
        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            throw new NotFoundException(__('Invalid taskflow instance'));
        }
        $this->set('taskflowInstance', $this->TaskflowInstance->read(null, $id));
    }

    public function api_view($id = null) {
        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            $this->set(array('message' => 'Invalid taskflow instance',
                '_serialize' => array('message')
            ));
        } else {
            $this->set(array('taskflowInstance' => $this->TaskflowInstance->read(null, $id),
                '_serialize' => array('taskflowInstance')
            ));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($taskflowId = null, $objectId = null) {

        $taskflow = $this->TaskflowInstance->Taskflow->findById($taskflowId);
        if (empty($taskflow)) {
            $this->Session->setFlash(__('No se encontro o no posee permisos suficientes para ejecutar el flujo de trabajo deseado.'));
            $this->redirect(array('action' => 'index'));
        }

        $taskflowModel = $taskflow["Taskflow"]["trigger_object"];
        $taskflowController = Inflector::pluralize($taskflowModel);

        App::import('Model', $taskflowModel);
        $modelObject = & new $taskflowModel();

        $relatedObject = $modelObject->findById($objectId);

        if (empty($relatedObject)) {
            $this->Session->setFlash(__('No se encontro o no posee permisos suficientes para ejecutar el flujo de trabajo deseado.'));
            $this->redirect(array('action' => 'index'));
        }

        $taskflowIntanceObj = array("TaskflowInstance" => array(
                "taskflow_id" => $taskflow["Taskflow"]["id"],
                "rel_object" => $relatedObject[$taskflowModel]["id"],
                "task_id" => 0,
                "rel_object_type" => $taskflowModel,
                "parent_id" => 0,
        ));

        $this->TaskflowInstance->create();
        if ($this->TaskflowInstance->save($taskflowIntanceObj)) {
            $taskflowInstanceId = $this->TaskflowInstance->getLastInsertId();
            $this->Session->setFlash(__('Se ha iniciado correctamente el flujo de trabajo.'));

            $this->redirect(array('action' => 'edit', $taskflowInstanceId));
        } else {
            $this->Session->setFlash(__('Error, No se ha podido instanciar el flujo de trabajo deseado.'));
        }
    }

    public function api_add() {
        $this->TaskflowInstance->create();
        if ($this->TaskflowInstance->save($this->request->data)) {
            $message = 'The taskflow instance has been saved';
        } else {
            $message = 'The taskflow instance could not be saved. Please, try again.';
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


        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            throw new NotFoundException(__('Invalid taskflow instance'));
        }
        $taskflowInstance = $this->TaskflowInstance->read(null, $id);
        $taskflowId = $taskflowInstance["TaskflowInstance"]["taskflow_id"];
        $objectId = $taskflowInstance["TaskflowInstance"]["rel_object"];
        $taskflow = $this->TaskflowInstance->Taskflow->read(null, $taskflowId);

        if (empty($taskflow)) {
            $this->Session->setFlash(__('No se encontro o no posee permisos suficientes para ejecutar el flujo de trabajo deseado.'));
            $this->redirect(array('action' => 'index'));
        }

        $taskflowModel = $taskflow["Taskflow"]["trigger_object"];
        $taskflowController = Inflector::pluralize($taskflowModel);

        App::import('Model', $taskflowModel);
        $modelObject = & new $taskflowModel();

        $relatedObject = $modelObject->findById($objectId);

        if (empty($relatedObject)) {
            $this->Session->setFlash(__('No se encontro o no posee permisos suficientes para ejecutar el flujo de trabajo deseado.'));
            $this->redirect(array('action' => 'index'));
        }

        $this->set(compact('taskflow', 'relatedObject', 'taskflowInstance'));
    }

    public function api_edit($id = null) {
        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            $message = 'Invalid taskflow instance';
        } else {
            if ($this->TaskflowInstance->save($this->request->data)) {
                $message = 'The taskflow instance has been saved';
            } else {
                $message = 'The taskflow instance could not be saved. Please, try again.';
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
        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            throw new NotFoundException(__('Invalid taskflow instance'));
        }
        if ($this->TaskflowInstance->delete()) {
            $this->Session->setFlash(__('Taskflow instance deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Taskflow instance was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function api_delete($id = null) {
        $this->TaskflowInstance->id = $id;
        if (!$this->TaskflowInstance->exists()) {
            $message = 'Invalid taskflow instance';
        } else {
            if ($this->TaskflowInstance->delete($id)) {
                $message = 'Taskflow instance deleted';
            } else {
                $message = 'Taskflow instance was not deleted';
            }
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }

    public function beforeFilter() {

        $this->params['ACTIVE_MENU'] = "#taskflows-nav";
        $this->params['CURRENT_PAGE'] = "taskflows";
        parent::beforeFilter();
    }

}
