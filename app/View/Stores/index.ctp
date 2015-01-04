<!-- END Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-building"></i><?php echo __('STORE_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('STORE_INDEX_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('STORE_INDEX_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Interactive Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->AclView->link(  __('STORE_INDEX_BLOCK_CONTENT_BTN_ADD'),
            array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'),
            array('escape' => false, 'class' => array('btn btn-info')));
        ?>
            <div class="table-responsive">
                <table class="table" id="example-datatable" >
                    <thead>
                    <tr>
                        <th><?php echo __('ID'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_OWNER'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_NAME'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_TAXNUMBER'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_BILLNAME'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_ALIAS'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_FIELD_STATUS'); ?></th>
                        <th><?php echo __('STORE_INDEX_LIST_ACTIONS'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stores as $key => $store)
                        {
                            ?>
                            <tr>
                                <td><?php echo $store["Store"]["id"]; ?></td>
                                <td><?php echo isset($store["Owner"]["User"][0]["id"]) ? $store["Owner"]["title"] . ' ' . $store["Owner"]["employeenumber"] . ' - ' . $store["Owner"]["User"][0]["firstname"] . ' ' . $store["Owner"]["User"][0]["lastname"] : $store["Owner"]["title"] . ' - ' . $store["Owner"]["employeenumber"] ; ?></td>
                                <td><?php echo $store["Store"]["name"]; ?></td>
                                <td><?php echo $store["Store"]["billing_rfc"]; ?></td>
                                <td><?php echo $store["Store"]["billing_name"]; ?></td>
                                <td><?php echo $store["Store"]["alias"]; ?></td>
                                <td><?php echo __($store["Store"]["status"]); ?></td>
                                <td>
                                <?php
                                echo $this->AclView->link(  __('<i class="fa fa-eye fa-fw"></i>'),
                                    array(
                                        'plugin' => $this->params['plugin'], 
                                        'prefix' => null, 
                                        'admin' => $this->params['admin'], 
                                        'controller' => $this->params['controller'], 
                                        'action' => 'view', $store['Store']['id']
                                    ),
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
    <p class="text-muted"><?php echo __('STORE_INDEX_BLOCK_CONTENT_FOOTER');?></p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->