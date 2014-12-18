<div class="appmenus form">
<?php echo $this->Form->create('Appmenu'); ?>
	<fieldset>
		<legend><?php echo __('Add Appmenu'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('parent_id',
            array(
                'options' => $parentAppmenus
        ));
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('ordershow');
		echo $this->Form->input('mkey');
		echo $this->Form->input('type');
		echo $this->Form->input('mname');
		echo $this->Form->input('escapeTitle');
		echo $this->Form->input('title');
		echo $this->Form->input('admin');
		echo $this->Form->input('url');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('linkClass');
		echo $this->Form->input('linkID');
		echo $this->Form->input('linkDataToggle');
		echo $this->Form->input('liClass');
		echo $this->Form->input('parentUlClass');
		echo $this->Form->input('menuSeparator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Appmenus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Appmenus'), array('controller' => 'appmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Appmenu'), array('controller' => 'appmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>
