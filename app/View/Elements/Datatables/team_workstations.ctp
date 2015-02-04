<div class="block-section">
    <?php
    echo $this->AclView->link(  __('ADMIN_TEAM_WORKSTATION_ELEMENT_INDEX_BTN_GO_ADD'),
    array(
        'plugin' => $this->params['plugin'], 'prefix' => null,
        'admin' => $this->params['admin'], 'controller' => 'TeamWorkstations',
        'action' => 'add'
    ),
    array('escape' => false, 'class' => array('btn btn-info'))
);
?>
</div>
<div class="table-responsive">
    <table id="dt_team_workstations" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_TEAM_WORKSTATION_INDEX_FIELD_WORKSTATION'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_TEAM_WORKSTATION_INDEX_ACTION'); ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function()
{
    var url = qualifyURL("/TeamWorkstations/jsindexadmin/<?php echo $this->request->data["Team"]["id"]; ?>/");
    /* Initialize Bootstrap Datatables Integration */
    App.datatables();

    /* Initialize Datatables */
    $('#dt_team_workstations').dataTable({
        "iDisplayLength": 8,
        "aLengthMenu": [[4, 8, 10, 20, 30, -1], [4, 8, 10, 20, 30, "All"]],
        "sAjaxSource": url,
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });

    /* Add Bootstrap classes to select and input elements added by datatables above the table */
    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    $('.dataTables_length select').addClass('form-control');
});

</script>
