
<?php
echo $this->Html->css('/template_assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css');
echo $this->Html->script("/template_assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js");
?>
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-user"></i><?php echo __('Editar'); ?><br>
            <small><?php echo __('Editar Perfil'); ?></small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 4); ?>
</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
<!-- END PAGE HEADER-->
<!-- User Assist Block -->
<div class="block">
    <!-- User Assist Title -->
    <div class="block-title">
        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('Información'); ?></h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'col-md-4 control-label'),
                'class' => 'span6 m-wrap',
                'between' => '<div class="col-md-6">',
                'after' => '</div>',
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block')),
        )));
        ?>
        <h4 class="sub-header"><?php echo __('Perfil'); ?></h4>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('firstname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Nombre')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                "title" => "This is a help tooltip!"
            ));
            ?>
            <?php
            echo $this->Form->input('lastname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Apellido')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                "title" => "This is a help tooltip!"
            ));
            ?>
            <?php
            echo $this->Form->input('email', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Email')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                "title" => "This is a help tooltip!"
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('shortdescription', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Titulo')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                "title" => "This is a help tooltip!"
            ));
            ?>
            <?php
            echo $this->Form->input('fulldescription', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Descripcion')),
                'class' => 'form-control',
                'type' => 'textarea'
                    //'data-toggle' => "tooltip",
                    //'title' => "This is a help tooltip!"
            ));
            ?>
            <?php
            echo $this->Form->input('group_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Grupo')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'title' => "This is a help tooltip!",
                'type' => 'hidden'
            ));
            ?>
        </div>
        <h4 class="sub-header"><?php echo __('Imagenes'); ?></h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $coverImg = (isset($this->request->data["User"]["coverimg"]) ? $this->request->data["User"]["coverimg"] : "");
                    $fileCss = "fileupload-new";
                    $otherCoverID = "target";
                    if ($coverImg != "" && $coverImg != null) {
                        $fileCss = "fileupload-exists";
                        $coverImg = '<img src="' . $coverImg . '" id="target" style="max-height: 150px;">';
                        $otherCoverID = "";
                    }
                    ?>
                    <label class="col-md-4 control-label"><?php echo __('Portada'); ?></label>
                    <div class="col-md-6">
                        <div class="fileupload <?php echo $fileCss; ?>" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img id="<?php echo $otherCoverID ; ?>" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <?php echo $coverImg; ?>
                            </div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new"><?php echo __('Seleccionar imagen'); ?></span>
                                    <span class="fileupload-exists"><?php echo __('Cambiar'); ?></span>
                                    <input type="file" name="data[User][coverimgFile]" class="default" />
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo __('Remover'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="preview-pane">
                    <div class="preview-container">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" class="jcrop-preview" alt="Preview" />
                    </div>
                </div>
            </div>
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
        <h4 class="sub-header"></h4>
        <div class="form-group form-actions">
            <div class="col-md-12">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary" href="#modal-loading" data-toggle="modal" >
                        <?php echo __("Guardar"); ?>
                    </button>
                </div>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('You can also have content that ignores toggling..'); ?></p>
    <!-- END Interactive Content -->
</div>
<!-- END User Assist Block -->