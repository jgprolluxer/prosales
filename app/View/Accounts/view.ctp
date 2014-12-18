<div class="accounts view">
<h2><?php echo __('Account'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($account['Account']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($account['Account']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($account['Account']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($account['Account']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($account['Account']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($account['Account']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($account['Account']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($account['Account']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($account['Account']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($account['Account']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($account['Team']['name'], array('controller' => 'teams', 'action' => 'view', $account['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mode'); ?></dt>
		<dd>
			<?php echo h($account['Account']['mode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($account['Account']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Integration Id'); ?></dt>
		<dd>
			<?php echo h($account['Account']['integration_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), array(), __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('controller' => 'order_payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($account['Activity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Recurring'); ?></th>
		<th><?php echo __('Recurring Freq'); ?></th>
		<th><?php echo __('Planned Startdate'); ?></th>
		<th><?php echo __('Planned Enddate'); ?></th>
		<th><?php echo __('Actual Startdate'); ?></th>
		<th><?php echo __('Actual Enddate'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Owner'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('ObjectType'); ?></th>
		<th><?php echo __('ObjectId'); ?></th>
		<th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Auto Flg'); ?></th>
		<th><?php echo __('Act Plan Detail Id'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Assigned User'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['Activity'] as $activity): ?>
		<tr>
			<td><?php echo $activity['id']; ?></td>
			<td><?php echo $activity['type']; ?></td>
			<td><?php echo $activity['name']; ?></td>
			<td><?php echo $activity['status']; ?></td>
			<td><?php echo $activity['recurring']; ?></td>
			<td><?php echo $activity['recurring_freq']; ?></td>
			<td><?php echo $activity['planned_startdate']; ?></td>
			<td><?php echo $activity['planned_enddate']; ?></td>
			<td><?php echo $activity['actual_startdate']; ?></td>
			<td><?php echo $activity['actual_enddate']; ?></td>
			<td><?php echo $activity['created']; ?></td>
			<td><?php echo $activity['updated']; ?></td>
			<td><?php echo $activity['created_by']; ?></td>
			<td><?php echo $activity['updated_by']; ?></td>
			<td><?php echo $activity['owner']; ?></td>
			<td><?php echo $activity['description']; ?></td>
			<td><?php echo $activity['objectType']; ?></td>
			<td><?php echo $activity['objectId']; ?></td>
			<td><?php echo $activity['all_day']; ?></td>
			<td><?php echo $activity['auto_flg']; ?></td>
			<td><?php echo $activity['act_plan_detail_id']; ?></td>
			<td><?php echo $activity['duration']; ?></td>
			<td><?php echo $activity['assigned_user']; ?></td>
			<td><?php echo $activity['account_id']; ?></td>
			<td><?php echo $activity['resource_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'activities', 'action' => 'view', $activity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'activities', 'action' => 'edit', $activity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'activities', 'action' => 'delete', $activity['id']), array(), __('Are you sure you want to delete # %s?', $activity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Order Payments'); ?></h3>
	<?php if (!empty($account['OrderPayment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Docnum'); ?></th>
		<th><?php echo __('Docseq'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Payment Date'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Total Amt'); ?></th>
		<th><?php echo __('Subtotal Amt'); ?></th>
		<th><?php echo __('Tax Amt'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Bank Name'); ?></th>
		<th><?php echo __('Bank Ref'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Payment Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['OrderPayment'] as $orderPayment): ?>
		<tr>
			<td><?php echo $orderPayment['id']; ?></td>
			<td><?php echo $orderPayment['type']; ?></td>
			<td><?php echo $orderPayment['status']; ?></td>
			<td><?php echo $orderPayment['docnum']; ?></td>
			<td><?php echo $orderPayment['docseq']; ?></td>
			<td><?php echo $orderPayment['created']; ?></td>
			<td><?php echo $orderPayment['updated']; ?></td>
			<td><?php echo $orderPayment['created_by']; ?></td>
			<td><?php echo $orderPayment['updated_by']; ?></td>
			<td><?php echo $orderPayment['payment_date']; ?></td>
			<td><?php echo $orderPayment['due_date']; ?></td>
			<td><?php echo $orderPayment['amount']; ?></td>
			<td><?php echo $orderPayment['total_amt']; ?></td>
			<td><?php echo $orderPayment['subtotal_amt']; ?></td>
			<td><?php echo $orderPayment['tax_amt']; ?></td>
			<td><?php echo $orderPayment['tax']; ?></td>
			<td><?php echo $orderPayment['account_id']; ?></td>
			<td><?php echo $orderPayment['order_id']; ?></td>
			<td><?php echo $orderPayment['bank_name']; ?></td>
			<td><?php echo $orderPayment['bank_ref']; ?></td>
			<td><?php echo $orderPayment['description']; ?></td>
			<td><?php echo $orderPayment['payment_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_payments', 'action' => 'view', $orderPayment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_payments', 'action' => 'edit', $orderPayment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_payments', 'action' => 'delete', $orderPayment['id']), array(), __('Are you sure you want to delete # %s?', $orderPayment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($account['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Total Amt'); ?></th>
		<th><?php echo __('Subtotal Amt'); ?></th>
		<th><?php echo __('Tax Amt'); ?></th>
		<th><?php echo __('Disc Amt'); ?></th>
		<th><?php echo __('Disc Desc'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Disc'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Owner'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['type']; ?></td>
			<td><?php echo $order['status']; ?></td>
			<td><?php echo $order['name']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['updated']; ?></td>
			<td><?php echo $order['created_by']; ?></td>
			<td><?php echo $order['updated_by']; ?></td>
			<td><?php echo $order['price']; ?></td>
			<td><?php echo $order['total_amt']; ?></td>
			<td><?php echo $order['subtotal_amt']; ?></td>
			<td><?php echo $order['tax_amt']; ?></td>
			<td><?php echo $order['disc_amt']; ?></td>
			<td><?php echo $order['disc_desc']; ?></td>
			<td><?php echo $order['tax']; ?></td>
			<td><?php echo $order['disc']; ?></td>
			<td><?php echo $order['account_id']; ?></td>
			<td><?php echo $order['description']; ?></td>
			<td><?php echo $order['owner']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array(), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Payments'); ?></h3>
	<?php if (!empty($account['Payment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Folio'); ?></th>
		<th><?php echo __('Due Amount'); ?></th>
		<th><?php echo __('Due Days'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['type']; ?></td>
			<td><?php echo $payment['status']; ?></td>
			<td><?php echo $payment['folio']; ?></td>
			<td><?php echo $payment['due_amount']; ?></td>
			<td><?php echo $payment['due_days']; ?></td>
			<td><?php echo $payment['created']; ?></td>
			<td><?php echo $payment['updated']; ?></td>
			<td><?php echo $payment['created_by']; ?></td>
			<td><?php echo $payment['updated_by']; ?></td>
			<td><?php echo $payment['account_id']; ?></td>
			<td><?php echo $payment['due_date']; ?></td>
			<td><?php echo $payment['amount']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), array(), __('Are you sure you want to delete # %s?', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
