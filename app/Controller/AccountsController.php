<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Account $Account
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AccountsController extends AppController {

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
        $this->Account->recursive = 0;
        $this->set('accounts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Account->exists($id)) {
            throw new NotFoundException(__('Invalid account'));
        }
        $options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
        $this->request->data = $this->Account->find('first', $options);
        $this->set('account', $this->Account->find('first', $options));
        
        $this->loadModel('Note');
        $this->Note->recursive = 1;
        $notes = $this->Note->find('all', array(
            'conditions' => array(
                'Note.id >=' => 1,
                'Note.objectType =' => 'Account',
                'Note.objectid =' => $id
            ),
            'order' => array('created desc')
        ));
        
        $this->loadModel('Order');
        $orders = $this->Order->find('all', array(
			'fields' => array(
				'IFNULL(SUM(Order.account_id),0) total'
			),
			'conditions' => array(
				'Order.account_id =' => $id,
                                'Order.status =' => 'closed'
			)
		));
        
        $totalPrice = $this->Order->find('all', array(
			'fields' => array(
				'IFNULL(SUM(Order.total_amt),0) suma'
			),
			'conditions' => array(
				'Order.account_id =' => $id,
                                'Order.status =' => 'closed'
			)
		));
        
        $this->loadModel('Address');
        $addresses = $this->Address->find('all', array(
			'conditions' => array(
				'Address.account_id =' => $id
			)
		));
        
        $ordersList = $this->Order->find('all', array(
			'conditions' => array(
				'Order.account_id =' => $id
			)
		));
        
        $sumOrd = $orders['0']['0']['total'];
        $totOrd = $totalPrice['0']['0']['suma'];
        
        $this->log("el total ", "debug");
        $this->log($totOrd, "debug");
        
        
        
        $this->set(compact('notes', 'sumOrd','addresses', 'totOrd', 'ordersList'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $teams = $this->Account->Team->find('list', array(
            'conditions' => array(
                'Team.id >=' => 1,
                'Team.status' => array(StatusOfTeam::Active)
            )
        ));
        $lovAccountSex = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_SEX',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountMode = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_MODE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_TYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('teams', 'lovAccountSex', 'lovAccountMode', 'lovAccountType'));

    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Account->exists($id)) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
            $this->request->data = $this->Account->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $teams = $this->Account->Team->find('list', array(
            'conditions' => array(
                'Team.id >=' => 1,
                'Team.status' => array(StatusOfTeam::Active)
            )
        ));
        $lovAccountSex = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_SEX',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountMode = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_MODE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_TYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('teams', 'lovAccountSex', 'lovAccountMode', 'lovAccountType'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Account->delete()) {
            $this->Session->setFlash(__('The account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Account->recursive = 0;
        $this->set('accounts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Account->exists($id)) {
            throw new NotFoundException(__('Invalid account'));
        }
        $options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
        $this->request->data = $this->Account->find('first', $options);
        $this->set('account', $this->Account->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $teams = $this->Account->Team->find('list', array(
            'conditions' => array(
                'Team.id >=' => 1,
                'Team.status' => array(StatusOfTeam::Active)
            )
        ));
        $lovAccountSex = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_SEX',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountMode = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_MODE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_TYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('teams', 'lovAccountSex', 'lovAccountMode', 'lovAccountType'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Account->exists($id)) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
            $this->request->data = $this->Account->find('first', $options);
        }
        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $teams = $this->Account->Team->find('list', array(
            'conditions' => array(
                'Team.id >=' => 1,
                'Team.status' => array(StatusOfTeam::Active)
            )
        ));
        $lovAccountSex = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_SEX',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountMode = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_MODE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $lovAccountType = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'ACCOUNT_FIELD_TYPE',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));
        $this->set(compact('teams', 'lovAccountSex', 'lovAccountMode', 'lovAccountType'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Account->delete()) {
            $this->Session->setFlash(__('The account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     *
     */
    public function jsfindAccount()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try
        {
            $arrayConditions = array();
            $results = array();
            switch ($this->request->query['format'])
            {
                case 'allByTeamID':
                {
                    //$teamID = $this->request->query['teamID'];
                    $this->Account->recursive = 2;
                    $arrayConditions = array(
                        'Account.id >= ' => 1,
                        //'Account.id = ' => $teamID,
                        'Account.status' => array(StatusOfAccount::Active)
                    );
                    $results = $this->Account->find('all', array(
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
