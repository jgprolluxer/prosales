<div class="block-section">
    <?php
    echo $this->AclView->link(  __('Agregar'),
    array(
        'plugin' => $this->params['plugin'], 'prefix' => null,
        'admin' => $this->params['admin'], 'controller' => 'PricelistProducts',
        'action' => 'add',
        $this->request->data['Pricelist']['id']
    ),
    array('escape' => false, 'class' => array('btn btn-info'))
);
?>
</div>
<div class="table-responsive">
    <table id="dt_product_supplies" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('UOM'); ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function()
{
    var url = qualifyURL("/ProductSupplies/jsindex/<?php echo $this->request->data['Product']['id']; ?>/");
    /* Initialize Bootstrap Datatables Integration */
    App.datatables();

    /* Initialize Datatables */
    $('#dt_product_supplies').dataTable({
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
