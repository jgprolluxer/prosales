<div class="taskflowTasks view">
<h2><?php  echo __('Taskflow Task'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taskflow'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taskflowTask['Taskflow']['name'], array('controller' => 'taskflows', 'action' => 'view', $taskflowTask['Taskflow']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monitor Object'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['monitor_object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Condition'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['end_condition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($taskflowTask['TaskflowTask']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taskflow Task'), array('action' => 'edit', $taskflowTask['TaskflowTask']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taskflow Task'), array('action' => 'delete', $taskflowTask['TaskflowTask']['id']), null, __('Are you sure you want to delete # %s?', $taskflowTask['TaskflowTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taskflow Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow Task'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taskflows'), array('controller' => 'taskflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taskflow'), array('controller' => 'taskflows', 'action' => 'add')); ?> </li>
	</ul>
</div>
