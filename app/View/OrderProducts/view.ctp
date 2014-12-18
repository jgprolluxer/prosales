<div class="orderProducts view">
<h2><?php echo __('Order Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderProduct['Order']['name'], array('controller' => 'orders', 'action' => 'view', $orderProduct['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $orderProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Qty'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['product_qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Disc'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['product_disc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Price'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['product_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock Chk'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['stock_chk']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resourcename'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['resourcename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderProduct['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $orderProduct['Resource']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datescheduling'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['datescheduling']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datescheduling Enddate'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['datescheduling_enddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($orderProduct['OrderProduct']['duration']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Product'), array('action' => 'edit', $orderProduct['OrderProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Product'), array('action' => 'delete', $orderProduct['OrderProduct']['id']), array(), __('Are you sure you want to delete # %s?', $orderProduct['OrderProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
