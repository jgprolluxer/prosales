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
			echo $this->AclView->link(  '<i class="fa fa-plus"></i> '.__('Agregar productos'),
			array('plugin' => $this->params['plugin'],
			'prefix' => null,
			'admin' => $this->params['admin'],
			'controller' => $this->params['controller'],
			'action' => 'add'
		),
		array('escape' => false, 'class' => array('btn btn-info')));
		?>
	</div>
	<h2>Productos</h2>
</div>
<!-- END All Orders Title -->

<!-- All Orders Content -->
<table id="example-datatable" class="table table-bordered table-striped table-vcenter">
	<thead>
		<tr>
			<th class="text-center">Nombre</th>
			<th class="text-center">Precio</th>
			<th class="text-center">Impuesto %</th>
			<th class="text-center">Inicio</th>
			<th class="text-center">Fin</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($pricelistProducts as $idx => $pricelistProduct)
		{
			?>
			<tr>
				<td class="text-center"><?php echo $pricelistProduct["Product"]["name"]; ?></td>
				<td class="text-center">$<?php echo $pricelistProduct["PricelistProduct"]["unit_price"]; ?></td>
				<td class="text-center"><?php echo $pricelistProduct["PricelistProduct"]["tax"]; ?></td>
				<td class="text-center"><?php echo $pricelistProduct["PricelistProduct"]["startdt"]; ?></td>
				<td class="text-center"><?php echo $pricelistProduct["PricelistProduct"]["enddt"]; ?></td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<?php
						echo $this->AclView->link(  '<i class="fa fa-eye"></i>'.__(''),
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'view', $pricelistProduct["PricelistProduct"]["id"]
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