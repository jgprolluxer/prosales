<?php

App::uses('AppController', 'Controller');

/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NotesController extends AppController {

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
    public function index() {
        $this->Note->recursive = 0;
        $this->set('notes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
        $this->request->data = $this->Note->find('first', $options);
        $this->set('note', $this->Note->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Note->create();
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
            $this->request->data = $this->Note->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Note->id = $id;
        if (!$this->Note->exists()) {
            throw new NotFoundException(__('Invalid note'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Note->delete()) {
            $this->Session->setFlash(__('The note has been deleted.'));
        } else {
            $this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Note->recursive = 0;
        $this->set('notes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
        $this->request->data = $this->Note->find('first', $options);
        $this->set('note', $this->Note->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Note->create();
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Note->exists($id)) {
            throw new NotFoundException(__('Invalid note'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Note->save($this->request->data)) {
                $this->Session->setFlash(__('The note has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The note could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
            $this->request->data = $this->Note->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Note->id = $id;
        if (!$this->Note->exists()) {
            throw new NotFoundException(__('Invalid note'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Note->delete()) {
            $this->Session->setFlash(__('The note has been deleted.'));
        } else {
            $this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function jsaddNote() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try {
            $arrayConditions = array();
            $results = array();
            switch ($this->request->query['format']) {
                case 'addNoteFromAccount':
                    $this->Note->save($this->request->query['noteValue']);
                    break;
            }
        } catch (Exception $ex) {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);
    }

    public function jsNote() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array(
            'success' => true,
            'message' => 'NOTHING',
            'xData' => array()
        );

        $this->log("el note", "debug"); // app/tmp/logs/debug.log
        $this->log($this->request->data, "debug");


        $this->log("los parametros en get", "debug");
        $this->log($this->request->query, "debug");

        try {
            if (isset($this->request->query['CRUD_operation'])) {
                $operation = $this->request->query['CRUD_operation'];
            } else {
                throw new Exception(__('NOTE_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET'));
            }
            switch ($operation) {
                case "CREATE":
                    $this->Note->recursive = -1;
                    $this->Note->create();
                    if ($this->Note->save($this->request->data)) {
                        $response = array(
                            'success' => true,
                            'message' => 'Correcto',
                            'xData' => $this->Note->read(null, $this->Note->getLastInsertID())
                        );
                    } else {
                        $response = array(
                            'success' => false,
                            'message' => json_encode($this->Note->validationErrors),
                            'xData' => array()
                        );
                    }
                    break;                
            }
        } catch (Exception $ex) {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);
    }

}
