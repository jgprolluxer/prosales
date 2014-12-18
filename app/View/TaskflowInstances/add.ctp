<div class="taskflowInstances form">
<?php echo $this->Form->create('TaskflowInstance'); ?>
	<fieldset>
		<legend><?php echo __('Add Taskflow Instance'); ?></legend>
	<?php
		echo $this->Form->input('taskflow_id');
		echo $this->Form->input('task_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('rel_object');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Taskflow Instances'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Taskflows'), array('controller' => 'taskflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow'), array('controller' => 'taskflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
