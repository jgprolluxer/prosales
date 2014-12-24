<div class="orderPayments index">
	<h2><?php echo __('Order Payments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('docnum'); ?></th>
			<th><?php echo $this->Paginator->sort('docseq'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th><?php echo $this->Paginator->sort('due_date'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('total_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_ref'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orderPayments as $orderPayment): ?>
	<tr>
		<td><?php echo h($orderPayment['OrderPayment']['id']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['type']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['status']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['docnum']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['docseq']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['created']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['updated']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['payment_date']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['due_date']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['amount']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['total_amt']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['subtotal_amt']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['tax_amt']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['tax']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderPayment['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $orderPayment['Account']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderPayment['Order']['name'], array('controller' => 'orders', 'action' => 'view', $orderPayment['Order']['id'])); ?>
		</td>
		<td><?php echo h($orderPayment['OrderPayment']['bank_name']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['bank_ref']); ?>&nbsp;</td>
		<td><?php echo h($orderPayment['OrderPayment']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderPayment['Payment']['amount'], array('controller' => 'payments', 'action' => 'view', $orderPayment['Payment']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderPayment['OrderPayment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderPayment['OrderPayment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderPayment['OrderPayment']['id']), array(), __('Are you sure you want to delete # %s?', $orderPayment['OrderPayment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
