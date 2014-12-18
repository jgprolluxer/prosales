<?php

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MapsController extends AppController
{

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Maps';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function index()
    {

        $cities = array('mty' => 'Monterrey', 'mex' => 'Mexico', 'gdl' => 'Guadarajala');
        $trucks = array('1' => 'C0001', '2' => 'C0002', '3' => 'C0003');


        $trucksGPS = array(
            array(
                'id' => 'C0002|truck',
                'animations' => true,
                'lat' => 25.650565,
                'lng' => -100.323332,
                'icon' => 0,
                'title' => 'Cuadrilla C0002', // optional
                'content' => '<b>Cuadrilla C0002</b></br><b>Siguiente orden:</b>1028027134<br><b>lat,lng:</b>(25.650565,-100.323332)' // optional
            ),
            array(
                'id' => 'C0001|truck',
                'animations' => true,
                'lat' => 25.734786,
                'lng' => -100.394532,
                'icon' => 0,
                'title' => 'Cuadrilla C0001', // optional
                'content' => '<b>Cuadrilla C0001</b></br><b>Siguiente orden:</b>1028027327<br><b>lat,lng:</b>(25.734786,-100.394532)' // optional
            )
        );

        $orders = array(
            array(
                'id' => 'C0002|order|1028027134',
                'animations' => true,
                'lat' => 25.650565,
                'lng' => -100.303332,
                'icon' => 1,
                'title' => 'Orden 1028027134', // optional
                'content' => '<b>Orden 1028027134</b><br><b>Cuadrilla:</b>C0002<br><b>Cliente:</b>Cliente Nro.1<br><b>Direccion:</b>Chiapas 114, Nuevo Repueblo, 64700 Monterrey, NL, Mexico'
            ),
            array(
                'id' => 'C0001|order|1028027327',
                'animations' => true,
                'lat' => 25.724618,
                'lng' => -100.398234,
                'icon' => 1,
                'title' => 'Orden 1028027327', // optional
                'content' => '<b>Orden 1028027327</b><br><b>Cuadrilla:</b>C0001<br><b>Cliente:</b>Cliente Nro.2<br><b>Direccion:</b>Apolo 348, Cumbres 6o. Sector, 64619 Monterrey, NL, Mexico'
            ),
            array(
                'id' => 'C0001|order|1026667331',
                'animations' => true,
                'lat' => 25.720539,
                'lng' => -100.340319,
                'icon' => 1,
                'title' => 'Orden 1026667331', // optional
                'content' => '<b>Orden 1026667331</b><br><b>Cuadrilla:</b>C0001<br><b>Cliente:</b>Cliente Nro.2<br><b>Direccion:</b>Rio Suchiate 163, Central, 64190 Monterrey, NL, Mexico'
            )
        );

        $this->set(compact('cities', 'trucks', 'trucksGPS', 'orders'));
    }

    public function simpleMap()
    {      
    }
    public function beforeFilter()
    {

        $this->params['ACTIVE_MENU'] = "#fieldservice-nav";
        $this->params['CURRENT_PAGE'] = "fieldservice";
        parent::beforeFilter();
        //$this->Auth->allow('*');
    }

}
