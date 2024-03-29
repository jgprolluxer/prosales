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
<!-- All Orders Block -->
<div class="block full" >
	<!-- All Orders Title -->
	<div class="block-title"  >
		<div class="block-options pull-right">
	    			<?php
			echo $this->Html->link(  '<i class="fa fa-reply"></i> '.__('Atrás'),
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
    $theAccount = $order["Account"];
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

    <div class="block full" style="margin:0px !important; padding:0px !important; margin-top:1px!important; border:2px solid #dbe1e8;" >
        <div class="block-title" style="margin:0px !important; padding:0px !important;" >
            <?php
                if($minuteDiff > 8)
                {
                    echo '<div class="test-circle themed-border-fire themed-background-fire" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-danger" style="margin:0px !important; padding:0px !important;" >'.$theOrder["folio"].'</h2>';
                } elseif($minuteDiff >= 4 && $minuteDiff <= 8 )
                {
                    echo '<div class="test-circle themed-border-autumn themed-background-autumn" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-warning" style="margin:0px !important; padding:0px !important;" >'.$theOrder["folio"].'</h2>';
                } else {
                    echo '<div class="test-circle themed-border-spring themed-background-spring" style="max-width:10px; max-height:10px;" ></div>';
                    echo '<h2 class="text-success" style="margin:0px !important; padding:0px !important;" >'.$theOrder["folio"].'</h2>';
                }
                echo  '&nbsp;&nbsp;<strong>' . $theAccount["firstname"] . ' ' . $theAccount["lastname"] . '</strong>&nbsp;&nbsp;';
                ?>
            <?php //echo __('Para entregar en : &nbsp;&nbsp;'); ?>
            <?php echo '---- &nbsp;&nbsp; Creada el :  ' . $theOrder["created"] . '&nbsp;&nbsp; Hace: &nbsp;&nbsp;' . $totalDiff; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter" style="margin:0px !important; padding:0px !important;" >
                <thead>
                    <tr>
                        <th class="text-center" style="margin:0px !important; padding:0px !important;" ><?php echo __('Cantidad'); ?></th>
                        <th class="text-center" style="margin:0px !important; padding:0px !important;" ><?php echo __('Producto'); ?></th>
                        <th class="text-center" style="margin:0px !important; padding:0px !important;" ><?php echo __('Ingredientes'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($order["OrderProduct"] as $opIDX => $orderProduct)
                    {
                        ?>
                            <tr>
                                <td class="text-center" style="margin:0px !important; padding:0px !important;" ><?php echo $orderProduct["product_qty"] ?></td>
                                <td class="text-center" style="margin:0px !important; padding:0px !important;" ><?php echo $orderProduct["Product"]["name"] ?></td>
                                <td class="text-center" style="margin:0px !important; padding:0px !important;" >
                                    <?php
                                    foreach($orderProduct["OrderProductSupply"] as $opsIDX => $orderProductSupply){
                                        if($orderProductSupply["added"] == true){
                                        ?>
                                        <a href="javascript:void(0);"><i class="fa fa-check text-success"></i><?php echo $orderProductSupply["Supply"]["name"]; ?></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="javascript:void(0);"><i class="fa fa-times text-danger"></i><?php echo $orderProductSupply["Supply"]["name"]; ?></a>
                                        <?php
                                        }
                                    }
                                    ?>
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
    }, 18000);
</script>

<?php
//debug($order["OrderProduct"]);
?>