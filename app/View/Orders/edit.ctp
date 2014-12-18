<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('price');
		echo $this->Form->input('total_amt');
		echo $this->Form->input('subtotal_amt');
		echo $this->Form->input('tax_amt');
		echo $this->Form->input('disc_amt');
		echo $this->Form->input('disc_desc');
		echo $this->Form->input('tax');
		echo $this->Form->input('disc');
		echo $this->Form->input('account_id');
		echo $this->Form->input('description');
		echo $this->Form->input('owner');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Order.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('controller' => 'order_payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
