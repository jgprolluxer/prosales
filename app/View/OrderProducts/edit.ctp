<div class="orderProducts form">
<?php echo $this->Form->create('OrderProduct'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('order_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('product_qty');
		echo $this->Form->input('product_disc');
		echo $this->Form->input('product_price');
		echo $this->Form->input('stock_chk');
		echo $this->Form->input('resourcename');
		echo $this->Form->input('resource_id');
		echo $this->Form->input('datescheduling');
		echo $this->Form->input('datescheduling_enddate');
		echo $this->Form->input('duration');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderProduct.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrderProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
