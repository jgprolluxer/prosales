<div class="orderProductSupplies form">
<?php echo $this->Form->create('OrderProductSupply'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order Product Supply'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('order_product_id');
		echo $this->Form->input('supply_id');
		echo $this->Form->input('added');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderProductSupply.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrderProductSupply.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Product Supplies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('controller' => 'supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('controller' => 'supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
