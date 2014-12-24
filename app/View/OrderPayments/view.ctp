<div class="orderPayments view">
<h2><?php echo __('Order Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Docnum'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['docnum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Docseq'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['docseq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Date'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['payment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amt'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['total_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal Amt'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['subtotal_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Amt'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['tax_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderPayment['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $orderPayment['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderPayment['Order']['name'], array('controller' => 'orders', 'action' => 'view', $orderPayment['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Name'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['bank_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Ref'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['bank_ref']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($orderPayment['OrderPayment']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderPayment['Payment']['amount'], array('controller' => 'payments', 'action' => 'view', $orderPayment['Payment']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Payment'), array('action' => 'edit', $orderPayment['OrderPayment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Payment'), array('action' => 'delete', $orderPayment['OrderPayment']['id']), array(), __('Are you sure you want to delete # %s?', $orderPayment['OrderPayment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
