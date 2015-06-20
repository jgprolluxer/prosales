<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations footer-fixed');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- All Orders Block -->
<div class="block full">
	<!-- All Orders Title -->
	<div class="block-title">
		<div class="block-options pull-right">
	    			<?php
			echo $this->Html->link(  '<i class="fa fa-plus"></i> '.__('Atrás'),
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'index'
					),
					array('escape' => false, 'class' => array('btn btn-info', 'themed-background-spring')));
			?>
		</div>
	<h2>Servicios</h2>
	</div>
<?php 

foreach($orders as $oIDX => $order)
{
    
    $theOrder = $order["Order"];
    $datetime1 = new DateTime($theOrder["created"]);
    $datetime2 = new DateTime();
    //$totalDiff = $datetime1->diff($datetime2)->format("%d Días, %h Horas and %i Minutos");
    $totalDiff = $datetime1->diff($datetime2)->format("%h Horas and %i Minutos");
    $minuteDiff = $datetime1->diff($datetime2)->format("%i");
    $hClass = 'text-success';
    if($minuteDiff > 10){
        $hClass = 'text-danger';
    } elseif($minuteDiff >= 6 && $minuteDiff <= 10 )
    {
        $hClass = 'text-warning';
    }
    
    ?>

    <div class="block full">
        <div class="block-title">

            <?php
                if($minuteDiff > 8)
                {
                    echo '<div class="test-circle themed-border-fire themed-background-fire" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-danger" style="margin:0px !important; padding:0px !important" >'.$theOrder["folio"].'</h2>';
                } elseif($minuteDiff >= 4 && $minuteDiff <= 8 )
                {
                    echo '<div class="test-circle themed-border-autumn themed-background-autumn" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-warning" style="margin:0px !important; padding:0px !important" >'.$theOrder["folio"].'</h2>';
                } else {
                    echo '<div class="test-circle themed-border-spring themed-background-spring" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-success" style="margin:0px !important; padding:0px !important" >'.$theOrder["folio"].'</h2>';
                }
                
                ?>
            <?php echo __('Para entregar en :    '); ?>
            <?php echo '----    Creada el :  ' . $theOrder["created"] . '  ---- Son las:  ' . date("Y-m-d H:i:s") . '  Hace:  ' . $totalDiff; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter" style="margin:0px !important; padding:0px !important" >
                <thead>
                    <tr>
                        <th class="text-center" style="margin:0px !important; padding:0px !important" ><?php echo __('Cantidad'); ?></th>
                        <th class="text-center" style="margin:0px !important; padding:0px !important" ><?php echo __('Producto'); ?></th>
                        <th class="text-center" style="margin:0px !important; padding:0px !important" ><?php echo __('Ingredientes'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($order["OrderProduct"] as $opIDX => $orderProduct)
                    {
                        ?>
                            <tr>
                                <td class="text-center" style="margin:0px !important; padding:0px !important" ><?php echo $orderProduct["product_qty"] ?></td>
                                <td class="text-center" style="margin:0px !important; padding:0px !important" ><?php echo $orderProduct["Product"]["name"] ?></td>
                                <td class="text-center" style="margin:0px !important; padding:0px !important" >
                                    <a href="javascript:void(0);"><i class="fa fa-pencil text-danger"></i>Third item</a>
                                    <a href="javascript:void(0);"><i class="fa fa-pencil text-success"></i>Sublist</a>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

?>
</div>

<script type="text/javascript" >
    setTimeout(function(){
        location.reload();
    }, 60000 * 2);
</script>