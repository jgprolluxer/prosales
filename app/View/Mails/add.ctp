<div class="mails form">
<?php echo $this->Form->create('Mail'); ?>
	<fieldset>
		<legend><?php echo __('Add Mail'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('mail_from');
		echo $this->Form->input('mail_to');
		echo $this->Form->input('subject');
		echo $this->Form->input('mail_body');
		echo $this->Form->input('mail_to_cc');
		echo $this->Form->input('attachment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mails'), array('action' => 'index')); ?></li>
	</ul>
</div>
