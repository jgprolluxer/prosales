<div class="storeProducts index">
	<h2><?php echo __('Store Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stock'); ?></th>
			<th><?php echo $this->Paginator->sort('awaiting'); ?></th>
			<th><?php echo $this->Paginator->sort('commited'); ?></th>
			<th><?php echo $this->Paginator->sort('sold'); ?></th>
			<th><?php echo $this->Paginator->sort('revenue'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($storeProducts as $storeProduct): ?>
	<tr>
		<td><?php echo h($storeProduct['StoreProduct']['id']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['created']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['updated']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storeProduct['Store']['name'], array('controller' => 'stores', 'action' => 'view', $storeProduct['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storeProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $storeProduct['Product']['id'])); ?>
		</td>
		<td><?php echo h($storeProduct['StoreProduct']['stock']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['awaiting']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['commited']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['sold']); ?>&nbsp;</td>
		<td><?php echo h($storeProduct['StoreProduct']['revenue']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $storeProduct['StoreProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storeProduct['StoreProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storeProduct['StoreProduct']['id']), array(), __('Are you sure you want to delete # %s?', $storeProduct['StoreProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Store Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
