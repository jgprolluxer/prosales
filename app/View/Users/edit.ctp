<?php
echo $this->Html->css('/template_assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css');
echo $this->Html->script("/template_assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js");
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-user fa-fw"></i><?php echo __('USER_EDIT_HEAD_TITLE'); ?><br><small><?php echo __('USER_EDIT_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('USER_EDIT_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <?php
        echo $this->Form->create('User', array(
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
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_VIEW_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('firstname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Nombre')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('lastname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Apellido')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('email', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('email')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('workstation', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Puesto de trabajo')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $workstations
            ));
            ?>
            <?php
            echo $this->Form->input('group', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Grupo')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $groups
            ));
            ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $coverImg = (isset($this->request->data["User"]["avatar"]) ? $this->request->data["User"]["avatar"] : "");
                    $fileCss = "fileupload-new";
                    if ($coverImg != "" && $coverImg != null) {
                        $fileCss = "fileupload-exists";
                        $coverImg = '<img src="' . $coverImg . '" style="max-height: 150px;">';
                    }
                    ?>
                    <label class="col-md-4 control-label"><?php echo __('Avatar'); ?></label>
                    <div class="col-md-6">
                        <div class="fileupload <?php echo $fileCss; ?>" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <?php echo $coverImg; ?>
                            </div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new"><?php echo __('Seleccionar imagen'); ?></span>
                                    <span class="fileupload-exists"><?php echo __('Cambiar'); ?></span>
                                    <input type="file" name="data[User][avatarFile]" class="default" />
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo __('Remover'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('Guardar'); ?></button>
            </div>
        </div>
    </div>
    <p class="text-muted"><?php echo __('USER_EDIT_BLOCK_CONTENT_FOOTER'); ?></p>
</div>