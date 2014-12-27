<!-- Forms General Header -->
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="gi gi-pipe"></i><?php echo __('ADMIN_TEAM_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_TEAM_INDEX_HEAD_TITLE_SMALL'); ?></small>
		</h1>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<!-- Interactive Block -->
<div class="block">
	<!-- Interactive Title -->
	<div class="block-title">
		<!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
		<div class="block-options pull-right">
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
		</div>
		<h2><?php echo __('ADMIN_TEAM_INDEX_BLOCK_TITLE'); ?></h2>
	</div>
	<!-- END Interactive Title -->
	<!-- Interactive Content -->
	<!-- The content you will put inside div.block-content, will be toggled -->
	<div class="block-content">
		<?php
		echo $this->AclView->link(  __('ADMIN_TEAM_INDEX_BLOCK_CONTENT_BTN_ADD'),
			array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'),
			array('escape' => false, 'class' => array('btn btn-info')));
		?>
			<div class="table-responsive">
				<table class="table" id="example-datatable">
					<thead>
					<tr>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_ID'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_PARENT'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_ORDER'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_KEY'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_TYPE'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_NAME'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_FIELD_TITLE'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_URL'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_CONTROLLER'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_ACTION'); ?></th>
						<th><?php echo __('ADMIN_TEAM_INDEX_LIST_ACTIONS'); ?></th>
					</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $teams as $idx => $team )
						{
							?>
							<tr>
							<td><?php echo __($team['Appmenu']['id']); ?></td>
							<td><?php echo __($team['Owner']['title']); ?></td>
							<td><?php echo __($team['Appmenu']['ordershow']); ?></td>
							<td><?php echo __($team['Appmenu']['mkey']); ?></td>
							<td><?php echo __($team['Appmenu']['type']); ?></td>
							<td><?php echo __($team['Appmenu']['mname']); ?></td>
							<td><?php echo __($team['Appmenu']['title']); ?></td>
							<td><?php echo __($team['Appmenu']['url']); ?></td>
							<td><?php echo __($team['Appmenu']['controller']); ?></td>
							<td><?php echo __($team['Appmenu']['action']); ?></td>
							<td>
							<?php
							echo $this->AclView->link(  __('<i class="fa fa-eye fa-fw"></i>'),
								array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'view', $appmenu['Appmenu']['id']),
								array('escape' => false, 'class' => array('btn btn-xs btn-info')));
							?>
							</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
	</div>
	<p class="text-muted"><?php echo __('ADMIN_TEAM_INDEX_BLOCK_CONTENT_FOOTER');?></p>
	<!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->
<!-- Load and execute javascript code used only in this page -->
<!-- BEGIN VIEW SPECIFIC CSS -->
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- Load and execute javascript code used only in this page -->

<script type="text/javascript">
	$(function() {
		TablesDatatables.init();
	});
</script>

<div class="teams index">
	<h2><?php echo __('Teams'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_id'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($teams as $team): ?>
	<tr>
		<td><?php echo h($team['Team']['id']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['updated']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['created']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($team['Owner']['title'], array('controller' => 'workstations', 'action' => 'view', $team['Owner']['id'])); ?>
		</td>
		<td><?php echo h($team['Team']['alias']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $team['Team']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $team['Team']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $team['Team']['id']), array(), __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Workstations'), array('controller' => 'team_workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Workstation'), array('controller' => 'team_workstations', 'action' => 'add')); ?> </li>
	</ul>
</div>
