<div class="orderProductSupplies view">
<h2><?php echo __('Order Product Supply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderProductSupply['OrderProduct']['order_id'], array('controller' => 'order_products', 'action' => 'view', $orderProductSupply['OrderProduct']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supply'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderProductSupply['Supply']['name'], array('controller' => 'supplies', 'action' => 'view', $orderProductSupply['Supply']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($orderProductSupply['OrderProductSupply']['added']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Product Supply'), array('action' => 'edit', $orderProductSupply['OrderProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Product Supply'), array('action' => 'delete', $orderProductSupply['OrderProductSupply']['id']), array(), __('Are you sure you want to delete # %s?', $orderProductSupply['OrderProductSupply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Product Supplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product Supply'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('controller' => 'supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('controller' => 'supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
