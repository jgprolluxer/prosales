<?php
echo $this->Html->css('/template_assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css');
echo $this->Html->script("/template_assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");
?>
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-user"></i><?php echo __('Editar Solicitud de Servicio'); ?><br>
            <small><?php echo __('Editar solicitud'); ?></small>
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
        <h2><?php echo __('Información Solicitud de Servicio'); ?></h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Servicerequest', array(
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
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $this->Form->input('type', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Type')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!",
                    'type' => 'select',
                    'options' => $servicerequestType
                ));
                ?>

                <?php
                echo $this->Form->input('status', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Status')),
                    'class' => 'form-control',
                    'type' => 'hidden',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Name')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('account_id', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Account id')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('description', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Description')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->input('subtype', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Subtype')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('priority', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Priority')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('severity', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Severity')),
                    'class' => 'form-control',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!"
                ));
                ?>

                <?php
                echo $this->Form->input('report_date', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Report date')),
                    'class' => 'form-control form_meridian_datetime',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!",
                    "type" => "text",
                    "data-date-format" => "yyyy-mm-dd"
                ));
                ?>

                <?php
                echo $this->Form->input('resolution_date', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Resolution date')),
                    'class' => 'form-control form_meridian_datetime',
                    'data-toggle' => "tooltip",
                    "title" => "This is a help tooltip!",
                    "type" => "text",
                    "data-date-format" => "yyyy-mm-dd"
                ));
                ?>
                <?php
                echo $this->Form->input('workstation_id', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('workstation_id')),
                    'class' => 'form-control',
                    'data-toggle' => 'tooltip',
                    'title' => 'This is a help tooltip!',
                    'readonly' => 'readonly'
                ));
                ?>

            </div>
        </div>
        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary" href="#modal-loading" data-toggle="modal" >
                    <?php echo __("Guardar"); ?>
                </button>
                <a href="<?php echo Router::url("/Servicerequests/delete/" . $this->request->data["Servicerequest"]["id"] . "/") ?>">
                    <button type="button" class="btn btn-danger" ><?php echo __('Borrar'); ?></button>
                </a>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('You can also have content that ignores toggling..'); ?></p>
    <!-- END Interactive Content -->
</div>
<!-- END User Assist Block -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".form_meridian_datetime").datetimepicker({
            format: "yyyy-mm-dd  h:ii:00",
            showMeridian: true,
            autoclose: true,
            todayBtn: true,
            pickerPosition: "top-left"
        });
    });
</script>
