<div class="pricelists form">
<?php echo $this->Form->create('Pricelist'); ?>
	<fieldset>
		<legend><?php echo __('Add Pricelist'); ?></legend>
	<?php
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('status');
		echo $this->Form->input('name');
		echo $this->Form->input('currency');
		echo $this->Form->input('currency_symbol');
		echo $this->Form->input('tax');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pricelists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pricelist Products'), array('controller' => 'pricelist_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist Product'), array('controller' => 'pricelist_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
