<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-log_book"></i><?php echo __('Solicitud de Autorizacion'); ?><br>
            <!--<small><?php //echo __('Listado de Solicitudes'); ?></small>-->
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 4); ?>
</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
<!-- END PAGE HEADER-->
<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
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
        <h2><?php echo __('Solicitud de Autorizaciones'); ?></h2>
    </div>
    <!-- END Interactive Title -->

    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <div class="block-section">
            <a href="<?php echo Router::url("/RequestApprovals/add/"); ?>" role="button" class="btn btn-primary" data-toggle="modal"><?php echo __('Agregar Solicitud'); ?></a>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo __('ID'); ?></th>
                        <th class="text-center"><?php echo __('Nombre'); ?></th>
                        <th class="text-center"><?php echo __('Estado'); ?></th>
                        <th class="text-center"><?php echo __('Descripcion'); ?></th>
                        <th class="text-center"><?php echo __('Acciones'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($requestApprovals)) {

                        foreach ($requestApprovals as $requestApproval) {
                            ?>
                    <tr>
                        <td class="text-center" ><?php echo $requestApproval["RequestApproval"]["id"]; ?></td>
                        <td class="text-center" ><?php echo $requestApproval["RequestApproval"]["title"]; ?></td>
                        <td class="text-center" ><?php echo $requestApproval["RequestApproval"]["status"]; ?></td>
                        <td class="text-center" ><?php echo $requestApproval["RequestApproval"]["description"]; ?></td>
                        <!--<td class="text-center" ><?php //echo $requestApproval["RequestApproval"]["servicerequest_id"]; ?></td>-->
                        <td class="text-center" >
                            <div class="btn-group btn-group-xs">
                                <a href="<?php echo Router::url("/RequestApprovals/view/" . $requestApproval["RequestApproval"]["id"] . "/"); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <p class="text-muted"><?php echo __('You can also have content that ignores toggling..'); ?></p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->

<!-- Load and execute javascript code used only in this page -->
<!-- BEGIN VIEW SPECIFIC CSS -->
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- Load and execute javascript code used only in this page -->

<script>
    $(function() {
        TablesDatatables.init();
    });
</script>
<!-- END VIEW SPECIFIC JAVASCRIPTS -->