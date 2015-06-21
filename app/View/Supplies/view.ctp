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
<div class="supplies view">
<h2><?php echo __('Supply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uom'); ?></dt>
		<dd>
			<?php echo h($supply['Supply']['uom']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supply'), array('action' => 'edit', $supply['Supply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supply'), array('action' => 'delete', $supply['Supply']['id']), array(), __('Are you sure you want to delete # %s?', $supply['Supply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supply'), array('action' => 'add')); ?> </li>
	</ul>
</div>
