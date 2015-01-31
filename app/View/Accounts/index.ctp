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
        <h2><?php echo __('ACCOUNT_INDEX_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Interactive Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->AclView->link(__('ACCOUNT_INDEX_BLOCK_CONTENT_BTN_ADD'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'), array('escape' => false, 'class' => array('btn btn-info')));
        ?>
        <div class="table-responsive">
            <table class="table" id="example-datatable">
                <thead>
                    <tr>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_ID'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_FIRSTNAME'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_LASTNAME'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_ALIAS'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_SEX'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_BIRTHDAY'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_TEAM'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_MODE'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_FIELD_TYPE'); ?></th>
                        <th><?php echo __('ACCOUNT_INDEX_LIST_ACTIONS'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($accounts as $idx => $account) {
                        ?>

                        <tr>
                            <td><?php echo __($account['Account']['id']); ?></td>
                            <td><?php echo __($account['Account']['firstname']); ?></td>
                            <td><?php echo __($account['Account']['lastname']); ?></td>
                            <td><?php echo __($account['Account']['alias']); ?></td>
                            <td><?php echo __($account['Account']['sex']); ?></td>
                            <td><?php echo __($account['Account']['birthdate']); ?></td>
                            <td><?php echo __($account['Account']['team_id']); ?></td>
                            <td><?php echo __($account['Account']['mode']); ?></td>
                            <td><?php echo __($account['Account']['type']); ?></td>
                            <td>
                                <?php
                                echo $this->AclView->link(__('<i class="fa fa-eye fa-fw"></i>'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'view', $account['Account']['id']), array('escape' => false, 'class' => array('btn btn-xs btn-info')));
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
    <p class="text-muted"><?php echo __('ADMIN_APPMENU_INDEX_BLOCK_CONTENT_FOOTER'); ?></p>
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

<script type="text/javascript">
$(document).ready(function ()
{
        //$('#page-container').removeClass('sidebar-visible-xs');
        //$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
});
</script>