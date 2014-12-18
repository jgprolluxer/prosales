<div class="pricelistProducts index">
	<h2><?php echo __('Pricelist Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('pricelist_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('unit_price'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('priceinpoints'); ?></th>
			<th><?php echo $this->Paginator->sort('startdt'); ?></th>
			<th><?php echo $this->Paginator->sort('enddt'); ?></th>
			<th><?php echo $this->Paginator->sort('disc_percent'); ?></th>
			<th><?php echo $this->Paginator->sort('disc_startdt'); ?></th>
			<th><?php echo $this->Paginator->sort('disc_enddt'); ?></th>
			<th><?php echo $this->Paginator->sort('maxdisc_percent'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pricelistProducts as $pricelistProduct): ?>
	<tr>
		<td><?php echo h($pricelistProduct['PricelistProduct']['id']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['created']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['updated']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['created_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pricelistProduct['Pricelist']['name'], array('controller' => 'pricelists', 'action' => 'view', $pricelistProduct['Pricelist']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pricelistProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $pricelistProduct['Product']['id'])); ?>
		</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['unit_price']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['tax']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['priceinpoints']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['startdt']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['enddt']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['disc_percent']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['disc_startdt']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['disc_enddt']); ?>&nbsp;</td>
		<td><?php echo h($pricelistProduct['PricelistProduct']['maxdisc_percent']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pricelistProduct['PricelistProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pricelistProduct['PricelistProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pricelistProduct['PricelistProduct']['id']), array(), __('Are you sure you want to delete # %s?', $pricelistProduct['PricelistProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pricelist Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('controller' => 'pricelists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist'), array('controller' => 'pricelists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
