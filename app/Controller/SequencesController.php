<?php

App::uses('AppController', 'Controller');

/**
 * Sequences Controller
 *
 * @property Sequence $Sequence
 */
class SequencesController extends AppController {

    public $components = array('DataTable');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Sequence->recursive = 0;
        $this->set('sequences', $this->paginate());
        $this->params['APP_INIT'] = "table_managed";
    }

    public function api_index() {
        $sequences = $this->Sequence->find('all');
        $this->set(array(
            'sequences' => $sequences,
            '_serialize' => array('sequences')
        ));
    }

    /**
     * export excel method
     *
     * @return void
     */
    public function excel($dataFilter = "") {
        $arrayConditions = array('Sequence.id >=' => 1);
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('Sequence.id LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.name LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.value LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }
        $sequences = $this->Sequence->find('all', array(
            'fields' => array(
                "Sequence.name",
                'Sequence.value',
                'Sequence.updated',
                'UpdatedBy.username'),
            'conditions' => $arrayConditions));
        $headers = array('Nombre', 'Valor_Actual', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($sequences)) {
            $row = 0;
            foreach ($sequences as $value) {
                $data[$row] = array(
                    $value['Sequence']['name'],
                    $value['Sequence']['value'],
                    $value['Sequence']['updated'],
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
    public function pdf($dataFilter = "") {
        Configure::write('debug', 0);
        $arrayConditions = array('Sequence.id >=' => 1);
        if ($dataFilter != "") {
            $arrayConditions = array(
                'OR' => array(
                    array('Sequence.id LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.name LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.value LIKE' => '%' . $dataFilter . '%'),
                    array('Sequence.updated LIKE' => '%' . $dataFilter . '%'),
                    array('UpdatedBy.username LIKE' => '%' . $dataFilter . '%')
            ));
        }
        $sequences = $this->Sequence->find('all', array(
            'fields' => array(
                "Sequence.name",
                'Sequence.value',
                'Sequence.updated',
                'UpdatedBy.username'),
            'conditions' => $arrayConditions));
        $headers = array('Nombre', 'Valor_Actual', 'Modificado', 'Modificado por');
        $data = array();
        if (!empty($sequences)) {
            $row = 0;
            foreach ($sequences as $value) {
                $data[$row] = array(
                    $value['Sequence']['name'],
                    $value['Sequence']['value'],
                    $value['Sequence']['updated'],
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
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            throw new NotFoundException(__('Invalid sequence'));
        }
        $this->set('sequence', $this->Sequence->read(null, $id));
    }

    public function api_view($id = null) {
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            $this->set(array(
                'message' => 'Invalid sequence',
                '_serialize' => array('message')
            ));
        } else {
            $this->set(array(
                'sequence' => $this->Sequence->read(null, $id),
                '_serialize' => array('sequence')
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
            $this->Sequence->create();
            if ($this->Sequence->save($this->request->data)) {
                $this->Session->setFlash(__('The sequence has been saved'));

                $seqId = $this->Sequence->getLastInsertId();
                $this->redirect(array('action' => 'edit', $seqId));
            } else {
                $this->Session->setFlash(__('The sequence could not be saved. Please, try again.'));
            }
        }
    }

    public function api_add() {
        $this->Sequence->create();
        if ($this->Sequence->save($this->request->data)) {
            $message = 'The sequence has been saved';
        } else {
            $message = 'The sequence could not be saved. Please, try again.';
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
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            throw new NotFoundException(__('Invalid sequence'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Sequence->save($this->request->data)) {
                $this->Session->setFlash(__('The sequence has been saved'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sequence could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Sequence->read(null, $id);
            $this->params['NAV_DISPLAY'] = $this->request->data["Sequence"]["name"];
        }
    }

    public function api_edit($id = null) {
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            $message = 'Invalid sequence';
        } else {
            if ($this->Sequence->save($this->request->data)) {
                $message = 'The sequence has been saved';
            } else {
                $message = 'The sequence could not be saved. Please, try again.';
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
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            throw new NotFoundException(__('Invalid sequence'));
        }
        if ($this->Sequence->delete()) {
            $this->Session->setFlash(__('Sequence deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Sequence was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function api_delete($id = null) {
        $this->Sequence->id = $id;
        if (!$this->Sequence->exists()) {
            $message = 'Invalid sequence';
        } else {
            if ($this->Sequence->delete($id)) {
                $message = 'Sequence deleted';
            } else {
                $message = 'Sequence was not deleted';
            }
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }

    public function beforeFilter() {

        $this->params['ACTIVE_MENU'] = "#catalogs-nav";
        $this->params['CURRENT_PAGE'] = "catalog";
        parent::beforeFilter();
    }

    public function jsindex() {

        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->DataTable->emptyElements = 0;
        $this->DataTable->columnsStyle = array(array("cssclass" => "hidden-480", "targets" => array(2, 3)));
        $this->DataTable->showActions = array("idCol" => 0);
        $this->paginate = array(
            'fields' => array('Sequence.id',
                "CONCAT('<a href=\"" . Router::url("/Sequences/edit/") . "', Sequence.id, '\">', Sequence.name ,'</a>') as tname",
                'Sequence.value',
                'Sequence.updated',
                'UpdatedBy.username'),
            'conditions' => array(
                'Sequence.id >=' => 1
            )
        );
        $this->DataTable->fields = array('Sequence.id', '0.tname', 'Sequence.value', 'Sequence.updated', 'UpdatedBy.username');
        $this->DataTable->filterFields = array('Sequence.id', 'Sequence.name', 'Sequence.value', 'Sequence.updated', 'UpdatedBy.username');

        echo json_encode($this->DataTable->getResponse());
    }

}
