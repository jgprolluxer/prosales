<div class="productSupplies view">
<h2><?php echo __('Product Supply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productSupply['ProductSupply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productSupply['Product']['name'], array('controller' => 'products', 'action' => 'view', $productSupply['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount Uom'); ?></dt>
		<dd>
			<?php echo h($productSupply['ProductSupply']['amount_uom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Supplyid'); ?></dt>
		<dd>
			<?php echo h($productSupply['ProductSupply']['product_supplyid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Supply'), array('action' => 'edit', $productSupply['ProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Supply'), array('action' => 'delete', $productSupply['ProductSupply']['id']), array(), __('Are you sure you want to delete # %s?', $productSupply['ProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Supplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Supply'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
