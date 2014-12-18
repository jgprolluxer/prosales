<div class="orderPayments form">
<?php echo $this->Form->create('OrderPayment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order Payment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('docnum');
		echo $this->Form->input('docseq');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('payment_date');
		echo $this->Form->input('due_date');
		echo $this->Form->input('amount');
		echo $this->Form->input('total_amt');
		echo $this->Form->input('subtotal_amt');
		echo $this->Form->input('tax_amt');
		echo $this->Form->input('tax');
		echo $this->Form->input('account_id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('bank_ref');
		echo $this->Form->input('description');
		echo $this->Form->input('payment_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderPayment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrderPayment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
