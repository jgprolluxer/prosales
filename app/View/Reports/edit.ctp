<div class="reports form">
<?php echo $this->Form->create('Report'); ?>
	<fieldset>
		<legend><?php echo __('Edit Report'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('title');
		echo $this->Form->input('rkey');
		echo $this->Form->input('type');
            echo $this->Form->input('category', array(
                'label' => array('class' => 'col-md-4 control-label', 'translate' => __('ADMIN_REPORT_ADD_FORM_FIELD_CATEGORY')),
                'class' => 'form-control',
                'type' => 'text'
            ));
		echo $this->Form->input('status');
		echo $this->Form->input('modelName');
		echo $this->Form->input('findType');
		echo $this->Form->input('recursive');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Report.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Report.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?></li>
	</ul>
</div>
