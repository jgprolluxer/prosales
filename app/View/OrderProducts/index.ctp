<div class="orderProducts index">
	<h2><?php echo __('Order Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_qty'); ?></th>
			<th><?php echo $this->Paginator->sort('product_disc'); ?></th>
			<th><?php echo $this->Paginator->sort('product_price'); ?></th>
			<th><?php echo $this->Paginator->sort('stock_chk'); ?></th>
			<th><?php echo $this->Paginator->sort('resourcename'); ?></th>
			<th><?php echo $this->Paginator->sort('resource_id'); ?></th>
			<th><?php echo $this->Paginator->sort('datescheduling'); ?></th>
			<th><?php echo $this->Paginator->sort('datescheduling_enddate'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orderProducts as $orderProduct): ?>
	<tr>
		<td><?php echo h($orderProduct['OrderProduct']['id']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['created']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['updated']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderProduct['Order']['name'], array('controller' => 'orders', 'action' => 'view', $orderProduct['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $orderProduct['Product']['id'])); ?>
		</td>
		<td><?php echo h($orderProduct['OrderProduct']['product_qty']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['product_disc']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['product_price']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['stock_chk']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['resourcename']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderProduct['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $orderProduct['Resource']['id'])); ?>
		</td>
		<td><?php echo h($orderProduct['OrderProduct']['datescheduling']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['datescheduling_enddate']); ?>&nbsp;</td>
		<td><?php echo h($orderProduct['OrderProduct']['duration']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderProduct['OrderProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderProduct['OrderProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderProduct['OrderProduct']['id']), array(), __('Are you sure you want to delete # %s?', $orderProduct['OrderProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Order Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
