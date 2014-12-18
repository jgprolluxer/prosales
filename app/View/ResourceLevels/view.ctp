<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-user"></i><?php echo __('Ver'); ?><br>
            <small>Ver Usuario</small>
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
        <h2>Información del usuario</h2>
    </div>
    <!-- END User Assist Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- User Assist Content -->
        <form class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Titulo'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $resourceLevel['ResourceLevel']['title']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Descripción'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $resourceLevel['ResourceLevel']['description']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Secuencia'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $resourceLevel['ResourceLevel']['sequence']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Puesto de trabajo'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $resourceLevel['Workstation']['title']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Recurso'); ?></label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $resourceLevel['Resource']['name']; ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-12">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="btn-group">
                            <a href="<?php echo Router::url("/ResourceLevels/edit/" . $resourceLevel['ResourceLevel']["id"] . "/") ?>" class="btn btn-warning">
                                <?php echo __('Editar'); ?>
                            </a>
                        </div>
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