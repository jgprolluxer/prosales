<div class="pricelistProducts form">
<?php echo $this->Form->create('PricelistProduct'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Pricelist Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('created_by');
		echo $this->Form->input('pricelist_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('unit_price');
		echo $this->Form->input('tax');
		echo $this->Form->input('priceinpoints');
		echo $this->Form->input('startdt');
		echo $this->Form->input('enddt');
		echo $this->Form->input('disc_percent');
		echo $this->Form->input('disc_startdt');
		echo $this->Form->input('disc_enddt');
		echo $this->Form->input('maxdisc_percent');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PricelistProduct.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PricelistProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pricelist Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('controller' => 'pricelists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist'), array('controller' => 'pricelists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
