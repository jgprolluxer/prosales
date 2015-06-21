<div class="supplies form">
<?php echo $this->Form->create('Supply'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supply'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('status');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('uom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Supply.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Supply.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('action' => 'index')); ?></li>
	</ul>
</div>
