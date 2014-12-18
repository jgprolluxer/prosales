<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Address'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('country');
		echo $this->Form->input('street');
		echo $this->Form->input('suburb');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('street_no');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
	</ul>
</div>
