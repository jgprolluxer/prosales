<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('status');
		echo $this->Form->input('part_number');
		echo $this->Form->input('integration_num');
		echo $this->Form->input('name');
		echo $this->Form->input('family_id');
		echo $this->Form->input('uom');
		echo $this->Form->input('unit_price');
		echo $this->Form->input('type');
		echo $this->Form->input('short_desc');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Product.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Supplies'), array('controller' => 'product_supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Supply'), array('controller' => 'product_supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
