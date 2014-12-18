<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-user"></i><?php echo __('Ver'); ?><br>
            <small>Informacion de Solicitud</small>
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
        <h2>Información de Solicitud</h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <form class="form-horizontal">

            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Tipo'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["type"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Estado'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["status"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Nombre'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["name"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Creado por'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["CreatedBy"]["firstname"]. " ".$servicerequest["CreatedBy"]["lastname"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Actualizado por'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["UpdatedBy"]["firstname"]. " ".$servicerequest["UpdatedBy"]["lastname"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Descripcion'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["description"] ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">        
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Responsable'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo (NULL==$servicerequest["Workstation"]["title"] ? "<label translate='NO_WORKSTATION'></label>" : $servicerequest["Workstation"]["title"]) ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Subtipo'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["subtype"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Prioridad'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["priority"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Severidad'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["severity"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Fecha de Informe'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["report_date"] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo __('Fecha de Resolucion'); ?></label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $servicerequest["Servicerequest"]["resolution_date"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <div class="btn-group btn-group-xs">
                        <a href="<?php echo Router::url("/Servicerequests/edit/" . $servicerequest["Servicerequest"]["id"] . "/") ?>">
                            <button type="button" class="btn btn-warning" ><?php echo __('Editar'); ?></button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted">You can also have content that ignores toggling..</p>
    <!-- END Interactive Content -->
</div>
<!-- END User Assist Block -->
<!-- Block Tabs -->
<div class="block full">
    <!-- Block Tabs Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#tab-servicerequestworkstations" translate="SERVICEREQUEST_AUTHORIZERS" >Service requests authorizers</a></li>
            <li><a href="#tab-servicerequestresources" translate="RESOURCES" >Resources</a></li>
            <li><a href="#tab-settings" data-toggle="tooltip" title="Settings"><i class="fa fa-cogs"></i></a></li>
        </ul>
    </div>
    <!-- END Block Tabs Title -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab-servicerequestworkstations">
                <?php echo $this->element("Datatables/servicerequestworkstations"); ?>
            </div>
            <div class="tab-pane" id="tab-servicerequestresources">
                <?php echo $this->element("Datatables/servicerequestresources"); ?>
            </div>
            <div class="tab-pane" id="tab-settings">Settings..</div>
        </div>
        <!-- END Tabs Content -->
    </div>
</div>
<!-- END Block Tabs -->
<div class="row">
    <?php //debug($servicerequest); ?>
</div>