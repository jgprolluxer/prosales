<div class="productsComponents view">
<h2><?php echo __('Products Component'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bundle Id'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['bundle_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsComponent['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsComponent['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qty'); ?></dt>
		<dd>
			<?php echo h($productsComponent['ProductsComponent']['qty']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Products Component'), array('action' => 'edit', $productsComponent['ProductsComponent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Products Component'), array('action' => 'delete', $productsComponent['ProductsComponent']['id']), array(), __('Are you sure you want to delete # %s?', $productsComponent['ProductsComponent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products Components'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products Component'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
