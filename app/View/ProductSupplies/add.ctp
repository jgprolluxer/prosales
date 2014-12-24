<div class="productSupplies form">
<?php echo $this->Form->create('ProductSupply'); ?>
	<fieldset>
		<legend><?php echo __('Add Product Supply'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('amount_uom');
		echo $this->Form->input('product_supplyid');
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
	</ul>
</div>
