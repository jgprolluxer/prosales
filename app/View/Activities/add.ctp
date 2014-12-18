<div class="activities form">
<?php echo $this->Form->create('Activity'); ?>
	<fieldset>
		<legend><?php echo __('Add Activity'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
		echo $this->Form->input('recurring');
		echo $this->Form->input('recurring_freq');
		echo $this->Form->input('planned_startdate');
		echo $this->Form->input('planned_enddate');
		echo $this->Form->input('actual_startdate');
		echo $this->Form->input('actual_enddate');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('owner');
		echo $this->Form->input('description');
		echo $this->Form->input('objectType');
		echo $this->Form->input('objectId');
		echo $this->Form->input('all_day');
		echo $this->Form->input('auto_flg');
		echo $this->Form->input('act_plan_detail_id');
		echo $this->Form->input('duration');
		echo $this->Form->input('assigned_user');
		echo $this->Form->input('account_id');
		echo $this->Form->input('resource_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
