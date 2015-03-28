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
				<h4 class="widget-content-light"><i class="fa fa-paypal"></i> <strong>Total</strong></h4>
			</div>
			<div class="widget-extra-full"><span class="h2 text-info animation-expandOpen"> <?php echo "$".$order["Order"]["total_amt"];?></span></div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><i class="fa fa-status"></i> <strong>Estado</strong></h4>
			</div>
			<div class="widget-extra-full"><span class="h2 text-info animation-expandOpen"> <?php echo __($order["Order"]["status"]);?></span></div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div class="widget-extra themed-background-info">
				<h4 class="widget-content-light"><i class="fa fa-actions"></i> <strong>Acciones</strong></h4>
			</div>
			<div class="widget-extra-full">
				<a href="javascript:;" class="btn btn-warning" ><?php echo __('Modificar'); ?></a>
			</div>
		</div>
	</div>
</div>
<!-- END Order Status -->

<!-- Products Block -->
<div class="block">
	<!-- Products Title -->
	<div class="block-title">
		<h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
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
		<div class="block">
			<!-- Billing Address Title -->
			<div class="block-title">
				<h2><i class="fa fa-building-o"></i> <strong>Billing</strong> Address</h2>
			</div>
			<!-- END Billing Address Title -->

			<!-- Billing Address Content -->
			<h4><strong>Jonathan Taylor</strong></h4>
			<address>
				Sunset Str 620<br>
				Melbourne<br>
				Australia, 21-842<br><br>
				<i class="fa fa-phone"></i> (999) 852-11111<br>
				<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">johnathan.taylor@example.com</a>
			</address>
			<!-- END Billing Address Content -->
		</div>
		<!-- END Billing Address Block -->
	</div>
	<div class="col-sm-6">
		<!-- Shipping Address Block -->
		<div class="block">
			<!-- Shipping Address Title -->
			<div class="block-title">
				<h2><i class="fa fa-building-o"></i> <strong>Shipping</strong> Address</h2>
			</div>
			<!-- END Shipping Address Title -->

			<!-- Shipping Address Content -->
			<h4><strong>Harry Burke</strong></h4>
			<address>
				Sunset Str 598<br>
				Melbourne<br>
				Australia, 21-852<br><br>
				<i class="fa fa-phone"></i> (999) 852-22222<br>
				<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">harry.burke@example.com</a>
			</address>
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
		<h2><i class="fa fa-file-text-o"></i> <strong>Log</strong> Messages</h2>
	</div>
	<!-- END Log Title -->

	<!-- Log Content -->
	<div class="table-responsive">
		<table class="table table-bordered table-vcenter">
			<tbody>
				<tr>
					<td>
						<span class="label label-primary">Order</span>
					</td>
					<td class="text-center">October 17, 2014 - 12:00</td>
					<td><a href="javascript:void(0)">Support</a></td>
					<td class="text-success"><i class="fa fa-fw fa-check"></i> <strong>Order Completed</strong></td>
				</tr>
				<tr>
					<td>
						<span class="label label-primary">Order</span>
					</td>
					<td class="text-center">October 17, 2014 - 10:15</td>
					<td><a href="javascript:void(0)">Support</a></td>
					<td class="text-info"><i class="fa fa-fw fa-info-circle"></i> <strong>Preparing Order</strong></td>
				</tr>
				<tr>
					<td>
						<span class="label label-success">Payment</span>
					</td>
					<td class="text-center">October 16, 2014 - 17:15</td>
					<td><a href="javascript:void(0)">Harry Burke</a></td>
					<td class="text-success"><i class="fa fa-fw fa-check"></i> <strong>Payment Completed</strong></td>
				</tr>
				<tr>
					<td>
						<span class="label label-danger">Email</span>
					</td>
					<td class="text-center">October 16, 2014 - 09:10</td>
					<td><a href="javascript:void(0)">Support</a></td>
					<td class="text-danger"><i class="fa fa-fw fa-exclamation-triangle"></i> <strong>Missing payment details. Email was sent and awaiting for payment before processing</strong></td>
				</tr>
				<tr>
					<td>
						<span class="label label-primary">Order</span>
					</td>
					<td class="text-center">October 15, 2014 - 12:26</td>
					<td><a href="javascript:void(0)">Support</a></td>
					<td><strong>All products are available</strong></td>
				</tr>
				<tr>
					<td>
						<span class="label label-primary">Order</span>
					</td>
					<td class="text-center">October 15, 2014 - 12:15</td>
					<td><a href="javascript:void(0)">Harry Burke</a></td>
					<td><strong>Order Submitted</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- END Log Content -->
</div>
<!-- END Log Block -->
