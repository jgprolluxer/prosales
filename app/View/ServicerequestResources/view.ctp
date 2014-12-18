<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-imac"></i><?php echo __('Ver'); ?><br>
            <small>Información de Estación de Trabajo</small>
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
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Options" data-placement="left">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li>
                        <a href="javascript:void(0)"><i class="gi gi-cloud pull-right"></i><?php echo __('Simple Action'); ?></a>
                        <a href="javascript:void(0)"><i class="gi gi-airplane pull-right"></i><?php echo __('Another action'); ?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw pull-right"></i><?php echo __('Separated Action'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <h2><?php echo __('Informacion'); ?></h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <form class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Servicio'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $this->Html->link($servicerequestResource['Servicerequest']['name'], array('controller' => 'servicerequests', 'action' => 'view', $servicerequestResource['Servicerequest']['id'])); ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Estacion de trabajo'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $this->Html->link($servicerequestResource['Resource']['name'], array('controller' => 'workstations', 'action' => 'view', $servicerequestResource['Workstation']['id'])); ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Descripción'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $servicerequestResource["ServicerequestResource"]["description"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Estado'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $servicerequestResource["ServicerequestResource"]["status"] ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-12">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="btn-group">
                            <a href="<?php echo Router::url("/ServicerequestResources/edit/" . $servicerequestResource["ServicerequestResource"]["id"] . "/") ?>" class="btn btn-warning" >
                                <?php echo __('Editar'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <!-- END User Assist Content -->
    </div>
    <!-- END Interactive Content -->
</div>
<div class="row">
    <?php //debug($workstation); ?>
</div>