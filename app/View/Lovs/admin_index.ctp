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
        <section data-ng-controller="adminLovsIndexController">
            <div class="table-responsive">
                <table class="table" datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" >
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
                    <tr ng-repeat="lov in lovs">
                        <td>{{lov.Lov.id}}</td>
                        <td><label translate="{{lov.Lov.status}}"></label></td>
                        <td>{{lov.ParentLov.value}} - {{lov.ParentLov.type}}</td>
                        <td>{{lov.Lov.type}}</td>
                        <td>{{lov.Lov.ordershow}}</td>
                        <td>{{lov.Lov.value}}</td>
                        <td>{{lov.Lov.name_}}</td>
                        <td>{{lov.Lov.name_es_MX}}</td>
                        <td>{{lov.Lov.name_en_US}}</td>
                        <td>
                            <a href="<?php echo Router::url(($this->params['admin']?'/admin/':'/').$this->params['controller'].'/view/'); ?>{{lov.Lov.id}}" class="btn btn-info btn-xs">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
    <p class="text-muted"><?php echo __('ADMIN_LOV_INDEX_BLOCK_CONTENT_FOOTER');?></p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->