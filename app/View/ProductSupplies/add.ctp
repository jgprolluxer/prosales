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
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<div class="productSupplies form">
<?php echo $this->Form->create('ProductSupply'); ?>
	<fieldset>
		<legend><?php echo __('Add Product Supply'); ?></legend>
	<?php
            echo $this->Form->input('product_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ProductID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly',
                'value' => $products["Product"]["id"]
            ));
            echo $this->Form->input('productname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Producto')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly',
                'value' => $products["Product"]["name"]
            ));
		echo $this->Form->input('uomqty');
		echo $this->Form->input('supply_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Product Supplies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('controller' => 'supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('controller' => 'supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
