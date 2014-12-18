<?php

App::uses('AppController', 'Controller');

/**
 * ActPlanDetails Controller
 *
 * @property ActPlanDetail $ActPlanDetail
 * @property Lov $Lov
 */
class ActPlanDetailsController extends AppController {

    public $components = array('DataTable');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ActPlanDetail->recursive = 0;
        $this->set('actPlanDetails', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    /**
     * excel method
     *
     * @return void
     */
    public function excel($dataFilter = "") {


        $arrayConditions = array('ActPlanDetail.id >=' => 1);

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('ActPlanDetail.id LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.order LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.name LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.type LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.duration LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }

        $actPlanDetails = $this->ActPlanDetail->find('all', array(
            'fields' => array('ActPlanDetail.order',
                "ActPlanDetail.name",
                'ActPlanDetail.type',
                "CONCAT(ActPlanDetail.duration,' ', ActPlanDetail.duration_uom) as planDuration",
                'ActPlanDetail.updated',
                'UpdatedBy.username'),
            'conditions' => $arrayConditions
        ));

        $headers = array('Orden', 'Nombre', 'Tipo', 'Duracion', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($actPlanDetails)) {
            $row = 0;
            foreach ($actPlanDetails as $value) {
                $data[$row] = array(
                    $value['ActPlanDetail']['order'],
                    $value['ActPlanDetail']['name'],
                    $value['ActPlanDetail']['type'],
                    $value[0]['planDuration'],
                    $value['ActPlanDetail']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }

        $this->layout = 'excel';
        $this->set(array('data' => $data, 'headers' => $headers));
        $this->ActPlanDetail->recursive = 0;
    }

    /**
     * pdf method
     *
     * @return void
     */
    public function pdf($dataFilter = "") {
        Configure::write('debug', 0);
        $arrayConditions = array('ActPlanDetail.id >=' => 1);

        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('ActPlanDetail.id LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.order LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.name LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.type LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.duration LIKE' => '%' . $dataFilter . '%'),
                    array('ActPlanDetail.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%'),
            ));
        }
        $actPlanDetails = $this->ActPlanDetail->find('all', array(
            'fields' => array('ActPlanDetail.order',
                "ActPlanDetail.name",
                'ActPlanDetail.type',
                "CONCAT(ActPlanDetail.duration,' ', ActPlanDetail.duration_uom) as planDuration",
                'ActPlanDetail.updated',
                'UpdatedBy.username'),
            'conditions' => $arrayConditions
        ));

        $headers = array('Orden', 'Nombre', 'Tipo', 'Duracion', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($actPlanDetails)) {
            $row = 0;
            foreach ($actPlanDetails as $value) {
                $data[$row] = array(
                    $value['ActPlanDetail']['order'],
                    $value['ActPlanDetail']['name'],
                    $value['ActPlanDetail']['type'],
                    $value[0]['planDuration'],
                    $value['ActPlanDetail']['updated'],
                    $value['UpdatedBy']['username']);
                $row++;
            }
        }

        $this->layout = 'pdf';
        $this->set(array('data' => $data, 'headers' => $headers));
        $this->ActPlanDetail->recursive = 0;
    }

    public function jsindex() {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(4, 5, 6)));
        $this->DataTable->showActions = array("idCol" => 0);

        $this->paginate = array(
            'fields' => array('ActPlanDetail.id', 'ActPlanDetail.order',
                "CONCAT('<a href=\"" . Router::url("/ActPlanDetails/edit/") . "', ActPlanDetail.id, '\">', ActPlanDetail.name ,'</a>') as planName",
                'ActPlanDetail.type',
                "CONCAT(ActPlanDetail.duration,' ', ActPlanDetail.duration_uom) as planDuration",
                'ActPlanDetail.updated', 'UpdatedBy.username',
            ),
            'conditions' => array(
                'ActPlanDetail.id >=' => 1
            )
        );
        $this->DataTable->fields = array('ActPlanDetail.id', 'ActPlanDetail.order', '0.planName', 'ActPlanDetail.type', '0.planDuration', 'ActPlanDetail.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('ActPlanDetail.id', 'ActPlanDetail.order', 'ActPlanDetail.name', 'ActPlanDetail.type', 'ActPlanDetail.duration', 'ActPlanDetail.updated', 'UpdatedBy.username');

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
        $this->ActPlanDetail->id = $id;
        if (!$this->ActPlanDetail->exists()) {
            throw new NotFoundException(__('Invalid act plan detail'));
        }
        $this->set('actPlanDetail', $this->ActPlanDetail->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($actPlanId) {
        if ($this->request->is('post')) {
            $this->ActPlanDetail->create();
            if ($this->ActPlanDetail->save($this->request->data)) {
                $this->Session->setFlash(__('The act plan detail has been saved'));

                $actPlanDetailId = $this->ActPlanDetail->getLastInsertId();
                $this->redirect(array('action' => 'edit', $actPlanDetailId));
            } else {
                $this->Session->setFlash(__('The act plan detail could not be saved. Please, try again.'));
            }
        }

        $actPlans = $this->ActPlanDetail->ActPlan->read("", $actPlanId);

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $actType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planEvent = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_DET_TRIG_EVT',
                'Lov.active_flg =' => '1'),
        ));

        $actStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_STATUS',
                'Lov.active_flg =' => '1'),
        ));

        $actDurUOM = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_DET_DUR_UOM',
                'Lov.active_flg =' => '1'),
        ));

        $relModel = $actPlans["ActPlan"]["trigger_object"];
        App::import('Model', $relModel);
        $triggerObj = & new $relModel();

        $relObjFields = array();


        foreach (($triggerObj->schema()) as $idx => $field) {

            $relObjFields["none"] = "Select one...";
            $pos = strrpos($idx, "id");
            if ($pos === false) {
                $relObjFields[$idx] = $idx;
            }
        }

        $this->set(compact('actStatus', 'actPlans', 'actType', 'planEvent', 'relObjFields', 'actDurUOM'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ActPlanDetail->id = $id;
        if (!$this->ActPlanDetail->exists()) {
            throw new NotFoundException(__('Invalid act plan detail'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ActPlanDetail->save($this->request->data)) {
                $this->Session->setFlash(__('The act plan detail has been saved'));

                $this->redirect(array('action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__('The act plan detail could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ActPlanDetail->read(null, $id);

            $this->params['NAV_DISPLAY'] = $this->request->data["ActPlanDetail"]["name"];
        }

        $actPlanId = $this->request->data["ActPlanDetail"]["act_plan_id"];

        $actPlans = $this->ActPlanDetail->ActPlan->read("", $actPlanId);

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $actType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_TYPE',
                'Lov.active_flg =' => '1'),
        ));

        $planEvent = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_DET_TRIG_EVT',
                'Lov.active_flg =' => '1'),
        ));

        $actStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_STATUS',
                'Lov.active_flg =' => '1'),
        ));

        $actDurUOM = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.value'),
            'conditions' => array('Lov.type =' => 'ACTIVITY_PLAN_DET_DUR_UOM',
                'Lov.active_flg =' => '1'),
        ));

        $relModel = $actPlans["ActPlan"]["trigger_object"];
        App::import('Model', $relModel);
        $triggerObj = & new $relModel();

        $relObjFields = array();


        foreach (($triggerObj->schema()) as $idx => $field) {

            $relObjFields["none"] = "Select one...";
            $pos = strrpos($idx, "id");
            if ($pos === false) {
                $relObjFields[$idx] = $idx;
            }
        }

        $this->set(compact('actStatus', 'actPlans', 'actType', 'planEvent', 'relObjFields', 'actDurUOM'));
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
        $this->ActPlanDetail->id = $id;
        if (!$this->ActPlanDetail->exists()) {
            throw new NotFoundException(__('Invalid act plan detail'));
        }
        if ($this->ActPlanDetail->delete()) {
            $this->Session->setFlash(__('Act plan detail deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Act plan detail was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {

        $this->params['ACTIVE_MENU'] = "#catalogs-nav";
        $this->params['CURRENT_PAGE'] = "catalog";
        parent::beforeFilter();
    }

}
