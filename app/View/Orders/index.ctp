<!-- Forms General Header -->
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="fa fa-users"></i><?php echo __('ACCOUNT_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ACCOUNT_INDEX_HEAD_TITLE_SMALL'); ?></small>
		</h1>
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('total_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('disc_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('disc_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('disc'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('owner'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['type']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['status']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['name']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['updated']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['price']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['total_amt']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['subtotal_amt']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['tax_amt']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['disc_amt']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['disc_desc']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['tax']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['disc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $order['Account']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['description']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['owner']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array(), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('controller' => 'order_payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script type="text/javascript">
$(document).ready(function ()
{
        //$('#page-container').removeClass('sidebar-visible-xs');
        //$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
});
</script>
<?php
debug($report);
?>