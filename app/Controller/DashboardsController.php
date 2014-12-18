<?php

App::uses('AppController', 'Controller');
App::uses('FullCalendarController', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Dashboards Controller
 *
 * @property Dashboard $Dashboard
 */
class DashboardsController extends AppController {

    var $name = 'Dashboards';
    var $uses = null; //declare that this controller has no model
    var $layout = 'default';

    //var $helpers = array('Html');

    function index() {
        $this->Navigation->cleanTrail();
        $this->pageTitle = "Dashboard";
    }

    public function beforeFilter() {
        $this->params['ACTIVE_MENU'] = "#dashboard-nav";
        $this->params['CURRENT_PAGE'] = "dashboard";
        $this->params['APP_INIT'] = "index";
        parent::beforeFilter();
    }

}

?>
