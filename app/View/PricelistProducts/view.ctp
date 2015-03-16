<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations');
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

<div class="pricelistProducts view">
<h2><?php echo __('Pricelist Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pricelist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pricelistProduct['Pricelist']['name'], array('controller' => 'pricelists', 'action' => 'view', $pricelistProduct['Pricelist']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pricelistProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $pricelistProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit Price'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['unit_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priceinpoints'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['priceinpoints']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startdt'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['startdt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enddt'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['enddt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disc Percent'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['disc_percent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disc Startdt'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['disc_startdt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disc Enddt'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['disc_enddt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maxdisc Percent'); ?></dt>
		<dd>
			<?php echo h($pricelistProduct['PricelistProduct']['maxdisc_percent']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pricelist Product'), array('action' => 'edit', $pricelistProduct['PricelistProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pricelist Product'), array('action' => 'delete', $pricelistProduct['PricelistProduct']['id']), array(), __('Are you sure you want to delete # %s?', $pricelistProduct['PricelistProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricelist Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('controller' => 'pricelists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist'), array('controller' => 'pricelists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
