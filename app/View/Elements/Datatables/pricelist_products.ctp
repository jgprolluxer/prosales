<div class="block-section">
    <?php
    echo $this->AclView->link(  __('ADMIN_PRICELIST_PRODUCT_ELEMENT_INDEX_BTN_GO_ADD'),
    array(
        'plugin' => $this->params['plugin'], 'prefix' => null,
        'admin' => $this->params['admin'], 'controller' => 'PricelistProducts',
        'action' => 'add'
    ),
    array('escape' => false, 'class' => array('btn btn-info'))
);
?>
</div>
<div class="table-responsive">
    <table id="dt_pricelist_products" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_PRICELIST_PRODUCT_INDEX_FIELD_PRODUCT'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_PRICELIST_PRODUCT_INDEX_FIELD_STARTDT'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_PRICELIST_PRODUCT_INDEX_FIELD_ENDDT'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_PRICELIST_PRODUCT_INDEX_FIELD_TAX'); ?></th>
                <th><?php echo __('ADMIN_ELEMENT_PRICELIST_PRODUCT_INDEX_ACTION'); ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function()
{
    var url = qualifyURL("/PricelistProducts/jsindexadmin/<?php echo $this->request->data["Pricelist"]["id"]; ?>/");
    /* Initialize Bootstrap Datatables Integration */
    App.datatables();

    /* Initialize Datatables */
    $('#dt_pricelist_products').dataTable({
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
