<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($order['Order']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($order['Order']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($order['Order']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($order['Order']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Folio'); ?></dt>
		<dd>
			<?php echo h($order['Order']['folio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amt'); ?></dt>
		<dd>
			<?php echo h($order['Order']['total_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal Amt'); ?></dt>
		<dd>
			<?php echo h($order['Order']['subtotal_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($order['Order']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disc'); ?></dt>
		<dd>
			<?php echo h($order['Order']['disc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disc Desc'); ?></dt>
		<dd>
			<?php echo h($order['Order']['disc_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $order['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($order['Order']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Saleschannel'); ?></dt>
		<dd>
			<?php echo h($order['Order']['saleschannel']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array(), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('controller' => 'order_payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Order Payments'); ?></h3>
	<?php if (!empty($order['OrderPayment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Payment Id'); ?></th>
		<th><?php echo __('Folio'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Payment Date'); ?></th>
		<th><?php echo __('Total Amt'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['OrderPayment'] as $orderPayment): ?>
		<tr>
			<td><?php echo $orderPayment['id']; ?></td>
			<td><?php echo $orderPayment['created']; ?></td>
			<td><?php echo $orderPayment['updated']; ?></td>
			<td><?php echo $orderPayment['created_by']; ?></td>
			<td><?php echo $orderPayment['updated_by']; ?></td>
			<td><?php echo $orderPayment['order_id']; ?></td>
			<td><?php echo $orderPayment['payment_id']; ?></td>
			<td><?php echo $orderPayment['folio']; ?></td>
			<td><?php echo $orderPayment['type']; ?></td>
			<td><?php echo $orderPayment['status']; ?></td>
			<td><?php echo $orderPayment['payment_date']; ?></td>
			<td><?php echo $orderPayment['total_amt']; ?></td>
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
	<h3><?php echo __('Related Order Products'); ?></h3>
	<?php if (!empty($order['OrderProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Product Price'); ?></th>
		<th><?php echo __('Product Qty'); ?></th>
		<th><?php echo __('Product Disc'); ?></th>
		<th><?php echo __('Product Tax'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['OrderProduct'] as $orderProduct): ?>
		<tr>
			<td><?php echo $orderProduct['id']; ?></td>
			<td><?php echo $orderProduct['created']; ?></td>
			<td><?php echo $orderProduct['updated']; ?></td>
			<td><?php echo $orderProduct['created_by']; ?></td>
			<td><?php echo $orderProduct['updated_by']; ?></td>
			<td><?php echo $orderProduct['status']; ?></td>
			<td><?php echo $orderProduct['order_id']; ?></td>
			<td><?php echo $orderProduct['product_id']; ?></td>
			<td><?php echo $orderProduct['product_price']; ?></td>
			<td><?php echo $orderProduct['product_qty']; ?></td>
			<td><?php echo $orderProduct['product_disc']; ?></td>
			<td><?php echo $orderProduct['product_tax']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_products', 'action' => 'view', $orderProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_products', 'action' => 'edit', $orderProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_products', 'action' => 'delete', $orderProduct['id']), array(), __('Are you sure you want to delete # %s?', $orderProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
