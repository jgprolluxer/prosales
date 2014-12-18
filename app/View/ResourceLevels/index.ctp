<div class="resourceLevels index">
	<h2><?php echo __('Resource Levels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('workstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('resource_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($resourceLevels as $resourceLevel): ?>
	<tr>
		<td><?php echo h($resourceLevel['ResourceLevel']['id']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['created']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['updated']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resourceLevel['Workstation']['title'], array('controller' => 'workstations', 'action' => 'view', $resourceLevel['Workstation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($resourceLevel['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $resourceLevel['Resource']['id'])); ?>
		</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['title']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['description']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['sequence']); ?>&nbsp;</td>
		<td><?php echo h($resourceLevel['ResourceLevel']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resourceLevel['ResourceLevel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resourceLevel['ResourceLevel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resourceLevel['ResourceLevel']['id']), null, __('Are you sure you want to delete # %s?', $resourceLevel['ResourceLevel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Resource Level'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workstation'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
