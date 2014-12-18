<div class="taskflowTasks index">
	<h2><?php echo __('Taskflow Tasks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('taskflow_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th><?php echo $this->Paginator->sort('monitor_object'); ?></th>
			<th><?php echo $this->Paginator->sort('end_condition'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($taskflowTasks as $taskflowTask): ?>
	<tr>
		<td><?php echo h($taskflowTask['TaskflowTask']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($taskflowTask['Taskflow']['name'], array('controller' => 'taskflows', 'action' => 'view', $taskflowTask['Taskflow']['id'])); ?>
		</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['created']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['updated']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['name']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['description']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['duration']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['monitor_object']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['end_condition']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['controller']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['action']); ?>&nbsp;</td>
		<td><?php echo h($taskflowTask['TaskflowTask']['order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $taskflowTask['TaskflowTask']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $taskflowTask['TaskflowTask']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $taskflowTask['TaskflowTask']['id']), null, __('Are you sure you want to delete # %s?', $taskflowTask['TaskflowTask']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Taskflow Task'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Taskflows'), array('controller' => 'taskflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow'), array('controller' => 'taskflows', 'action' => 'add')); ?> </li>
	</ul>
</div>
