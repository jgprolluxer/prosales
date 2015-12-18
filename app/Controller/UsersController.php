<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController
{

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
    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->request->data = $this->User->find('first', $options);
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post'))
        {
            $this->User->create();
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $works = $this->User->find('all', array(
            'fields' => array(
                'User.workstation_id'
            )
        ));

        $worksID = array();
        foreach ($works as $key => $work)
        {
            $worksID[$work["User"]["workstation_id"]] = $work["User"]["workstation_id"];
        }

        $lworkstations = $this->User->Workstation->find('all', array(
            'fields' => array(
                'Workstation.id',
                "CONCAT( Workstation.title, ' ', Workstation.employeenumber ) as value"
            ),
            'conditions' => array(
                'NOT' => array(
                    'Workstation.id' => $worksID
                )
            )
        ));
        $workstations = array();
        foreach ($lworkstations as $key => $lworkstation)
        {
            $workstations[$lworkstation["Workstation"]["id"]] = $lworkstation["0"]["value"];
        }
        $this->set(compact('groups', 'workstations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $workstations = $this->User->Workstation->find('list', array(
            'fields' => array(
                'Workstation.id',
                "CONCAT( Workstation.title, ' ', Workstation.employeenumber ) as value"
            )
        ));
        $this->set(compact('groups', 'workstations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists())
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete())
        {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->request->data = $this->User->find('first', $options);
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post'))
        {
            $this->User->create();
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $works = $this->User->find('all', array(
            'fields' => array(
                'User.workstation_id'
            )
        ));

        $worksID = array();
        foreach ($works as $key => $work)
        {
            $worksID[$work["User"]["workstation_id"]] = $work["User"]["workstation_id"];
        }

        $lworkstations = $this->User->Workstation->find('all', array(
            'fields' => array(
                'Workstation.id',
                "CONCAT( Workstation.title, ' ', Workstation.employeenumber ) as value"
            ),
            'conditions' => array(
                'NOT' => array(
                    'Workstation.id' => $worksID
                )
            )
        ));
        $workstations = array();
        foreach ($lworkstations as $key => $lworkstation)
        {
            $workstations[$lworkstation["Workstation"]["id"]] = $lworkstation["0"]["value"];
        }
        $this->set(compact('groups', 'workstations'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            $this->log('edit user');
            $this->log($this->request->data);
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $works = $this->User->find('all', array(
            'fields' => array(
                'User.workstation_id'
            )
        ));

        $worksID = array();
        foreach ($works as $key => $work)
        {
            $worksID[$work["User"]["workstation_id"]] = $work["User"]["workstation_id"];
        }

        $lworkstations = $this->User->Workstation->find('all', array(
            'fields' => array(
                'Workstation.id',
                "CONCAT( Workstation.title, ' ', Workstation.employeenumber ) as value"
            ),
            'conditions' => array(
                'NOT' => array(
                    'Workstation.id' => $worksID
                )
            )
        ));
        $workstations = array();
        foreach ($lworkstations as $key => $lworkstation)
        {
            $workstations[$lworkstation["Workstation"]["id"]] = $lworkstation["0"]["value"];
        }
        $this->set(compact('groups', 'workstations'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists())
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete())
        {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login()
    {

        $this->Navigation->cleanTrail();

        if ($this->Session->read('Auth.User'))
        {
            //$this->Session->setFlash(__('You are logged in!'));
            $this->redirect('/Dashboards/', null, false);
        }

        if ($this->request->is('post'))
        {
            $dologin = true;
            $user = $this->User->findByUsername($this->request->data['User']['username']);
            if (isset($user['User']))
            {
                $user = $user['User'];
                if ($user['username'] != "Admin")
                {
                    if (isset($user) && $user['blocked'])
                    {
                        $dologin = false;
                        $this->Session->setFlash('El usuario esta bloqueado, favor de contactar al administrador del sistema.');
                    }
                }

                if ($user["status"] !== StatusOfUser::Active)
                {
                    $dologin = false;
                    $this->Session->setFlash(__('Usuario inactivo favor de contactar al administrador'));
                }

                if ($dologin)
                {
                    if ($this->Auth->login())
                    {
                        $this->Session->write('firstLoadLogin', 1);
                        $this->redirect($this->Auth->redirect());
                    } else
                    {
                        $this->Session->setFlash(__('Usuario o Contraseña invalidos...'));
                    }
                }
            } else
            {
                $this->Session->setFlash(__('Usuario o Contraseña invalidos...'));
            }
        }
    }
    
    public function changepassword()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';
        
    }

    public function logout()
    {
        $this->Navigation->cleanTrail();
        $this->Session->write('Auth.Acos', null);
        $this->Session->setFlash(__('Hasta Luego!'));
        $this->redirect($this->Auth->logout());
    }

}
