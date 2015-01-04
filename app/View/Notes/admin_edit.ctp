<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-file-text-o fa-fw"></i><?php echo __('ADMIN_NOTE_EDIT_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_NOTE_EDIT_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_NOTE_EDIT_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <?php
        echo $this->Form->create('Note', array(
            'onsubmit' => '$("#modal-loading").modal("show");return true;',
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
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_NOTE_EDIT_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>      
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_NOTE_EDIT_FORM_FIELD_DESCRIPTION')),
                'class' => 'form-control',
                'type' => 'textarea'
            ));
            ?>    
            <?php
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_NOTE_EDIT_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('objectType', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Tipo de objeto')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>      
            <?php
            echo $this->Form->input('objectid', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ID de objeto')),
                'class' => 'form-control'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('ADMIN_NOTE_EDIT_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
    </div>
    <p class="text-muted"><?php echo __('ADMIN_NOTE_EDIT_BLOCK_CONTENT_FOOTER'); ?></p>
</div>