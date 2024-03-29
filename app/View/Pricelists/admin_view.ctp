<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-group"></i><?php echo __('ADMIN_PRICELIST_VIEW_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_PRICELIST_VIEW_HEAD_TITLE_SMALL'); ?></small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<!-- Normal Form Block -->
<div class="block">
    <!-- Normal Form Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('ADMIN_PRICELIST_VIEW_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Pricelist', array(
            'onsubmit' => 'return false;',//////NOT SAVE READ ONLY
            'class' => 'form-horizontal',
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'between' => '<div class="col-md-8">',
                'after' => '</div>',
                'error' => array(
                    'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                ),
            )));
        ?>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_PRICELIST_VIEW_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_PRICELIST_VIEW_FORM_FIELD_NAME')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('currency', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_PRICELIST_VIEW_FORM_FIELD_CURRENCY')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('currency_symbol', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_PRICELIST_VIEW_FORM_FIELD_CURRENCY_SYMBOL')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_PRICELIST_VIEW_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <?php
                echo $this->AclView->link(__('ADMIN_PRICELIST_VIEW_BLOCK_CONTENT_BTN_GO_EDIT'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'edit', $this->request->data['Pricelist']['id']), array('escape' => false, 'class' => array('btn btn-warning')));
                ?>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('ADMIN_PRICELIST_VIEW_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<!-- END Normal Form Block -->

<!-- Block Tabs -->
<div class="block full">
    <!-- Block Tabs Title -->
    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <?php
            $painted = FALSE;
            if ($this->AclView->hasAccess(array('controller' => 'PricelistProducts', 'action' => 'jsindexadmin')))
            {
                echo '<li class="' . ($painted ? '' : 'active') . '"><a href="#tab_products">'.__('ADMIN_PRICELIST_VIEW_TAB_PRODUCTS').'</a></li>';
                $painted = TRUE;
            }
            ?>
        </ul>
    </div>
    <!-- END Block Tabs Title -->
    <!-- Tabs Content -->
    <div class="tab-content">
        <?php
        $painted = FALSE;
        if ($this->AclView->hasAccess(array('controller' => 'PricelistProducts', 'action' => 'jsindexadmin')))
        {
            echo '<div class="tab-pane ' . ($painted ? '' : 'active') . '" id="tab_products">';
            echo $this->element('Datatables/pricelist_products');
            echo '</div>';
            $painted = TRUE;
        }
        ?>
    </div>
</div>
<!-- END Tabs Content -->
<!-- END Block Tabs -->
<script type="text/javascript">
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
