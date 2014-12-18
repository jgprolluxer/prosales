<div class="productsComponents index">
	<h2><?php echo __('Products Components'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('bundle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qty'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($productsComponents as $productsComponent): ?>
	<tr>
		<td><?php echo h($productsComponent['ProductsComponent']['id']); ?>&nbsp;</td>
		<td><?php echo h($productsComponent['ProductsComponent']['created']); ?>&nbsp;</td>
		<td><?php echo h($productsComponent['ProductsComponent']['updated']); ?>&nbsp;</td>
		<td><?php echo h($productsComponent['ProductsComponent']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($productsComponent['ProductsComponent']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($productsComponent['ProductsComponent']['bundle_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productsComponent['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsComponent['Product']['id'])); ?>
		</td>
		<td><?php echo h($productsComponent['ProductsComponent']['qty']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $productsComponent['ProductsComponent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productsComponent['ProductsComponent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productsComponent['ProductsComponent']['id']), array(), __('Are you sure you want to delete # %s?', $productsComponent['ProductsComponent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Products Component'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
