<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-parents"></i><?php echo __('Agregar'); ?><br>
            <small><?php echo __('Agregar Nivel'); ?></small>
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
        echo $this->Form->create('ResourceLevel', array(
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

        <div class="col-md-6">
            <?php
            echo $this->Form->input('resource_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('resource_id')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'title' => 'This is a help tooltip!',
                'type' => 'hidden',
                'readonly' => 'readonly',
                'value' => $resource["Resource"]["id"]
            ));
            ?>
            <?php
            echo $this->Form->input('workstation_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('workstation_id')),
                'class' => 'form-control',
                'data-toggle' => 'tooltip',
                'title' => 'This is a help tooltip!',
                'type' => 'hidden',
                'readonly' => 'readonly'
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
                'value' => StatusOfResourceLevels::Active
            ));
            ?>
            <?php
            echo $this->Form->input('elresourcename', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Recurso')),
                'class' => 'form-control',
                'data-toggle' => 'tooltip',
                'title' => 'This is a help tooltip!',
                'type' => 'text',
                'readonly' => 'readonly',
                'value' => $resource["Resource"]["name"]
            ));
            ?>
            <?php
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('title')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'title' => 'This is a help tooltip!',
                'type' => 'text',
            ));
            ?>
            <?php
            echo $this->Form->input('sequence', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('sequence')),
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'title' => 'This is a help tooltip!'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('elworkstationname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Puesto de trabajo')),
                'after' => '<span>&nbsp;&nbsp;<a href="#asociateWorkstationModal" role="button" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i></a></span></div>',
                'class' => 'form-control',
                'data-toggle' => "tooltip",
                'readonly' => 'readonly',
                'title' => 'This is a help tooltip!',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('description')),
                'class' => 'form-control',
                'data-toggle' => 'tooltip',
                'title' => 'This is a help tooltip!',
                'type' => 'textarea'
            ));
            ?>
        </div>

        <div class="form-group form-actions">
            <div class="col-md-12">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary" href="#modal-loading" data-toggle="modal" ><?php echo __("Guardar"); ?></button>
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

<?php
echo $this->App->drawAssociateWorkstationModal();
?>
<script type="text/javascript" >
    function asociateObject(objID) {
        console.log('el id :: ' + objID);
        $('#ResourceLevelWorkstationId').val(objID);
        $('#asociateWorkstationModal').modal('hide');
        $.ajax({
            url: qualifyURL("/Workstations/jsfindWorkstation/"),
            dataType: "json",
            data: {
                'workstationid': objID,
                'strquery': ''
            },
            success: function(data) {
                console.log(data);
                for(obj in data){
                    console.log(obj);
                    $('#ResourceLevelElworkstationname').val(data[obj]);
                }
            }
        });
        
    }
</script>