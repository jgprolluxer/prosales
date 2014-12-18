<?php

App::uses('AppController', 'Controller');

/**
 * ActPlans Controller
 * @property Lov $Lov
 * @property ActPlan $ActPlan
 */
class ActPlansController extends AppController {

    public $components = array('DataTable');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ActPlan->recursive = 0;
        $this->set('actPlans', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    /**
     * excel method
     *
     * @return void
     */
    public function excel($dataFilter = "") {

        $arrayConditions = array('ActPlan.id >=' => 1);

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('ActPlan.id LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.name LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.type LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.trigger_object LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.trigger_event LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $actPlan = $this->ActPlan->find('all', array(
            'fields' => array('ActPlan.name',
                'ActPlan.type',
                'ActPlan.trigger_object',
                'ActPlan.trigger_event',
                'ActPlan.updated', 'UpdatedBy.username'),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Tipo', 'Objeto', 'Evento', 'Modificado', 'Modificado por');

        $data = array();
        if (!empty($actPlan)) {
            $row = 0;
            foreach ($actPlan as $value) {
                $data[$row] = array(
                    $value['ActPlan']['name'],
                    $value['ActPlan']['type'],
                    $value['ActPlan']['trigger_object'],
                    $value['ActPlan']['trigger_event'],
                    $value['ActPlan']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }

        $this->layout = 'excel';
        $this->set(array('data' => $data, 'headers' => $headers));
    }

    /**
     * pdf method
     *
     * @return void
     */
    public function pdf($dataFilter = "") {
        Configure::write('debug', 0);

        $arrayConditions = array('ActPlan.id >=' => 1);


        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('ActPlan.id LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.name LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.type LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.trigger_object LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.trigger_event LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlan.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }

        $actPlan = $this->ActPlan->find('all', array(
            'fields' => array('ActPlan.name',
                'ActPlan.type',
                'ActPlan.trigger_object',
                'ActPlan.trigger_event',
                'ActPlan.updated', 'UpdatedBy.username'),
            'conditions' => $arrayConditions
        ));
        $headers = array('Nombre', 'Tipo', 'Objeto', 'Evento', 'Modificado', 'Modificado por');

        $data = array();
        if (!empty($actPlan)) {
            $row = 0;
            foreach ($actPlan as $value) {
                $data[$row] = array(
                    $value['ActPlan']['name'],
                    $value['ActPlan']['type'],
                    $value['ActPlan']['trigger_object'],
                    $value['ActPlan']['trigger_event'],
                    $value['ActPlan']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }

        $this->layout = 'pdf';
        $this->set(array('data' => $data, 'headers' => $headers));
    }

    public function jsindex() {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(4, 5, 6)));
        $this->DataTable->showActions = array("idCol" => 0);

        $this->paginate = array(
            'fields' => array('ActPlan.id',
                "CONCAT('<a href=\"" . Router::url("/ActPlans/edit/") . "', ActPlan.id, '\">', ActPlan.name ,'</a>') as planName",
                'ActPlan.type', 'ActPlan.trigger_object', 'ActPlan.trigger_event',
                'ActPlan.updated', 'UpdatedBy.username',
            ),
            'conditions' => array(
                'ActPlan.id >=' => 1
            )
        );
        $this->DataTable->fields = array('ActPlan.id', '0.planName', 'ActPlan.type', 'ActPlan.trigger_object', 'ActPlan.trigger_event', 'ActPlan.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('ActPlan.id', 'ActPlan.name', 'ActPlan.type', 'ActPlan.trigger_object', 'ActPlan.trigger_event', 'ActPlan.updated', 'UpdatedBy.username');

        echo json_encode($this->DataTable->getResponse());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ActPlan->id = $id;
        if (!$this->ActPlan->exists()) {
            throw new NotFoundException(__('Invalid act plan'));
        }
        $this->set('actPlan', $this->ActPlan->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ActPlan->create();
            if ($this->ActPlan->save($this->request->data)) {
                $this->Session->setFlash(__('The act plan has been saved'));

                $actPlanId = $this->ActPlan->getLastInsertId();
                $this->redirect(array('action' => 'edit', $actPlanId));
            } else {
                $this->Session->setFlash(__('The act plan could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $planType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planObj = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TRIG_OBJ',
                'Lov.active_flg =' => '1'),
        ));

        $planEvent = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TRIG_EVT',
                'Lov.active_flg =' => '1'),
        ));

        $this->set(compact('planEvent', 'planObj', 'planType'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ActPlan->id = $id;
        if (!$this->ActPlan->exists()) {
            throw new NotFoundException(__('Invalid act plan'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ActPlan->save($this->request->data)) {
                $this->Session->setFlash(__('The act plan has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The act plan could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ActPlan->read(null, $id);
            $this->params['NAV_DISPLAY'] = $this->request->data["ActPlan"]["name"];
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $planType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planObj = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TRIG_OBJ',
                'Lov.active_flg =' => '1'),
        ));

        $planEvent = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_TRIG_EVT',
                'Lov.active_flg =' => '1'),
        ));

        $this->set(compact('planEvent', 'planObj', 'planType'));
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
            throw new MethodNotAllowedException();
        }
        $this->ActPlan->id = $id;
        if (!$this->ActPlan->exists()) {
            throw new NotFoundException(__('Invalid act plan'));
        }
        if ($this->ActPlan->delete()) {
            $this->Session->setFlash(__('Act plan deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Act plan was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {

        $this->params['ACTIVE_MENU'] = "#catalogs-nav";
        $this->params['CURRENT_PAGE'] = "catalog";
        parent::beforeFilter();
    }

}
