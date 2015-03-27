<?php
App::uses('AppController', 'Controller');
/**
 * PricelistProducts Controller
 *
 * @property PricelistProduct $PricelistProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PricelistProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'DataTable', 'Navigation');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PricelistProduct->recursive = 1;
		$daPriceListID = $this->getPricelistID();
		$this->log('pricelistID');
		$this->log($daPriceListID);
		$pricelistProducts = $this->PricelistProduct->find('all', array(
			'conditions' => array(
				'PricelistProduct.pricelist_id =' => $daPriceListID
			)
		));
		$this->set('pricelistProducts', $pricelistProducts);
	}


	public function jsindex($pricelistID = null)
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$arrayConditions = array(
			'PricelistProduct.id >=' => 1
		);
		if(null !== $pricelistID)
		{
			$arrayConditions = array(
				'PricelistProduct.id >=' => 1,
				'Pricelist.id =' => $pricelistID
			);
		}

		$this->paginate = array(
			'fields' => array(
				'PricelistProduct.id',
				"CONCAT('<a href=\"" . Router::url("/Products/view/") . "', Product.id, '\">', Product.name ,'</a>') as productview",
				'PricelistProduct.startdt',
				'PricelistProduct.enddt',
				'PricelistProduct.tax',
				"CONCAT('<a href=\"" . Router::url("/PricelistProducts/view/") . "', PricelistProduct.id, '\" class=\"btn btn-xs btn-info\">', '<i class=\"fa fa-eye fa-fw\"></i>' ,'</a>') as pricelistview",
			),
			'conditions' => $arrayConditions
		);

		$this->DataTable->fields = array(
			'PricelistProduct.id',
			'0.productview',
			'PricelistProduct.startdt',
			'PricelistProduct.enddt',
			'PricelistProduct.tax',
			'0.pricelistview',
		);

		$this->DataTable->filterFields = array(
			'PricelistProduct.id',
			'Product.name',
			'PricelistProduct.startdt',
			'PricelistProduct.enddt',
			'PricelistProduct.tax',
			'PricelistProduct.tax',
		);

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
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
		$this->request->data = $this->PricelistProduct->find('first', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($pricelistID = null) {
		if(!$pricelistID)
		{
			throw new NotFoundException(__('Invalid pricelist'));
		}
		if ($this->request->is('post')) {
			$this->PricelistProduct->create();
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		}
		$pricelists = $this->PricelistProduct->Pricelist->read(null, $pricelistID);
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
			$this->request->data = $this->PricelistProduct->find('first', $options);
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PricelistProduct->id = $id;
		if (!$this->PricelistProduct->exists()) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PricelistProduct->delete()) {
			$this->Session->setFlash(__('The pricelist product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pricelist product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PricelistProduct->recursive = 0;
		$this->set('pricelistProducts', $this->Paginator->paginate());
	}


	public function jsindexadmin($pricelistID = null)
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$arrayConditions = array(
			'PricelistProduct.id >=' => 1
		);
		if(null !== $pricelistID)
		{
			$arrayConditions = array(
				'PricelistProduct.id >=' => 1,
				'Pricelist.id =' => $pricelistID
			);
		}

		$this->paginate = array(
			'fields' => array(
				'PricelistProduct.id',
				"CONCAT('<a href=\"" . Router::url("/admin/Products/view/") . "', Product.id, '\">', Product.name ,'</a>') as productview",
				'PricelistProduct.startdt',
				'PricelistProduct.enddt',
				'PricelistProduct.tax',
				"CONCAT('<a href=\"" . Router::url("/admin/PricelistProducts/view/") . "', PricelistProduct.id, '\" class=\"btn btn-xs btn-info\">', '<i class=\"fa fa-eye fa-fw\"></i>' ,'</a>') as pricelistview",
			),
			'conditions' => $arrayConditions
		);

		$this->DataTable->fields = array(
			'PricelistProduct.id',
			'0.productview',
			'PricelistProduct.startdt',
			'PricelistProduct.enddt',
			'PricelistProduct.tax',
			'0.pricelistview',
		);

		$this->DataTable->filterFields = array(
			'PricelistProduct.id',
			'Product.name',
			'PricelistProduct.startdt',
			'PricelistProduct.enddt',
			'PricelistProduct.tax',
			'PricelistProduct.tax',
		);

		echo json_encode($this->DataTable->getResponse());
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
		$this->set('pricelistProduct', $this->PricelistProduct->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PricelistProduct->create();
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PricelistProduct->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PricelistProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The pricelist product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricelist product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PricelistProduct.' . $this->PricelistProduct->primaryKey => $id));
			$this->request->data = $this->PricelistProduct->find('first', $options);
		}
		$pricelists = $this->PricelistProduct->Pricelist->find('list');
		$products = $this->PricelistProduct->Product->find('list');
		$this->set(compact('pricelists', 'products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PricelistProduct->id = $id;
		if (!$this->PricelistProduct->exists()) {
			throw new NotFoundException(__('Invalid pricelist product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PricelistProduct->delete()) {
			$this->Session->setFlash(__('The pricelist product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pricelist product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function jsPricelistProduct()
	{
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array(
            'success' => true,
            'message' => 'NOTHING',
            'xData' => array()
        );

        try {
            if (isset($this->request->query['CRUD_operation'])) {
                $operation = $this->request->query['CRUD_operation'];
            } else {
                throw new Exception(__('PRICELISTPRODUCT_CONTROLLER') . ' ' . __('CRUD_OPERATION_NOT_SET'));
            }
            switch ($operation)
            {
                case "CREATE":
                    break;
                case "READ":
						$this->PricelistProduct->recursive = 3;
						$_conditions = array();
						if(isset($this->request->data["conditions"]))
						{
							$_conditions = $this->request->data["conditions"];
						}
						$arrayConditions = array();

						foreach ($_conditions as $key => $_condition)
						{
							$arrayConditions += array($_condition["condField"] => $_condition["condValue"]);
						}
						$this->log('arrayConditions');
						$this->log($arrayConditions);

						$results = $this->PricelistProduct->find('all', array(
							'conditions' => $arrayConditions
						));
						$response = array(
							'success' => true,
							'xData' => $results,
							'message' => 'Correcto'
						);
                	break;
                case "UPDATE":
                	break;
                case "DELETE":
                	break;
            }
        } catch (Exception $ex)
        {
            $response = array(
                'success' => false,
                'message' => $ex->getMessage(),
                'xData' => array()
            );
        }
        echo json_encode($response);

	}

	private function getPricelistID()
    {

        try{
            $uLogged = CakeSession::read('Auth.User');
            if(isset($uLogged["Workstation"]["pricelist_id"]))
            {
                if(null !== $uLogged["Workstation"]["pricelist_id"] && 0 !== $uLogged["Workstation"]["pricelist_id"])
                {
                    $this->loadModel('Pricelist');
                    $pricelist = $this->Pricelist->read(null, $uLogged["Workstation"]["pricelist_id"]);
                    if(StatusOfPricelist::Active == $pricelist["Pricelist"]["status"])
                    {
                        return $pricelist["Pricelist"]["id"];
                    } else
                    {
                        return 0;
                    }

                } else
                {
                    if(null !== $uLogged["Workstation"]["store_id"] && 0 !== $uLogged["Workstation"]["store_id"])
                    {
                        $this->loadModel('Store');
                        $store = $this->Store->read(null, $uLogged["Workstation"]["store_id"]);

                        if(null !== $store["Store"]["pricelist_id"] && 0 !== $store["Store"]["pricelist_id"] )
                        {
                            $this->loadModel('Pricelist');
                            $pricelist = $this->Pricelist->read(null, $store["Store"]["pricelist_id"]);

                            if(StatusOfPricelist::Active == $pricelist["Pricelist"]["status"])
                            {
                                return $pricelist["Pricelist"]["id"];
                            } else
                            {
                                return 0;
                            }

                        } else
                        {
                            return 0;
                        }

                    } else
                    {
                        return 0;
                    }
                }
            }
        }catch(Exception $ex)
        {
            return 0;
        }
    }
}
