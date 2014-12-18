<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="hi hi-trash"></i><?php echo __('Archivo'); ?><br>
            <small>Historial de registros eliminados</small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 4); ?>
</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
<!-- END PAGE HEADER-->
<!-- Block Tabs -->
<div class="block full">
    <!-- Block Tabs Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#tab-workstations"><i class="gi gi-imac"></i><?php echo __(' Estaciones de trabajo'); ?></a></li>
            <li><a href="#tab-workareas" data-toggle="tooltip"><i class="gi gi-building"></i><?php echo __(' Departamentos'); ?></a></li>
            <li><a href="#tab-projects" data-toggle="tooltip"><i class="gi gi-briefcase"></i><?php echo __(' Proyectos'); ?></a></li>
            <li><a href="#tab-servicerequest" data-toggle="tooltip"><i class="gi gi-paperclip"></i><?php echo __(' Solicitudes de Servicio'); ?></a></li>
            <li><a href="#tab-resource" data-toggle="tooltip"><i class="gi gi-cargo"></i><?php echo __(' Recursos'); ?></a></li>
        </ul>
    </div>
    <!-- END Block Tabs Title -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab-workstations">
                <?php echo $this->element("Datatables/archive_workstation"); ?>
            </div>
            <div class="tab-pane" id="tab-workareas">
                <?php echo $this->element("Datatables/archive_workarea"); ?>
            </div>
            <div class="tab-pane" id="tab-projects">
                <?php echo $this->element("Datatables/archive_project"); ?>
            </div>
            <div class="tab-pane" id="tab-servicerequest">
                <?php echo $this->element("Datatables/archive_servicerequest"); ?>
            </div>
            <div class="tab-pane" id="tab-resource">
                <?php echo $this->element("Datatables/archive_resource"); ?>
            </div>
        </div>
        <!-- END Tabs Content -->
    </div>
</div>
<!-- END Block Tabs -->