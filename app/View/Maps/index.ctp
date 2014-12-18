<!-- BEGIN VIEW SPECIFIC CSS -->    
<?php
echo $this->Html->css('../assets/css/jquery.qtip.min.css');
?>
<!-- END VIEW SPECIFIC CSS -->    
<!-- BEGIN VIEW SPECIFIC JAVASCRIPTS -->   
<?php
echo $this->Html->script("../assets/js/jquery.qtip.min.js");
echo $this->Html->script("../assets/jquery-slimscroll/jquery.slimscroll.min.js");
echo $this->Html->script("../assets/gritter/js/jquery.gritter.js");
echo $this->Html->script("../assets/uniform/jquery.uniform.min.js");
echo $this->Html->script("../assets/js/jquery.pulsate.min.js");
echo $this->Html->script("../assets/bootstrap-daterangepicker/date.js");
echo $this->Html->script("../assets/bootstrap-daterangepicker/daterangepicker.js");
echo $this->Html->script("../assets/highcharts/js/highcharts.js");
echo $this->Html->script("../assets/highcharts/js/modules/funnel.js");
echo $this->Html->script("../assets/highcharts/js/modules/exporting.js");
?>
<!-- END VIEW SPECIFIC JAVASCRIPTS --> 
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->			
            <h3 class="page-title">
                <?php echo __('Mapa'); ?>				
                <small>Geolocalizacion de clientes y ordenes.</small>
            </h3>
            <ul class="breadcrumb">    
                <li class="pull-right no-text-shadow">
                    <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" 
                         data-tablet="" data-desktop="tooltips" data-placement="top" 
                         data-original-title="Modificar rango de fechas...">
                        <i class="icon-calendar"></i>
                        <span></span>
                        <i class="icon-angle-down"></i>
                    </div>
                </li>   
                <li>
                    <i class="icon-home"></i>
                    <a href="#"></a> 
                </li>
                <?php echo $this->Navigation->printBacklinks($trail, 4); ?>

            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div id="dashboard">
        <div class="row-fluid">
            <div class="container-box">
                <?php
                // init map (prints container)
                echo $this->GoogleMapV3->map(array('div' => array('height' => '600', 'width' => '100%'), 'lat' => 25.686497, 'lng' => -100.34028727, 'zoom' => 18));

                // adding trucks to the map...
                foreach ($trucksGPS as $truckGPS)
                {

                    $this->GoogleMapV3->addMarker($truckGPS);
                }

                // adding orders to the map...
                foreach ($orders as $order)
                {

                    $this->GoogleMapV3->addMarker($order);
                }

                // adding special icons to the map...
                $this->GoogleMapV3->addicon('http://' . $_SERVER['SERVER_NAME'] . Router::url('/') . 'img/blu-truck.png', null, array('size' => array('width' => 32, 'height' => 32),
                    'origin' => array('width' => 0, 'height' => 0),
                    'anchor' => array('width' => 16, 'height' => 32)
                        )
                );
                $this->GoogleMapV3->addicon('http://' . $_SERVER['SERVER_NAME'] . Router::url('/') . 'img/red-circle.png', null, array('size' => array('width' => 32, 'height' => 32),
                    'origin' => array('width' => 0, 'height' => 0),
                    'anchor' => array('width' => 16, 'height' => 32)
                        )
                );
                $this->GoogleMapV3->addicon('http://' . $_SERVER['SERVER_NAME'] . Router::url('/') . 'img/red-truck.png', null, array('size' => array('width' => 48, 'height' => 48),
                    'origin' => array('width' => 0, 'height' => 0),
                    'anchor' => array('width' => 24, 'height' => 48)
                        )
                );
                $this->GoogleMapV3->addicon('http://' . $_SERVER['SERVER_NAME'] . Router::url('/') . 'img/blu-circle.png', null, array('size' => array('width' => 48, 'height' => 48),
                    'origin' => array('width' => 0, 'height' => 0),
                    'anchor' => array('width' => 24, 'height' => 48)
                        )
                );
                // print js
                echo $this->GoogleMapV3->script();
                ?>
            </div>
        </div>
        <?php
        echo $this->Html->script($this->GoogleMapV3->apiUrl());
        ?>
    </div>
</div>