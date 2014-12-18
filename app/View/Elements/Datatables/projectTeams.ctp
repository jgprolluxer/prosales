<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
    <div class="block-title">
        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
        <div class="block-options pull-right">
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
        <h2><?php echo __('Equipos de trabajo'); ?></h2>
    </div>
    <!-- END Interactive Title -->

    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <div class="block-section">
            <a href="<?php echo Router::url("/ProjectTeams/add/".$project["Project"]["id"]); ?>" class="btn btn-success">
                <?php echo __('Agregar equipo'); ?>
            </a>
        </div>
        <div class="table-responsive">
            <table id="dt_projectTeams" class="table table-vcenter table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo __('ID'); ?></th>
                        <th class="text-center"><?php echo __('Proyecto'); ?></th>
                        <th class="text-center"><?php echo __('Equipo'); ?></th>
                        <th class="text-center"><?php echo __('Actualizado por'); ?></th>
                        <th class="text-center"><?php echo __('Acciones'); ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <p class="text-muted"></p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->

<script>
    $(document).ready(function() {
        var url = qualifyURL("/ProjectTeams/jsindex/<?php echo $project['Project']['id']; ?>/");
        /* Initialize Bootstrap Datatables Integration */
        App.datatables();
        
        /* Initialize Datatables */
        $('#dt_projectTeams').dataTable({
            "iDisplayLength": 8,
            "aLengthMenu": [[4, 8, 10, 20, 30, -1], [4, 8, 10, 20, 30, "All"]],
            "sAjaxSource": url
        });

        /* Add Bootstrap classes to select and input elements added by datatables above the table */
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
        $('.dataTables_length select').addClass('form-control');
    });

</script>
