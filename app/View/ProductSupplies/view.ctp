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
<div class="productSupplies view">
<h2><?php echo __('Product Supply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productSupply['ProductSupply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productSupply['Product']['name'], array('controller' => 'products', 'action' => 'view', $productSupply['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uomqty'); ?></dt>
		<dd>
			<?php echo h($productSupply['ProductSupply']['uomqty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supply'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productSupply['Supply']['name'], array('controller' => 'supplies', 'action' => 'view', $productSupply['Supply']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Supply'), array('action' => 'edit', $productSupply['ProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Supply'), array('action' => 'delete', $productSupply['ProductSupply']['id']), array(), __('Are you sure you want to delete # %s?', $productSupply['ProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Supplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Supply'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('controller' => 'supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('controller' => 'supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
