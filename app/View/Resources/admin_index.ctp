<div class="resources index">
	<h2><?php echo __('Resources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_type'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($resources as $resource): ?>
	<tr>
		<td><?php echo h($resource['Resource']['id']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['created']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['updated']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['name']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['class']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['type']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['sub_type']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['description']); ?>&nbsp;</td>
		<td><?php echo h($resource['Resource']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resource['Resource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resource['Resource']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resource['Resource']['id']), array(), __('Are you sure you want to delete # %s?', $resource['Resource']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resource'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
