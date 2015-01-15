<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

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
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}
        $families[0] = __('NONE');
		$families += $this->Product->Family->find('list', array(
            'conditions' => array(
                'Family.id >=' => 1,
                'Family.status' => array(StatusOfFamily::Active)
            )
        ));

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovProductStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'PRODUCT_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

		$this->set(compact('families'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
        $families[0] = __('NONE');
		$families += $this->Product->Family->find('list', array(
            'conditions' => array(
                'Family.id >=' => 1,
                'Family.status' => array(StatusOfFamily::Active)
            )
        ));
		$this->set(compact('families'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		}
        $families[0] = __('NONE');
		$families += $this->Product->Family->find('list', array(
            'conditions' => array(
                'Family.id >=' => 1,
                'Family.status' => array(StatusOfFamily::Active)
            )
        ));

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovProductStatus = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_'.$this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'PRODUCT_FIELD_STATUS',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

		$this->set(compact('families', 'lovProductStatus'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->write('Operation', 'warning');
				$this->Session->setFlash(__('RECORD_NOT_SAVED'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
        $families[0] = __('NONE');
		$families += $this->Product->Family->find('list', array(
            'conditions' => array(
                'Family.id >=' => 1,
                'Family.status' => array(StatusOfFamily::Active)
            )
        ));
		$this->set(compact('families'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    
    public function jsfindProduct()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $arrayConditions = array();
        $response = array();
        $results = array();
        try
        {
            switch ($this->request->query['format'])
            {
                case 'fullsearch':
                    {
                        if ("0" !== $this->request->query['productid'] && "" !== $this->request->query['productid'])
                        {

                            $arrayConditions = array(
                                'Product.id >= ' => 1,
                                'Product.id = ' => $this->request->query['productid']
                            );
                        } else
                        {
                            $arrayConditions = array(
                                "OR" => array(
                                    'Product.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                                )
                            );
                        }
                        $this->Product->recursive = 1; /// buscar todo con relaciones
                        $results = $this->Product->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = $results;
                    }
                    break;
                case 'autocompletelist':
                    {
                        $this->Product->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            "OR" => array(
                                'Product.title LIKE' => '%' . $this->request->query['strquery'] . '%'
                            )
                        );
                        $results = $this->Product->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value)
                        {
                            $response[$key]["id"] = $value["Product"]["id"];
                            $response[$key]["value"] = $value["Product"]["firstname"] . ' ' . $value["Product"]["lastname"] . " (" . $value['Product']['productname'] . ")";
                        }
                    }
                    break;
                case 'typeahead':
                    {
                        $this->Product->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            'Product.id >= ' => 1,
                            'Product.status' => array(StatusOfProduct::Active)
                        );
                        $results = $this->Product->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value)
                        {
                            $response[$key]["id"] = $value["Product"]["id"];
                            $response[$key]["value"] = $value["Product"]["name"];
                        }
                    }
                    break;
                case 'POStypeahead':
                    {
                        $this->Product->recursive = 0; /// Solo usuario
                        $arrayConditions = array(
                            'Product.id >= ' => 1,
                            'Product.status' => array(StatusOfProduct::Active)
                        );
                        $results = $this->Product->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        foreach ($results as $key => $value)
                        {
                            $rd[$key]["id"] = $value["Product"]["id"];
                            $rd[$key]["value"] = $value["Product"]["name"];
                        }
                        $response = array(
                            'success' => true,
                            'xData' => $rd,
                            'message' => 'Correcto'
                        );
                    }
                    break;
                case 'all':
                    {
                        $this->Product->recursive = 1;
                        $arrayConditions = array(
                            'Product.id >= ' => 1,
                            'Product.status' => array(StatusOfProduct::Active)
                        );
                        $results = $this->Product->find('all', array(
                            'conditions' => $arrayConditions
                        ));
                        $response = $results;
                    }
                    break;
                case 'allbyFamily':
                    {
                        $familyID = $this->request->query['familyID'];
                        $this->Product->recursive = 1;
                        $arrayConditions = array(
                            'Product.id >= ' => 1,
                            'Product.status' => array(StatusOfProduct::Active),
                            'Product.family_id =' => $familyID
                        );
                        $results = $this->Product->find('all', array(
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
}
