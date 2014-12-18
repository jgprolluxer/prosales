<!-- BEGIN JAVASCRIPTS -->    
<?php
echo $this->Html->script("../assets/data-tables/jquery.dataTables.js");
echo $this->Html->script("../assets/data-tables/DT_cake_bootstrap.js");
?>
<!-- END JAVASCRIPTS -->  
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->			
            <h3 class="page-title">
                <?php echo __('Flujos de trabajo'); ?>				<small>Listado de flujos de trabajo</small>
            </h3>
            <ul class="breadcrumb">       
                <li>
                    <i class="icon-home"></i>
                    <a href="#"></a> 
                </li>
                <?php echo $this->Navigation->printBacklinks($trail, 4); ?>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4></i>Flujos de Trabajo</h4>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="reload"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo __('Herramientas'); ?> <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Print</a></li>
                                <li><a id="pdf">Save as PDF</a></li>
                            <li><a id="excel">Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Id'); ?></th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Nombre'); ?></th>
                                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Objeto Relacionado'); ?></th>
                                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Progreso'); ?></th>
                                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Modificado'); ?></th>
                                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1"><?php echo __('Modificado Por'); ?></th>
                                    <th class="sorting_disabled actions" role="columnheader" rowspan="1" colspan="1"><?php echo __('Acciones'); ?></th>
                                </tr>
                            </thead>					
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<script>
    var qualifyURL = function(pathOrURL) {
        if (!(new RegExp('^(http(s)?[:]//)', 'i')).test(pathOrURL)) {

            return baseAppPath + pathOrURL;
        }
        return pathOrURL;
    };

    $("#excel").click(function() {
        var value = $("#sample_1_filter").find('.m-wrap').val();
        window.location = qualifyURL("/TaskflowInstances/excel/0/" + value);

    });

    $("#pdf").click(function() {
        var value = $("#sample_1_filter").find('.m-wrap').val();
        window.location = qualifyURL("/TaskflowInstances/pdf/0/" + value);
    });
</script>
