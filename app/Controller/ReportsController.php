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


	$startDt = date("Y-m-d H:i:s", strtotime("-30 day"));
	$endDt = date("Y-m-d H:i:s");

	if( isset($this->request->query["startDt"]) && isset($this->request->query["endDt"]) )
	{
		$startDt = $this->request->query["startDt"];
		$endDt = $this->request->query["endDt"];
	}

	$this->set(compact('startDt', 'endDt'));
}


/**
 * index method
 *
 * @return void
 */
public function getReports()
{
	//Configure::write('debug', 0);
	$this->autoRender = false;
	$this->layout = 'ajax';

	$this->log('Dates');
	$this->log($this->request->query);

	$startDt = date("Y-m-d H:i:s", strtotime("-30 day"));
	$endDt = date("Y-m-d H:i:s");

	if( isset($this->request->query["startDt"]) && isset($this->request->query["endDt"]) )
	{
		$startDt = $this->request->query["startDt"];
		$endDt = $this->request->query["endDt"];
	}


	$response = array(
		'success' => false,
		'message' => '',
		'xData' => array()
	);

	$xData = array();
	try
	{

//////////////////Orders Reports
		$this->loadModel('Order');
		$orders = $this->Order->find('all', array(
			'fields' => array(
				'Order.status',
				'IFNULL(SUM(Order.total_amt),0) total'
			),
			'conditions' => array(
				'Order.created >=' => $startDt,
				'Order.created <=' => $endDt
			),
			'group' => array('Order.status')
		));
		$rOrder = array();
		foreach ($orders as $key => $order)
		{
			$rOrder[$key] = array(__($order["Order"]["status"]), intval($order["0"]["total"]) );
		}
		$xData["OrderByStatus"] = $rOrder;


		$orders = $this->Order->find('all', array(
			'fields' => array(
				'DATE_FORMAT(Order.created,"%Y/%m/%d") created',
				'IFNULL(SUM(Order.total_amt),0) total'
			),
			'conditions' => array(
				'Order.status' => array(StatusOfOrder::Closed),
				'Order.created >=' => $startDt,
				'Order.created <=' => $endDt
			),
			'group' => array('DATE_FORMAT(Order.created,"%Y/%m/%d")')
		));
		$rOrder = array();
		foreach ($orders as $key => $order)
		{
			$rOrder[$key] = array(__($order["0"]["created"]), intval($order["0"]["total"]) );
		}
		$xData["TotalOrderByDate"] = $rOrder;

////// Sales man reports
		
		$orders = $this->Order->find('all', array(
            'joins' => array(
                array('table' => 'users',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'User.id = Order.created_by'
                    )
                ),
                array('table' => 'workstations',
                    'alias' => 'Workstation',
                    'type' => 'inner',
                    'conditions' => array(
                        'Workstation.id = User.workstation_id'
                    )
                ),
            ),
			'fields' => array(
				"CONCAT( User.firstname, ' ', User.lastname, ' - ', Workstation.title, ' ', Workstation.employeenumber ) as salesman",
				'IFNULL(SUM(Order.total_amt),0) total'
			),
			'conditions' => array(
				'Order.status' => array(StatusOfOrder::Closed),
				'Order.created >=' => $startDt,
				'Order.created <=' => $endDt
			),
			'group' => array(
				"Order.created_by",
			)
		));
		$rOrder = array();
		foreach ($orders as $key => $order)
		{
			$rOrder[$key] = array(__($order["0"]["salesman"]), intval($order["0"]["total"]) );
		}
		$xData["OrderBySalesMan"] = $rOrder;

////////////
//////////// Products report

		$orders = $this->Order->find('all', array(
            'joins' => array(
                array('table' => 'order_products',
                    'alias' => 'OrderProduct',
                    'type' => 'inner',
                    'conditions' => array(
                        'OrderProduct.order_id = Order.id'
                    )
                ),
                array('table' => 'products',
                    'alias' => 'Product',
                    'type' => 'inner',
                    'conditions' => array(
                        'Product.id = OrderProduct.product_id'
                    )
                ),
            ),
			'fields' => array(
				'Product.name',
				'IFNULL(SUM(Order.total_amt),0) total'
			),
			'conditions' => array(
				'Order.created >=' => $startDt,
				'Order.created <=' => $endDt
			),
			'group' => array('Product.name')
		));
		$rOrder = array();
		foreach ($orders as $key => $order)
		{
			$rOrder[$key] = array(__($order["Product"]["name"]), intval($order["0"]["total"]) );
		}
		$xData["OrderByProducts"] = $rOrder;

		$response = array(
			'success' => true,
			'message' => '',
			'xData' => $xData
		);

	}catch(Exception $ex)
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
