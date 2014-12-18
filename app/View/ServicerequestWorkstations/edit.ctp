<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-imac"></i><?php echo __('Editar'); ?><br>
            <small><?php echo __('Editar relacion de estacion de trabajo a solicitud de servicio'); ?></small>
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
        <h2><?php echo __('Editar'); ?></h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('ServicerequestWorkstation', array(
            'class' => 'form-horizontal',
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'col-md-4 control-label'),
                'class' => 'span6 m-wrap',
                'between' => '<div class="col-md-6">',
                'after' => '</div>',
                'error' => array(
                    'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                ),
        )));
        ?>
            <?php
            echo $this->Form->input('servicerequest_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Solicitud')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'required' => true,
                "title" => "Introduzca nombre de estación de trabajo",
                'type' =>'hidden',
                'readonly' =>'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('servicerequest_name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Solicitud')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'required' => true,
                "title" => "Introduzca nombre de estación de trabajo",
                'type' =>'text',
                'readonly' =>'readonly',
                'value' => $this->request->data["Servicerequest"]["name"]
            ));
            ?>
            <?php
            echo $this->Form->input('workstation_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Estacion de trabajo')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'required' => true,
                "title" => "Introduzca rol de equipo de trabajo"
            ));
            ?>
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Descripción')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'required' => true,
                "title" => "Introduzca descripción del equipo de trabajo",
                'type' => 'textarea'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('status')),
                'class' => 'form-control',
                'data-toggle' => 'tooltip',
                'title' => 'This is a help tooltip!',
                'type' => 'hidden',
                'readonly' => 'readonly',
                'value' => StatusOfServicerequestWorkstation::Active
            ));
            ?>
        <div class="form-group form-actions">
            <div class="col-md-12">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary" href="#modal-loading" data-toggle="modal" ><?php echo __("Guardar"); ?></button>
                    <a href="<?php echo Router::url("/ServicerequestWorkstations/delete/" . $this->request->data["ServicerequestWorkstation"]["id"] . "/") ?>" class="btn btn-danger">
                        <?php echo __('Borrar'); ?>
                    </a>
                </div>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <!-- END Interactive Content -->
</div>
<!-- END User Assist Block -->