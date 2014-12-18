<div class="teams form">
<?php echo $this->Form->create('Team'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Team'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('name');
		echo $this->Form->input('owner_id');
		echo $this->Form->input('alias');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Workstations'), array('controller' => 'team_workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Workstation'), array('controller' => 'team_workstations', 'action' => 'add')); ?> </li>
	</ul>
</div>
