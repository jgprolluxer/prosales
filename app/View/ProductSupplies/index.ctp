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
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<div class="block">
    <div class="block-title">
        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('Lista de Ingredientes de Producto'); ?></h2>
    </div>
    <div class="block-content">
        <?php
        //echo $this->AclView->link(__('ACCOUNT_INDEX_BLOCK_CONTENT_BTN_ADD'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'add'), array('escape' => false, 'class' => array('btn btn-info')));
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-vcenter table-bordered" id="example-datatable">
                <thead>
                    <tr>
                        <th><?php echo __('ID'); ?></th>
                        <th><?php echo __('Nombre'); ?></th>
                        <th><?php echo __('Cantidad de Unidad de Medida'); ?></th>
                        <th><?php echo __('Ingrediente'); ?></th>
                        <th class="text-center"><?php echo __('ACCOUNT_INDEX_LIST_ACTIONS'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($productSupplies as $idx => $productSupplies) {
                        ?>

                        <tr>
                            <td><?php echo __($productSupplies['ProductSupply']['id']); ?></td>
                            <td><?php echo __($productSupplies['Product']['name']); ?></td>
                            <td><?php echo __($productSupplies['ProductSupply']['uomqty']); ?></td>
                            <td><?php echo __($productSupplies['Supply']['name'])?></td>
                            <td class="text-center">
                                <?php
                                echo $this->AclView->link(__('<i class="fa fa-eye fa-fw"></i>'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'view', $productSupplies['ProductSupply']['id']), array('escape' => false, 'class' => array('btn btn-xs btn-info')));
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
</div>
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- Load and execute javascript code used only in this page -->

<script type="text/javascript">
	$(function() {
		TablesDatatables.init();
	});
</script>