<div class="taskflows view">
<h2><?php  echo __('Taskflow'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Object'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['trigger_object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active Flg'); ?></dt>
		<dd>
			<?php echo h($taskflow['Taskflow']['active_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taskflow'), array('action' => 'edit', $taskflow['Taskflow']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taskflow'), array('action' => 'delete', $taskflow['Taskflow']['id']), null, __('Are you sure you want to delete # %s?', $taskflow['Taskflow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taskflows'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($taskflow['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Monitor Object'); ?></th>
		<th><?php echo __('End Condition'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($taskflow['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['created']; ?></td>
			<td><?php echo $task['updated']; ?></td>
			<td><?php echo $task['created_by']; ?></td>
			<td><?php echo $task['updated_by']; ?></td>
			<td><?php echo $task['name']; ?></td>
			<td><?php echo $task['description']; ?></td>
			<td><?php echo $task['duration']; ?></td>
			<td><?php echo $task['monitor_object']; ?></td>
			<td><?php echo $task['end_condition']; ?></td>
			<td><?php echo $task['controller']; ?></td>
			<td><?php echo $task['action']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), null, __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
