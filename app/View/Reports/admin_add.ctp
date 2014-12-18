<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-grater"></i><?php echo __('ADMIN_REPORT_ADD_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_REPORT_ADD_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_REPORT_ADD_BLOCK_TITLE');?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Report', array(
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
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('rkey', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_KEY')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovReportRKey
            ));
            ?>
            <?php
            echo $this->Form->input('type', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_TYPE')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovReportType
            ));
            ?>
            <?php
            echo $this->Form->input('category', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_CATEGORY')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovReportCategory
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovReportStatus
            ));
            ?>
            <?php
            echo $this->Form->input('modelName', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_MODEL')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $models
            ));
            ?>
            <?php
            echo $this->Form->input('findType', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_FINDTYPE')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovReportFindType
            ));
            ?>
            <?php
            echo $this->Form->input('recursive', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_RECURSIVE')),
                'class' => 'form-control',
                'type' => 'number'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary"><?php echo __('ADMIN_REPORT_ADD_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('ADMIN_REPORT_ADD_BLOCK_CONTENT_FOOTER');?></p>
</div>
<!-- END Normal Form Block -->