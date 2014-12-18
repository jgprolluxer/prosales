<!-- BEGIN PAGE HEADER-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-imac"></i>Ver<br>
            <small>Información de Estación de Trabajo</small>
        </h1>
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN BREADCRUMB-->
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 4); ?>
</ul>
<!-- END BREADCRUMB-->
<div class="block">
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><strong>Interactive</strong> Block</h2>
    </div>
    <div class="block-content">
        <form class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __('Servicio'); ?></label>
                    <div class="col-md-8">
                        <p class="form-control-static"><?php echo $this->Html->link($servicerequestWorkstation['Servicerequest']['name'], array('controller' => 'servicerequests', 'action' => 'view', $servicerequestWorkstation['Servicerequest']['id'])); ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __('Estacion de trabajo'); ?></label>
                    <div class="col-md-8">
                        <p class="form-control-static"><?php echo $this->Html->link($servicerequestWorkstation['Workstation']['title'], array('controller' => 'workstations', 'action' => 'view', $servicerequestWorkstation['Workstation']['id'])); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __('Descripción'); ?></label>
                    <div class="col-md-8">
                        <p class="form-control-static"><?php echo $servicerequestWorkstation["ServicerequestWorkstation"]["description"] ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <a href="<?php echo Router::url("/ServicerequestWorkstations/edit/" . $servicerequestWorkstation["ServicerequestWorkstation"]["id"] . "/") ?>" class="btn btn-warning" >
                        <?php echo __('Editar'); ?>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <p class="text-muted">You can also have content that ignores toggling..</p>
</div>