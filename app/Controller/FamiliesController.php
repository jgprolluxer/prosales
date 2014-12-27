<?php

App::uses('AppController', 'Controller');

/**
 * Families Controller
 *
 * @property Family $Family
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FamiliesController extends AppController {

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
        $this->Family->recursive = 0;
        $this->set('families', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
        $this->request->data = $this->Family->find('first', $options);
        $this->set('family', $this->Family->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Family->create();
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
            $this->request->data = $this->Family->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Family->id = $id;
        if (!$this->Family->exists()) {
            throw new NotFoundException(__('Invalid family'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Family->delete()) {
            $this->Session->setFlash(__('The family has been deleted.'));
        } else {
            $this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Family->recursive = 0;
        $this->set('families', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
        $this->request->data = $this->Family->find('first', $options);
        $this->set('family', $this->Family->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Family->create();
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Family->exists($id)) {
            throw new NotFoundException(__('Invalid family'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Family->save($this->request->data)) {
                $this->Session->setFlash(__('The family has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Family.' . $this->Family->primaryKey => $id));
            $this->request->data = $this->Family->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovFamilyStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'FAMILY_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('lovFamilyStatus'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Family->id = $id;
        if (!$this->Family->exists()) {
            throw new NotFoundException(__('Invalid family'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Family->delete()) {
            $this->Session->setFlash(__('The family has been deleted.'));
        } else {
            $this->Session->setFlash(__('The family could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * 
     */
    public function jsfindFamily() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array();
        $response = array();
        $results = array();
        try {

            switch ($this->request->query['format']) {
                case 'fullsearch': {
                        if ("0" !== $this->request->query['familyid'] && "" !== $this->request->query['familyid']) {

                            $arrayConditions = array(
                                'Family.id >= ' => 1,
                                'Family.id = ' => $this->request->query['familyid']
                            );
                        } else {
                            $arrayConditions = array(
                                "OR" => array(
                                    'Family.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                                )
                            );
                        }
                        $this->Family->recursive = 1; /// buscar todo con relaciones
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = $results;
                    }
                    break;
                case 'autocompletelist': {
                        $this->Family->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            "OR" => array(
                                'Family.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                            )
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value) {
                            $response[$key]["id"] = $value["Family"]["id"];
                            $response[$key]["value"] = $value["Family"]["firstname"] . ' ' . $value["Family"]["lastname"] . " (" . $value['Family']['familyname'] . ")";
                        }
                    }
                    break;
                case 'typeahead': {
                        $this->Family->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            'Family.id >= ' => 1
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value) {
                            $response[$key]["id"] = $value["Family"]["id"];
                            $response[$key]["value"] = $value["Family"]["firstname"] . ' ' . $value["Family"]["lastname"] . " (" . $value['Family']['Familyname'] . ")";
                        }
                    }
                    break;
                case 'all': {
                        $this->Family->recursive = 1;
                        $arrayConditions = array(
                            'Family.id >= ' => 1,
                            'Family.status' => array(StatusOfFamily::Active)
                        );
                        $results = $this->Family->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = array(
                            'success' => true,
                            'xData' => $results,
                            'message' => 'Correcto'
                        );
                    }
                    break;
                default :
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
