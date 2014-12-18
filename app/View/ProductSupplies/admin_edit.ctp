<div class="productSupplies form">
<?php echo $this->Form->create('ProductSupply'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Product Supply'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProductSupply.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ProductSupply.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Product Supplies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
