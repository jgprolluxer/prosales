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
	<div class="header-section">
    	<?php echo $this->MenuBuilder->build('menu-header-pos');?>
	</div>
</div>
<!-- END eCommerce Order View Header -->
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<div class="storesProducts index">
	<h2><?php echo __('Stores Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stock'); ?></th>
			<th><?php echo $this->Paginator->sort('awaiting'); ?></th>
			<th><?php echo $this->Paginator->sort('commited'); ?></th>
			<th><?php echo $this->Paginator->sort('sold'); ?></th>
			<th><?php echo $this->Paginator->sort('revenue'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($storesProducts as $storesProduct): ?>
	<tr>
		<td><?php echo h($storesProduct['StoresProduct']['id']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['created']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['updated']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storesProduct['Store']['name'], array('controller' => 'stores', 'action' => 'view', $storesProduct['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $storesProduct['Product']['id'])); ?>
		</td>
		<td><?php echo h($storesProduct['StoresProduct']['stock']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['awaiting']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['commited']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['sold']); ?>&nbsp;</td>
		<td><?php echo h($storesProduct['StoresProduct']['revenue']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $storesProduct['StoresProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storesProduct['StoresProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storesProduct['StoresProduct']['id']), array(), __('Are you sure you want to delete # %s?', $storesProduct['StoresProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Stores Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
