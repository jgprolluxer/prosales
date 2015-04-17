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

<!-- eCommerce Order View Header -->
<div class="content-header">
	<div class="header-section">
    	<?php echo $this->MenuBuilder->build('menu-header-pos');?>
	</div>
</div>
<!-- END eCommerce Order View Header -->
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- Order Status -->
<div class="row text-center">
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><strong><?php echo $order["Order"]["folio"] ?></strong></h4>
			</div>
			<div class="widget-extra-full"><span class="h2 text-info animation-expandOpen"><?php echo $order["Order"]["created"];?></span></div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><strong><?php echo __('Total');?></strong></h4>
			</div>
			<div class="widget-extra-full"><span class="h2 text-info animation-expandOpen"> <?php echo "$".$order["Order"]["total_amt"];?></span></div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><i class="fa fa-status"></i> <strong><?php echo __('Estado'); ?></strong></h4>
			</div>
			<div class="widget-extra-full"><span class="h2 text-info animation-expandOpen"> <?php echo __($order["Order"]["status"]);?></span></div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><i class="fa fa-status"></i> <strong><?php echo $order["User"]["Workstation"]["title"]. $order["User"]["Workstation"]["employeenumber"];?></strong></h4>
			</div>
			<div class="widget-extra-full">
				<span class="h2 text-info animation-expandOpen">
					<?php echo $order["User"]["firstname"] . ' ' . $order["User"]["lastname"] ;?>
				</span>
			</div>
		</div>
	</div>
</div>
<!-- END Order Status -->

<!-- Products Block -->
<div class="block">
	<!-- Products Title -->
	<div class="block-title">
		<h2><?php  echo __('Productos'); ?></h2>
		<div class="block-options pull-right">
			<?php

				if(StatusOfOrder::Closed !== $order["Order"]["status"] && StatusOfOrder::Cancelled !== $order["Order"]["status"] )
				{ 
					?>
						<a href="javascript:void(0);" class="btn btn-info" >
							<?php echo '<i class="fa fa-plus"></i> '. __('Agregar productos'); ?>
						</a>
					<?php

				}
			?>
		</div>
	</div>
	<!-- END Products Title -->

	<!-- Products Content -->
	<div class="table-responsive">
		<table class="table table-bordered table-vcenter">
			<thead>
				<tr>
					<th><?php echo __('Nombre'); ?></th>
					<th><?php echo __('Precio'); ?></th>
					<th><?php echo __('Cantidad'); ?></th>
					<th><?php echo __('Iva'); ?></th>
					<th><?php echo __('Total'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(empty($order["OrderProduct"]))
				{
					echo '<tr><td colspan="5" class="text-center">'. __('No hay productos en la orden') . '</td></tr>';
				}
				foreach($order["OrderProduct"] as $orderProduct)
				{
//(product_price * qty + ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 )).toFixed(2)
					$subtotal = $orderProduct["product_price"] * $orderProduct["product_qty"];
					$total = $subtotal + ( $subtotal * $orderProduct["product_tax"] ) / 100;
					?>
					<tr>
						<td><?php echo $orderProduct["Product"]["name"]; ?></td>
						<td><?php echo $orderProduct["product_price"]; ?></td>
						<td><?php echo $orderProduct["product_qty"]; ?></td>
						<td><?php echo $orderProduct["product_tax"]; ?></td>
						<td><?php echo $total; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- END Products Content -->
</div>
<!-- END Products Block -->

<!-- Addresses -->
<div class="row">
	<div class="col-sm-6">
		<!-- Billing Address Block -->
		<div class="block full">
			<!-- Billing Address Title -->
			<div class="block-title">
				<h2><i class="fa fa-building-o"></i> <?php echo __('Cliente'); ?></h2>
				<div class="block-options pull-right">
			<?php

				if(StatusOfOrder::Closed !== $order["Order"]["status"] && StatusOfOrder::Cancelled !== $order["Order"]["status"] )
				{ 
					?>
					<a href="javascript:void(0);" class="btn btn-info" >
						<?php echo '<i class="gi gi-transfer"></i> '. __('Cambiar Cliente'); ?>
					</a>
					<?php
				}
			?>
				</div>
			</div>
			<!-- END Billing Address Title -->
			<?php
			if(!$order["Account"]["id"])
			{
				?>
				<span class="label label-warning"><?php echo __('Cliente no asignado'); ?></span>
				<?php
			} else {
				?>
	            <!-- Customer Info -->
	            <div class="block-section text-center">
	                <h3>
	                    <strong><?php echo __($order['Account']['firstname']); ?> <?php echo __($order['Account']['lastname']); ?></strong><br><small></small>
	                </h3>
	            </div>
	            <table class="table table-borderless table-striped table-vcenter">
	                <tbody>
	                    <tr>
	                        <td class="text-right" style="width: 50%;"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_ALIAS'); ?></strong></td>
	                        <td><?php echo __($order['Account']['alias']); ?></td>
	                    </tr>
	                    <tr>
	                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_BIRTHDATE'); ?></strong></td>
	                        <td><?php echo __($order['Account']['birthdate']); ?></td>
	                    </tr>
	                    <tr>
	                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_SEX'); ?></strong></td>
	                        <td><?php echo __($order['Account']['sex']); ?></td>
	                    </tr>
	                    <tr>
	                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_MODE'); ?></strong></td>
	                        <td><?php echo __($order['Account']['mode']); ?></td>
	                    </tr>
	                    <tr>
	                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_TYPE'); ?></strong></td>
	                        <td><?php echo __($order['Account']['type']); ?></td>
	                    </tr>
	                </tbody>
	            </table>
	            <!-- END Customer Info -->
				<?php
			}
			?>
		</div>
		<!-- END Billing Address Block -->
	</div>
	<div class="col-sm-6">
		<!-- Shipping Address Block -->
		<div class="block">
			<!-- Shipping Address Title -->
			<div class="block-title">
				<h2><i class="fa fa-building-o"></i> <?php echo __('Direcciones');?></h2>
			</div>
			<!-- END Shipping Address Title -->

			<!-- Shipping Address Content -->
			<?php 
			if( !empty($order["Account"]["Address"]) )
			{
				?>
				<address>
					<?php echo $order["Account"]["Address"][0]["street"]; ?>  <?php echo $order["Account"]["Address"][0]["street_no"] ?>, <?php echo $order["Account"]["Address"][0]["suburb"]; ?><br>
					<?php echo $order["Account"]["Address"][0]["city"]; ?>, <?php echo $order["Account"]["Address"][0]["state"]; ?><br>
					<?php echo $order["Account"]["Address"][0]["country"]; ?><br>
				</address>
				<?php
			}
			?>
			<!-- END Shipping Address Content -->
		</div>
		<!-- END Shipping Address Block -->
	</div>
</div>
<!-- END Addresses -->

<!-- Log Block -->
<div class="block">
	<!-- Log Title -->
	<div class="block-title">
		<h2><i class="fa fa-file-text-o"></i> <?php echo __('Pagos asociados'); ?></h2>
		<div class="block-options pull-right">
			<?php

				if(StatusOfOrder::Closed !== $order["Order"]["status"] && StatusOfOrder::Cancelled !== $order["Order"]["status"] )
				{ 
					?>
					<a href="javascript:void(0);" class="btn btn-info" >
						<?php echo '<i class="fa fa-plus"></i> '. __('Agregar pago'); ?>
					</a>
					<?php
				}
			?>
		</div>
	</div>
	<!-- END Log Title -->

	<!-- Log Content -->
	<div class="table-responsive">
		<table class="table table-bordered table-vcenter">
			<tbody>
				<?php
				if(empty($order["OrderPayment"]))
				{
					?>
					<tr>
						<td>
							<span class="label label-warning"><?php echo __('No existen pagos asociados'); ?></span>
						</td>
					</tr>
					<?php

				}
				foreach ($order["OrderPayment"] as $key => $orderPayment)
				{
					?>
					<tr>
						<td>
							<span class="label label-success"><?php echo $orderPayment["folio"]; ?></span>
						</td>
						<td class="text-center"><?php echo $orderPayment["created"]; ?></td>
						<td><?php echo '$'.$orderPayment["total_amt"]; ?></td>
						<td class="text-success"><i class="fa fa-fw fa-check"></i> <strong><?php echo __('Pago ') . __($orderPayment["status"]) ?></strong></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- END Log Content -->
</div>
<!-- END Log Block -->