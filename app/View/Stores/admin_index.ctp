<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-building"></i><?php echo __('ADMIN_STORE_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_STORE_INDEX_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_STORE_INDEX_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Interactive Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->AclView->link(  __('ADMIN_STORE_INDEX_BLOCK_CONTENT_BTN_ADD'),
            array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'),
            array('escape' => false, 'class' => array('btn btn-info')));
        ?>
        <section data-ng-controller="adminStoresIndexController">
            <div class="table-responsive">
                <table class="table" datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" >
                    <thead>
                    <tr>
                        <th><?php echo __('ID'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_OWNER'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_NAME'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_TAXNUMBER'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_BILLNAME'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_ALIAS'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_FIELD_STATUS'); ?></th>
                        <th><?php echo __('ADMIN_STORE_INDEX_LIST_ACTIONS'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="store in stores">
                        <td>{{store.Store.id}}</td>
                        <td>{{store.Owner.id}}</td>
                        <td>{{store.Store.name}}</td>
                        <td>{{store.Store.billing_rfc}}</td>
                        <td>{{store.Store.billing_name}}</td>
                        <td>{{store.Store.alias}}</td>
                        <td><label translate="{{store.Store.status}}"></label></td>
                        <td>
                            <a href="<?php echo Router::url(($this->params['admin']?'/admin/':'/').$this->params['controller'].'/view/'); ?>{{store.Store.id}}" class="btn btn-info btn-xs">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
    <p class="text-muted"><?php echo __('ADMIN_STORE_INDEX_BLOCK_CONTENT_FOOTER');?></p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->