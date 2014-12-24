<div class="notes form">
<?php echo $this->Form->create('Note'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Note'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('description');
		echo $this->Form->input('title');
		echo $this->Form->input('objectType');
		echo $this->Form->input('objectid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notes'), array('action' => 'index')); ?></li>
	</ul>
</div>
