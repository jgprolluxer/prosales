<div class="taskflowInstances view">
<h2><?php  echo __('Taskflow Instance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taskflow'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taskflowInstance['Taskflow']['name'], array('controller' => 'taskflows', 'action' => 'view', $taskflowInstance['Taskflow']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taskflowInstance['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $taskflowInstance['Task']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rel Object'); ?></dt>
		<dd>
			<?php echo h($taskflowInstance['TaskflowInstance']['rel_object']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taskflow Instance'), array('action' => 'edit', $taskflowInstance['TaskflowInstance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taskflow Instance'), array('action' => 'delete', $taskflowInstance['TaskflowInstance']['id']), null, __('Are you sure you want to delete # %s?', $taskflowInstance['TaskflowInstance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taskflow Instances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow Instance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taskflows'), array('controller' => 'taskflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow'), array('controller' => 'taskflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
