<?php
App::uses('AppController', 'Controller');
/**
 * Reports Controller
 *
 * @property Report $Report
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReportsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'ControllerList');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Report->recursive = 0;
		$this->set('reports', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
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
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
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
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Report->delete()) {
			$this->Session->setFlash(__('The report has been deleted.'));
		} else {
			$this->Session->setFlash(__('The report could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Report->recursive = 0;
		$this->set('reports', $this->Paginator->paginate());
	}

    public function admnJsIndex()
    {
        $this->log('loading report data');
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try{
            $reports = $this->Report->find(
                'all',
                array(
                    'conditions' => array(
                        'Report.id >=' => 1,
                        'Report.status' => array(StatusOfReport::Active)
                    )
                )
            );
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $reports
            );
        }catch (Exeption $ex)
        {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }

        echo json_encode($response);
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		}

        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
        $ctrls = (array_combine(array_keys($ctrlList), array_keys($ctrlList)));
        $models = (array_combine(App::objects('model'), App::objects('model')));


        $this->loadModel('Lov');
        $this->Lov->recursive = -1;

        $lovReportRKey = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'REPORT_FIELD_RKEY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovReportType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'REPORT_FIELD_TYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovReportStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'REPORT_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovReportCategory = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'REPORT_FIELD_ CATEGORY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovReportFindType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'REPORT_FIELD_FINDTYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));


        $this->set(compact('models', 'lovReportRKey', 'lovReportType', 'lovReportStatus', 'lovReportCategory', 'lovReportFindType'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
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
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Report->delete()) {
			$this->Session->setFlash(__('The report has been deleted.'));
		} else {
			$this->Session->setFlash(__('The report could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
