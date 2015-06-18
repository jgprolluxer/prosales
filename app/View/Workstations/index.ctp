<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations footer-fixed');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos'); ?>
    </div>
</div>
<!-- END eCommerce Order View Header -->

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
    <div class="block-title">
        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('WORKSTATION_INDEX_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Interactive Title -->
    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->AclView->link(__('WORKSTATION_INDEX_BLOCK_CONTENT_BTN_ADD'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'), array('escape' => false, 'class' => array('btn btn-info')));
        ?>
            <div class="table-responsive">
                <table class="table" id="example-datatable">
                    <thead>
                        <tr>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_PARENT'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_TITLE'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_EMPLOYEENUMBER'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_ROLE'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_STATUS'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_WORKAREA'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_STORE'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_FIELD_PRICELIST'); ?></th>
                        <th><?php echo __('WORKSTATION_INDEX_LIST_ACTIONS'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($workstations as $key => $workstation)
                        {
                            ?>
                            <tr>
                                <td><?php echo __($workstation["ParentWorkstation"]["title"]); ?></td>
                                <td><?php echo __($workstation["Workstation"]["title"]); ?></td>
                                <td><?php echo __($workstation["Workstation"]["employeenumber"]); ?></td>
                                <td><?php echo __($workstation["Workstation"]["role"]); ?></td>
                                <td><?php echo __($workstation["Workstation"]["status"]); ?></td>
                                <td><?php echo __($workstation["Workstation"]["workarea"]); ?></td>
                                <td><?php echo __($workstation["Store"]["name"]); ?></td>
                                <td><?php echo __($workstation["Pricelist"]["name"]); ?></td>
                                <td>
                                <?php
                                echo $this->AclView->link(  __('<i class="fa fa-eye fa-fw"></i>'),
                                    array(
                                        'plugin' => $this->params['plugin'], 
                                        'prefix' => null, 
                                        'admin' => $this->params['admin'], 
                                        'controller' => $this->params['controller'], 
                                        'action' => 'view', $workstation['Workstation']['id']
                                    ),
                                    array('escape' => false, 'class' => array('btn btn-xs btn-info')));
                                ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
    <p class="text-muted"><?php echo __('WORKSTATION_INDEX_BLOCK_CONTENT_FOOTER'); ?></p>
    <!-- END Interactive Content -->
    <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['orgchart']}]}"></script>

    <div class="jumbotron" style="overflow-x:auto; overflow-y:auto;">
        <div id="chart_div"></div>
    </div>
</div>
<!-- END Interactive Block -->
<!-- Load and execute javascript code used only in this page -->
<!-- BEGIN VIEW SPECIFIC CSS -->
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- Load and execute javascript code used only in this page -->
<script type="text/javascript">
    $(function()
    {
        TablesDatatables.init();
    });

function drawChart()
{
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');

    var jsonOBJ = <?php echo json_encode($treeObj); ?>;
//console.log(jsonOBJ);

    data.addRows(jsonOBJ);
    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    chart.draw(data, {allowHtml: true});

// Every time the table fires the "select" event, it should call your
// selectHandler() function.
    google.visualization.events.addListener(chart, 'select', selectHandler);

    function selectHandler(e) {
        var selection = chart.getSelection();
        var selected = '';
        for (var i = 0; i < selection.length; i++) {
            var item = selection[i];
            if (item.row != null && item.column != null) {
                //var str = data.getFormattedValue(item.row, item.column);
                var str = data.getValue(item.row, item.column);
                selected += str;
            } else if (item.row != null) {
                //var str = data.getFormattedValue(item.row, 0);
                var str = data.getValue(item.row, 0);
                selected += str;
            } else if (item.column != null) {
                //var str = data.getFormattedValue(0, item.column);
                var str = data.getValue(0, item.column);
                selected += str;
            }
        }
        if (selected != '') {
            window.location.href = qualifyURL("/Workstations/view/" + selected);
        } else
        {
            $(function () {
                $.bootstrapGrowl('<label translate="NO_VALUE_SELECTED"></label>', {
                    type: 'warning',
                    delay: 2500,
                    allow_dismiss: true
                });
            });
        }

    }
}
;
google.setOnLoadCallback(drawChart);

</script>