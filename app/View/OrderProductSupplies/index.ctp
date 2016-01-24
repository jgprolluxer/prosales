<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations footer-fixed');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<div class="orderProductSupplies index">
	<h2><?php echo __('Order Product Supplies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('order_product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('supply_id'); ?></th>
			<th><?php echo $this->Paginator->sort('added'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orderProductSupplies as $orderProductSupply): ?>
	<tr>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['id']); ?>&nbsp;</td>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['created']); ?>&nbsp;</td>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['updated']); ?>&nbsp;</td>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderProductSupply['OrderProduct']['order_id'], array('controller' => 'order_products', 'action' => 'view', $orderProductSupply['OrderProduct']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderProductSupply['Supply']['name'], array('controller' => 'supplies', 'action' => 'view', $orderProductSupply['Supply']['id'])); ?>
		</td>
		<td><?php echo h($orderProductSupply['OrderProductSupply']['added']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderProductSupply['OrderProductSupply']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderProductSupply['OrderProductSupply']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderProductSupply['OrderProductSupply']['id']), array(), __('Are you sure you want to delete # %s?', $orderProductSupply['OrderProductSupply']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order Product Supply'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('controller' => 'supplies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('controller' => 'supplies', 'action' => 'add')); ?> </li>
	</ul>
</div>
