<div class="configs form">
<?php echo $this->Form->create('Config'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Config'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('productname');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('active_flg');
		echo $this->Form->input('timezone');
		echo $this->Form->input('logo');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('website');
		echo $this->Form->input('copyright');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configs'), array('action' => 'index')); ?></li>
	</ul>
</div>
