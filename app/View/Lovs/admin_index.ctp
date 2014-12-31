<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-list"></i><?php echo __('ADMIN_LOV_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_LOV_INDEX_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_LOV_INDEX_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Interactive Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->AclView->link(  __('ADMIN_LOV_INDEX_BLOCK_CONTENT_BTN_ADD'),
            array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'),
            array('escape' => false, 'class' => array('btn btn-info')));
        ?>
            <div class="table-responsive">
                <table class="table" id="example-datatable">
                    <thead>
                    <tr>
                        <th><?php echo __('ID'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_STATUS'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_PARENT'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_TYPE'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_ORDERSHOW'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_VALUE'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_NAME_'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_NAME_ES_MX'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_FIELD_NAME_EN_US'); ?></th>
                        <th><?php echo __('ADMIN_LOV_INDEX_LIST_ACTIONS'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($lovs as $key => $lov)
                        {
                            ?>
                            <tr>
                                <td><?php echo $lov["Lov"]["id"]; ?></td>
                                <td><?php echo $lov["Lov"]["status"]; ?></td>
                                <td><?php echo $lov["ParentLov"]["value"] . ' ' . $lov["ParentLov"]["type"]; ?></td>
                                <td><?php echo $lov["Lov"]["type"]; ?></td>
                                <td><?php echo $lov["Lov"]["ordershow"]; ?></td>
                                <td><?php echo $lov["Lov"]["value"]; ?></td>
                                <td><?php echo $lov["Lov"]["name_"]; ?></td>
                                <td><?php echo $lov["Lov"]["name_es_MX"]; ?></td>
                                <td><?php echo $lov["Lov"]["name_en_US"]; ?></td>
                                <td>
                                <?php
                                echo $this->AclView->link(__('<i class="fa fa-eye fa-fw"></i>'), 
                                    array('plugin' => $this->params['plugin'], 'prefix' => null, 
                                        'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 
                                        'action' => 'view', $lov['Lov']['id']), 
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
    <p class="text-muted"><?php echo __('ADMIN_LOV_INDEX_BLOCK_CONTENT_FOOTER');?></p>
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