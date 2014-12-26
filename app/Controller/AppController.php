<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * @property Config $Config
 */
class AppController extends Controller
{

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        'P28n',
        'Navigation',
        'RequestHandler'
    );
    public $helpers = array('Html', 'Form', 'Session', 'AclView', 'Jquery', 'Navigation', 'Taskflow', 'MenuBuilder.MenuBuilder');
    public $appLangConf = 'es_MX';

    public function beforeRender()
    {
        $this->Navigation->Process($this);
        $this->set('trail', $this->Navigation->trail);

        $this->loadModel('Config');
        $this->Config->recursive = -1;
        $config = $this->Config->read(null, 1);

        $this->loadModel('User');
        $this->User->recursive = 1;
        $signedUser = $this->User->read(null, $this->Session->read('Auth.User.id'));

        $slangConf = '';
        if(isset($config['Config']['prefLanguage']))
        {
            $slangConf = $config['Config']['prefLanguage'];
        }
        Configure::write('Config.language', $slangConf);
        $this->appLangConf = $slangConf;
        $this->set('$langConf', $slangConf);
        $this->set('menu', $this->buildMainMenu());
        $this->set('config', $config);
        $this->set('signedUser', $signedUser);

        //debug($this->params);
    }

    public function beforeFilter()
    {
        //Configure AuthComponent
        parent::beforeFilter();

        $this->Auth->loginAction = array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'Users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'Users', 'action' => 'login');
        $this->Auth->loginRedirect = array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'Dashboards', 'action' => 'index');
    }

    public function afterFilter()
    {
        return parent::afterFilter();
    }

    public function beforeRedirect($url, $status = null, $exit = true)
    {
        parent::beforeRedirect($url, $status, $exit);
    }

    private function buildMainMenu()
    {
        //////@Override menu from data base
        $this->loadModel('Appmenu');
        $hMenuHeader = $this->Appmenu->find('threaded', array(
            'conditions' => array(
                'Appmenu.id >=' => 1,
                'Appmenu.status' => array(StatusOfAppmenu::Active),
                'Appmenu.mkey =' => 'h-menu-header'
            ),
            'order' => 'Appmenu.ordershow'
        ));

        $appMenu['h-menu-header'] = array();
        if(!empty($hMenuHeader))
        {
            $appMenu['h-menu-header'] = $hMenuHeader;
        }

        $hMenuSidebarNav = $this->Appmenu->find('threaded', array(
            'conditions' => array(
                'Appmenu.id >=' => 1,
                'Appmenu.status' => array(StatusOfAppmenu::Active),
                'Appmenu.mkey =' => 'menu-sidebar-nav'
            ),
            'order' => 'Appmenu.ordershow'
        ));

        $appMenu['menu-sidebar-nav'] = array();

        if(!empty($hMenuSidebarNav))
        {
            $appMenu['menu-sidebar-nav'] = $hMenuSidebarNav;
        }

        $hMenuSidebarAlt = $this->Appmenu->find('threaded', array(
            'conditions' => array(
                'Appmenu.id >=' => 1,
                'Appmenu.status' => array(StatusOfAppmenu::Active),
                'Appmenu.mkey =' => 'menu-sidebar-alt'
            ),
            'order' => 'Appmenu.ordershow'
        ));

        $appMenu['menu-sidebar-alt'] = array();

        if(!empty($hMenuSidebarNav))
        {
            $appMenu['menu-sidebar-alt'] = $hMenuSidebarAlt;
        }

        return $appMenu;
    }



}

/**
 * Manager Appmenu status
 */
abstract class StatusOfAppmenu
{
    const Active = "active";
    const Inactive = "inactive";
}

/**
 * Manager Report status
 */
abstract class StatusOfReport
{
    const Active = "active";
    const Inactive = "inactive";
}

/**
 * Manager Family status
 */
abstract class StatusOfFamily
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manager Product status
 */
abstract class StatusOfProduct
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manager Chat status
 */
abstract class StatusOfChat
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manager Comment status
 */
abstract class StatusOfComment
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manager Group status
 */
abstract class StatusOfGroup
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manager Lovs Status
 */
abstract class StatusOfLov
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage ProjectTeam Status
 */
abstract class StatusOfProjectTeam
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manage Project Status
 */
abstract class StatusOfProject
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage Resource Status
 */
abstract class StatusOfResource
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage ServicerequestResource Status
 */
abstract class StatusOfServicerequestResource
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage servicerequestworkstation Status
 */
abstract class StatusOfServicerequestWorkstation
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manager Servicerequest Status
 */
abstract class StatusOfServicerequest
{

    const Active = "active";
    const Inactive = "inactive";
    const Seen = "seen";
    const Started = "started";
    const Approved = "approved";
    const Cancelled = "cancelled";

}

/**
 * Manage Story Status
 */
abstract class StatusOfStory
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage Stores Status
 */
abstract class StatusOfStores
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manage TeamWorkstation Status
 */
abstract class StatusOfTeamWorkstation
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manage Team Status
 */
abstract class StatusOfTeam
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manage TeamResource Status
 */
abstract class StatusOfTeamResource
{

    const Active = "Activo";
    const Inactive = "Inactivo";

}

/**
 * Manage User Status
 */
abstract class StatusOfUser
{

    const Active = "active";
    const Inactive = "inactive";

}

/**
 * Manager ChatUser Status
 */
abstract class StatusOfChatUser
{

    const Online = "online";
    const Away = "away";
    const Busy = "busy";
    const Offline = "offline";

}


/**
 * Manage Workstation Status
 */
abstract class StatusOfWorkstation
{

    const Active = "active";
    const Inactive = "inactive";

}

abstract class StatusOfPolicy
{

    const Active = "active";
    const Inactive = "inactive";

}

abstract class StatusOfAttachment
{

    const Active = "active";
    const Inactive = "inactive";

}

abstract class StatusOfOrder
{

    const Active = "active";
    const Inactive = "inactive";
    const Cancelled = "cancelled";

}

abstract class StatusOfOrderProduct
{

    const Active = "active";
    const Inactive = "inactive";

}
