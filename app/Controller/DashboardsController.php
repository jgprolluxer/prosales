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

        $toDay = date("Y-m-d");
        //debug($endDt);
        $this->loadModel('Order');

        $salesToday = $this->Order->find('all', array(
            'fields' => array(
                'Order.created',
                'IFNULL(SUM(Order.total_amt),0) total'
            ),
            'conditions' => array(
                'Order.status' => array(StatusOfOrder::Closed),
                'Order.created >=' => $toDay . ' 00:00:00',
                'Order.created <=' => $toDay . ' 23:59:59'
            ),
            'group' => array('Order.created')
        ));
        debug($salesToday);
    }

    public function beforeFilter() {
        $this->params['ACTIVE_MENU'] = "#dashboard-nav";
        $this->params['CURRENT_PAGE'] = "dashboard";
        $this->params['APP_INIT'] = "index";
        parent::beforeFilter();
    }

}

?>
