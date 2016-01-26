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
<!-- All StoresProducts Block -->
<div class="block full">
	<!-- All StoresProducts Title -->
	<div class="block-title">
		<div class="block-options pull-right">
		</div>
		<h2><?php echo __('Inventario');  ?></h2>
	</div>
	
			<?php
			echo $this->AclView->link(  '<i class="fa fa-plus"></i> '.__('Producto'),
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'add'
					),
					array('escape' => false, 'class' => array('btn btn-info')));
			?>

<!-- END All Orders Title -->
<!-- All Orders Content -->
<div class="table-responsive">
<table id="example-datatable" class="table table-bordered table-striped table-vcenter">
	<thead>
		<tr>
			<th class="text-center"><?php echo __('Sucursal'); ?></th>
			<th class="text-center"><?php echo __('Producto'); ?></th>
			<th class="text-center"><?php echo __('Stock'); ?></th>
			<th class="text-center"><?php echo __('Esperando'); ?></th>
			<th class="text-center"><?php echo __('Vendido'); ?></th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($storesproducts as $idx => $storesproduct)
		{
			?>
			<tr>
				<td class="text-center"><?php echo $storesproduct["Store"]["name"]; ?></td>
				<td class="text-center">
						<?php
						echo $this->AclView->link($storesproduct["Product"]["name"],
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'view', $storesproduct["StoresProduct"]["id"]
					),
					array('escape' => false, 'class' => array('')));
					?>
				</td>
				<td class="text-center"><?php echo $storesproduct["StoresProduct"]["stock"]; ?></td>
				<td class="text-center"><?php echo $storesproduct["StoresProduct"]["awaiting"]; ?></td>
				<td class="text-center"><?php echo $storesproduct["StoresProduct"]["sold"]; ?></td>
				<td class="text-center">
					<div class="btn-group btn-group-xs">
						<?php
						echo $this->AclView->link(  '<i class="fa fa-eye"></i>'.__(''),
						array('plugin' => $this->params['plugin'],
						'prefix' => null,
						'admin' => $this->params['admin'],
						'controller' => $this->params['controller'],
						'action' => 'view', $storesproduct["StoresProduct"]["id"]
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
