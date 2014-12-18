<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-pipe"></i><?php echo __('WORKSTATION_VIEW_HEAD_TITLE'); ?><br><small><?php echo __('WORKSTATION_VIEW_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('WORKSTATION_VIEW_BLOCK_TITLE');?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Workstation', array(
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
            echo $this->Form->input('parent_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_PARENT')),
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->request->data["ParentWorkstation"]["title"],
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('role', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_ROLE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'text',
                'value' => __($this->request->data["Workstation"]["status"]),
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('workarea', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_WORKAREA')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('store_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_STORE')),
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->request->data["Store"]["name"],
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('pricelist_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_PRICELIST')),
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->request->data["Pricelist"]["name"],
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('WORKSTATION_VIEW_FORM_FIELD_DESCRIPTION')),
                'class' => 'form-control',
                'type' => 'textarea',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('WORKSTATION_VIEW_BLOCK_CONTENT_FOOTER');?></p>
</div>
<!-- END Normal Form Block -->