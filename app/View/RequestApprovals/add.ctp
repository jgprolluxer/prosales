<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-log_book"></i><?php echo __('Agregar'); ?><br>
            <small><?php echo __('Agregar Solicitud de Autorizacion'); ?></small>
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
        <h2><?php echo __('Agregar'); ?></h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('RequestApproval', array(
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
        echo $this->Form->input('title', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Nombre')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca nombre"
        ));
        ?>
                <?php
        echo $this->Form->input('description', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Descripcion')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca descripcion"
        ));
        ?>
                <?php
        echo $this->Form->input('status', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Estado')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca estado"
        ));
        ?>
                <?php
        echo $this->Form->input('sequence', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Secuencia')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca secuencia"
        ));
        ?>
                <?php
        echo $this->Form->input('workstation_id', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Estacion de Trabajo')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca estacion de trabajo"
        ));
        ?>
                <?php
        echo $this->Form->input('servicerequest_id', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Solicitud de Servicio')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca Solicitud de servicio"
        ));
        ?>
               <?php
//        echo $this->Form->input('created_by', array(
//          'label' => array('class' => 'col-md-4 control-label', 'text' => __('Solicitado por')),
//          'class' => 'form-control',
//          'data-toggle'=>"tooltip",
//          'required' => true,
//          "title" => "Introduzca el campo"
// ));
        ?> 
                <?php
        echo $this->Form->input('created', array(
            'label' => array('class' => 'col-md-4 control-label', 'text' => __('Fecha de Creacion')),
            'class' => 'form-control',
            'data-toggle'=>"tooltip",
            'required' => true,
            "title" => "Introduzca Fecha de creacion"
        ));
        ?>        

        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary" href="#modal-loading" data-toggle="modal" ><?php echo __("Guardar"); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <!-- END Interactive Content -->
</div>
<!-- END User Assist Block -->