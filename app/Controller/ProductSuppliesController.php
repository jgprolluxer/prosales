<?php
App::uses('AppController', 'Controller');
/**
 * ProductSupplies Controller
 *
 * @property ProductSupply $ProductSupply
 * @property PaginatorComponent $Paginator
 */
class ProductSuppliesController extends AppController {

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
		$this->ProductSupply->recursive = 0;
		$this->set('productSupplies', $this->Paginator->paginate());
	}


	public function jsindex($productID = null)
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$arrayConditions = array(
			'ProductSupply.id >=' => 1
		);
		if(null !== $pricelistID)
		{
			$arrayConditions = array(
				'ProductSupply.id >=' => 1,
				'Product.id =' => $productID
			);
		}

		$this->paginate = array(
			'fields' => array(
				'ProductSupply.id',
				'ProductSupply.name',
				'ProductSupply.uomqty',
				"CONCAT('<a href=\"" . Router::url("/ProductSupplies/view/") . "', ProductSupply.id, '\" class=\"btn btn-xs btn-info\">', '<i class=\"fa fa-eye fa-fw\"></i>' ,'</a>') as supplyview",
			),
			'conditions' => $arrayConditions
		);

		$this->DataTable->fields = array(
			'ProductSupply.id',
			'ProductSupply.name',
			'ProductSupply.uomqty',
			'0.supplyview',
		);

		$this->DataTable->filterFields = array(
			'ProductSupply.id',
			'ProductSupply.name',
			'ProductSupply.uomqty',
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
		if (!$this->ProductSupply->exists($id)) {
			throw new NotFoundException(__('Invalid product supply'));
		}
		$options = array('conditions' => array('ProductSupply.' . $this->ProductSupply->primaryKey => $id));
		$this->set('productSupply', $this->ProductSupply->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductSupply->create();
			if ($this->ProductSupply->save($this->request->data)) {
				$this->Session->setFlash(__('The product supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product supply could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductSupply->Product->find('list');
		$supplies = $this->ProductSupply->Supply->find('list');
		$this->set(compact('products', 'supplies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductSupply->exists($id)) {
			throw new NotFoundException(__('Invalid product supply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductSupply->save($this->request->data)) {
				$this->Session->setFlash(__('The product supply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product supply could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductSupply.' . $this->ProductSupply->primaryKey => $id));
			$this->request->data = $this->ProductSupply->find('first', $options);
		}
		$products = $this->ProductSupply->Product->find('list');
		$supplies = $this->ProductSupply->Supply->find('list');
		$this->set(compact('products', 'supplies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductSupply->id = $id;
		if (!$this->ProductSupply->exists()) {
			throw new NotFoundException(__('Invalid product supply'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductSupply->delete()) {
			$this->Session->setFlash(__('The product supply has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product supply could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
