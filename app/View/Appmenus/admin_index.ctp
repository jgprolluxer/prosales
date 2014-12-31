<!-- Forms General Header -->
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="fa fa-bars fa-fw"></i><?php echo __('ADMIN_APPMENU_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_APPMENU_INDEX_HEAD_TITLE_SMALL'); ?></small>
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
		<h2><?php echo __('ADMIN_APPMENU_INDEX_BLOCK_TITLE'); ?></h2>
	</div>
	<!-- END Interactive Title -->
	<!-- Interactive Content -->
	<!-- The content you will put inside div.block-content, will be toggled -->
	<div class="block-content">
		<?php
		echo $this->AclView->link(  __('ADMIN_APPMENU_INDEX_BLOCK_CONTENT_BTN_ADD'),
			array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'),
			array('escape' => false, 'class' => array('btn btn-info')));
		?>
			<div class="table-responsive">
				<table class="table" id="example-datatable">
					<thead>
					<tr>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_ID'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_PARENT'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_ORDER'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_KEY'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_TYPE'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_NAME'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_FIELD_TITLE'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_URL'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_CONTROLLER'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_ACTION'); ?></th>
						<th><?php echo __('ADMIN_APPMENU_INDEX_LIST_ACTIONS'); ?></th>
					</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $appmenus as $idx => $appmenu )
						{
							?>
							<tr>
							<td><?php echo __($appmenu['Appmenu']['id']); ?></td>
							<td><?php echo __($appmenu['ParentAppmenu']['mname']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['ordershow']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['mkey']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['type']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['mname']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['title']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['url']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['controller']); ?></td>
							<td><?php echo __($appmenu['Appmenu']['action']); ?></td>
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
	<p class="text-muted"><?php echo __('ADMIN_APPMENU_INDEX_BLOCK_CONTENT_FOOTER');?></p>
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