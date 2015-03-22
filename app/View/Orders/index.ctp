<script type="text/javascript">
$(document).ready(function ()
{
	//$('#page-container').removeClass('sidebar-visible-xs');
	//$('#page-container').removeClass('sidebar-visible-lg');

	$('#page-container').attr('class', 'sidebar-no-animations');
	$('header').hide();
	/* Add placeholder attribute to the search input */
	$('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
	<?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<!-- All Orders Block -->
<div class="block full">
	<!-- All Orders Title -->
	<div class="block-title">
		<div class="block-options pull-right">
			<?php
			echo $this->AclView->link(  '<i class="fa fa-plus"></i> '.__('Punto de venta'),
			array('plugin' => $this->params['plugin'],
			'prefix' => null,
			'admin' => $this->params['admin'],
			'controller' => $this->params['controller'],
			'action' => 'add'
		),
		array('escape' => false, 'class' => array('btn btn-info', 'animation-tossing', 'themed-background-spring')));
		?>
	</div>
	<h2>Ventas</h2>
</div>
<!-- END All Orders Title -->

<!-- All Orders Content -->
<div class="table-responsive">
<table id="example-datatable" class="table table-bordered table-striped table-vcenter">
	<thead>
		<tr>
			<th class="text-center">Folio</th>
			<th class="text-center">Cliente</th>
			<th class="text-center">Total</th>
			<th class="text-center">Estado</th>
			<th class="text-center">Fecha</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($orders as $idx => $order)
		{
			?>
			<tr>
				<td class="text-center">
						<?php
						echo $this->AclView->link($order["Order"]["folio"],
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'view', $order["Order"]["id"]
					),
					array('escape' => false, 'class' => array('')));
					?>
				</td>
				<td class="text-center"><?php echo $order["Account"]["firstname"] . " " . $order["Account"]["lastname"]; ?></td>
				<td class="text-center">$<?php echo $order["Order"]["total_amt"]; ?></td>
				<td class="text-center"><?php echo __($order["Order"]["status"]); ?></td>
				<td class="text-center"><?php echo $order["Order"]["created"]; ?></td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<?php
						echo $this->AclView->link(  '<i class="fa fa-eye"></i>'.__(''),
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'view', $order["Order"]["id"]
					),
					array('escape' => false, 'class' => array('btn btn-info')));
					?>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>
</table>
</div>
<!-- END All Orders Content -->
</div>
<!-- END All Orders Block -->
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- Load and execute javascript code used only in this page -->

<script type="text/javascript">
$(function() {
	TablesDatatables.init();
});
</script>
