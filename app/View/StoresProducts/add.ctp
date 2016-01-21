<div class="storesProducts form">
<?php echo $this->Form->create('StoresProduct'); ?>
	<fieldset>
		<legend><?php echo __('Add Stores Product'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('store_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('stock');
		echo $this->Form->input('awaiting');
		echo $this->Form->input('commited');
		echo $this->Form->input('sold');
		echo $this->Form->input('revenue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stores Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
