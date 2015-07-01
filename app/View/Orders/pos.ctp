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
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
    </div>
</div>
<!-- END eCommerce Order View Header -->
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<section ng-controller="OrderPOSController" ng-init="init(<?php echo $id; ?>)">
    
    <!-- Customer Content -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="gi gi-shopping_cart"></i>&nbsp;<?php echo __('Venta'); ?></h2>
                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <h3>{{order.Order.folio}}</h3>
                </div>
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-right" ><?php echo __('Creada el'); ?></td>
                            <td>{{order.Order.created}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><?php echo __('Creada por'); ?></td>
                            <td>{{order.CreatedBy.firstname}}&nbsp;{{order.CreatedBy.lastname}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><?php echo __('Estado'); ?></td>
                            <td>{{order.Order.status}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="javascript:void(0);" class="btn btn-xs btn-danger" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' ">
                                    <?php echo __('Cancelar'); ?>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-xs btn-success" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " >
                                    <?php echo __('Cerrar'); ?>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-xs btn-info" ng-disabled=" order.Order.status == 'cancelled' ||  order.Order.status == 'open' " >
                                    <?php echo __('Imprimir ticket'); ?>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
            <!-- END Customer Info Block -->
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="gi gi-user"></i>&nbsp;<?php echo __('Cliente'); ?></h2>
                </div>
                <!-- END Customer Info Title -->
                <div class="block-section text-center">
                    <input type="text" class="form-control" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " ng-model="selectedAccount" data-animation="am-flip-x"  bs-options="account.Account.firstname + ' ' + account.Account.lastname for account in accounts" placeholder="<?php echo __('Buscar cliente'); ?>" bs-typeahead>
                </div>
                <section ng-if="order.Account.id">
                    <!-- Customer Info -->
                    <div class="block-section text-center">
                        <h3>{{order.Account.firstname}}&nbsp;{{order.Account.lastname}}</h3>
                    </div>
                    <table class="table table-borderless table-striped table-vcenter">
                        <tbody ng-if="order.Account.id">
                            <tr>
                                <td class="text-right">
                                    <?php echo __('Cliente desde'); ?>
                                </td>
                                <td>{{order.Account.created}}</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Last Visit</strong></td>
                                <td>06/11/2014 - 09:41</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Language</strong></td>
                                <td>English (UK)</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Registrations</strong></td>
                                <td><span class="label label-primary">Newsletter</span></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Status</strong></td>
                                <td><span class="label label-success"><i class="fa fa-check"></i> Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- END Customer Info -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- Shipping Address Block -->
                            <div class="block">
                                <!-- Shipping Address Title -->
                                <div class="block-title">
                                    <h2>Shipping Address</h2>
                                </div>
                                <!-- END Shipping Address Title -->
    
                                <!-- Shipping Address Content -->
                                <h4><strong>Harry Burke</strong></h4>
                                <address>
                                    Sunset Str 598<br>
                                    Melbourne<br>
                                    Australia, 21-852<br><br>
                                    <i class="fa fa-phone"></i> (999) 852-22222<br>
                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">harry.burke@example.com</a>
                                </address>
                                <!-- END Shipping Address Content -->
                            </div>
                            <!-- END Shipping Address Block -->
                        </div>
                    </div>
                    
                </section>
            </div>
            <!-- END Customer Info Block -->
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-success"><strong>$ 517,00</strong></span>
                    </div>
                    <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong> in Cart (3)</h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.html"><strong>PID.8715</strong></a></td>
                            <td class="hidden-xs" style="width: 15%;"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs" style="width: 10%;"><strong>$399,00</strong></td>
                            <td><span class="label label-success">Available (479)</span></td>
                            <td class="text-center" style="width: 70px;">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8725</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-success">Available (163)</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8798</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-danger">Out of Stock</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->
            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-success"><strong>$ 517,00</strong></span>
                    </div>
                    <h2><i class="fa fa-usd"></i>&nbsp;<?php echo __('Pagos'); ?></h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.html"><strong>PID.8715</strong></a></td>
                            <td class="hidden-xs" style="width: 15%;"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs" style="width: 10%;"><strong>$399,00</strong></td>
                            <td><span class="label label-success">Available (479)</span></td>
                            <td class="text-center" style="width: 70px;">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8725</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-success">Available (163)</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8798</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-danger">Out of Stock</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->
        </div>
    </div>
    <!-- END Customer Content -->
</section>