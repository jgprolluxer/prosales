<?php

App::uses('AppController', 'Controller');

/**
 * Appmenus Controller
 *
 * @property Appmenu $Appmenu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AppmenusController extends AppController
{

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
    public function index()
    {
        $this->Appmenu->recursive = 0;
        $this->set('appmenus', $this->Paginator->paginate());
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
        if (!$this->Appmenu->exists($id))
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        $options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
        $this->request->data = $this->Appmenu->find('first', $options);
        $this->set('appmenu', $this->Appmenu->find('first', $options));
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
            $this->Appmenu->create();
            if ($this->Appmenu->save($this->request->data))
            {
                $this->Session->setFlash(__('The appmenu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->write('Operation', 'warning');
                $this->Session->setFlash(__('RECORD_NOT_SAVED'));
            }
        }
        $parentAppmenus[0] = __('NONE');
        $parentAppmenus += $this->Appmenu->ParentAppmenu->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovAppmenuMKey = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'APPMENU_FIELD_MKEY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
        //debug($ctrlList);
        //$ctrllrs = (array_combine(array_keys($ctrlList), array_keys($ctrlList)));
        $ctrllrs = array();
        $ctrllrs[0] = __('NONE');
        foreach ($ctrlList as $key => $value)
        {
            $ctrllrs[$ctrlList[$key]["name"]] = $ctrlList[$key]["name"];
        }
        //debug($ctrllrs);
        $models = (array_combine(App::objects('model'), App::objects('model')));
        $this->set(compact('parentAppmenus', 'lovAppmenuMKey', 'ctrllrs'));
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
        if (!$this->Appmenu->exists($id))
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Appmenu->save($this->request->data))
            {
                $this->Session->setFlash(__('The appmenu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->write('Operation', 'warning');
                $this->Session->setFlash(__('RECORD_NOT_SAVED'));
            }
        } else
        {
            $options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
            $this->request->data = $this->Appmenu->find('first', $options);
        }
        $parentAppmenus[0] = __('NONE');
        $parentAppmenus += $this->Appmenu->ParentAppmenu->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovAppmenuMKey = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'APPMENU_FIELD_MKEY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
        //debug($ctrlList);
        //$ctrllrs = (array_combine(array_keys($ctrlList), array_keys($ctrlList)));
        $ctrllrs = array();
        $ctrllrs[0] = __('NONE');
        foreach ($ctrlList as $key => $value)
        {
            $ctrllrs[$ctrlList[$key]["name"]] = $ctrlList[$key]["name"];
        }
        $actions = array();
        $actions[0] = __('NONE');
        if (isset($ctrlList[$this->request->data["Appmenu"]["controller"] . 'Controller']["actions"]))
        {
            foreach ($ctrlList[$this->request->data["Appmenu"]["controller"] . 'Controller']["actions"] as $key => $value)
            {
                $actions[$value] = $value;
            }
        }
        //debug($ctrllrs);
        $models = (array_combine(App::objects('model'), App::objects('model')));
        $this->set(compact('parentAppmenus', 'lovAppmenuMKey', 'ctrllrs', 'actions'));
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
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists())
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Appmenu->delete())
        {
            $this->Session->setFlash(__('The appmenu has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The appmenu could not be deleted. Please, try again.'));
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
        $this->Appmenu->recursive = 0;
        $this->set('appmenus', $this->Paginator->paginate());

        //debug($this->Appmenu->generateTreeList(null,null,null,'&nbsp;&nbsp;&nbsp;'));
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
        if (!$this->Appmenu->exists($id))
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        $options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
        $this->request->data = $this->Appmenu->find('first', $options);
        $this->set('appmenu', $this->Appmenu->find('first', $options));
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
            $this->Appmenu->create();
            if ($this->Appmenu->save($this->request->data))
            {
                $this->Session->setFlash(__('The appmenu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->write('Operation', 'warning');
                $this->Session->setFlash(__('RECORD_NOT_SAVED'));
            }
        }
        $parentAppmenus[0] = __('NONE');
        $parentAppmenus += $this->Appmenu->ParentAppmenu->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovAppmenuMKey = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'APPMENU_FIELD_MKEY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
        //debug($ctrlList);
        //$ctrllrs = (array_combine(array_keys($ctrlList), array_keys($ctrlList)));
        $ctrllrs = array();
        $ctrllrs[0] = __('NONE');
        foreach ($ctrlList as $key => $value)
        {
            $ctrllrs[$ctrlList[$key]["name"]] = $ctrlList[$key]["name"];
        }
        //debug($ctrllrs);
        $models = (array_combine(App::objects('model'), App::objects('model')));
        $this->set(compact('parentAppmenus', 'lovAppmenuMKey', 'ctrllrs'));
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
        if (!$this->Appmenu->exists($id))
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Appmenu->save($this->request->data))
            {
                $this->Session->setFlash(__('The appmenu has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->write('Operation', 'warning');
                $this->Session->setFlash(__('RECORD_NOT_SAVED'));
            }
        } else
        {
            $options = array('conditions' => array('Appmenu.' . $this->Appmenu->primaryKey => $id));
            $this->request->data = $this->Appmenu->find('first', $options);
        }
        $parentAppmenus[0] = __('NONE');
        $parentAppmenus += $this->Appmenu->ParentAppmenu->find('list');

        $this->loadModel('Lov');
        $this->Lov->recursive = -1;
        $lovAppmenuMKey = $this->Lov->find('list', array(
            'fields' => array('Lov.value', 'Lov.name_' . $this->appLangConf),
            'conditions' => array(
                'Lov.type =' => 'APPMENU_FIELD_MKEY',
                'Lov.status' => array(StatusOfLov::Active)
            ),
            'order' => array('ordershow')
        ));

        $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
        //debug($ctrlList);
        //$ctrllrs = (array_combine(array_keys($ctrlList), array_keys($ctrlList)));
        $ctrllrs = array();
        $ctrllrs[0] = __('NONE');
        foreach ($ctrlList as $key => $value)
        {
            $ctrllrs[$ctrlList[$key]["name"]] = $ctrlList[$key]["name"];
        }
        $actions = array();
        $actions[0] = __('NONE');
        if (isset($ctrlList[$this->request->data["Appmenu"]["controller"] . 'Controller']["actions"]))
        {
            foreach ($ctrlList[$this->request->data["Appmenu"]["controller"] . 'Controller']["actions"] as $key => $value)
            {
                $actions[$value] = $value;
            }
        }
        //debug($ctrllrs);
        $models = (array_combine(App::objects('model'), App::objects('model')));
        $this->set(compact('parentAppmenus', 'lovAppmenuMKey', 'ctrllrs', 'actions'));
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
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists())
        {
            throw new NotFoundException(__('Invalid appmenu'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Appmenu->delete())
        {
            $this->Session->setFlash(__('The appmenu has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The appmenu could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * @param null $id
     * @param null $delta
     */
    public function movedown($id = null, $delta = null)
    {
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists())
        {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0)
        {
            $this->Appmenu->moveDown($this->Appmenu->id, abs($delta));
        } else
        {
            $this->Session->setFlash(
                    'Please provide the number of positions the field should be' .
                    'moved down.'
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    /**
     * @param null $id
     * @param null $delta
     */
    public function moveup($id = null, $delta = null)
    {
        $this->Appmenu->id = $id;
        if (!$this->Appmenu->exists())
        {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0)
        {
            $this->Appmenu->moveUp($this->Appmenu->id, abs($delta));
        } else
        {
            $this->Session->setFlash(
                    'Please provide a number of positions the category should' .
                    'be moved up.'
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function getControllerActions()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->layout = 'ajax';

        $response = array();
        try
        {
            $controller = $this->request->query['controller'];
            $ctrlList = $this->ControllerList->getList(array('P28nController', 'PagesController'));
            $actions = array();
            $actions[0] = __('NONE');
            if (isset($ctrlList[$controller . 'Controller']["actions"]))
            {
                foreach ($ctrlList[$controller . 'Controller']["actions"] as $key => $value)
                {
                    $actions[$value] = $value;
                }
            }
            $response = array(
                'success' => true,
                'message' => 'Correcto',
                'xData' => $actions
            );
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
