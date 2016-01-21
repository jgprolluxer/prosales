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
<div class="storeProducts view">
<h2><?php echo __('Store Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeProduct['Store']['name'], array('controller' => 'stores', 'action' => 'view', $storeProduct['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $storeProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['stock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Awaiting'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['awaiting']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commited'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['commited']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sold'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['sold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revenue'); ?></dt>
		<dd>
			<?php echo h($storeProduct['StoreProduct']['revenue']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Product'), array('action' => 'edit', $storeProduct['StoreProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Product'), array('action' => 'delete', $storeProduct['StoreProduct']['id']), array(), __('Are you sure you want to delete # %s?', $storeProduct['StoreProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
