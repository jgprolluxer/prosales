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
                            <td class="text-right" ><strong><?php echo __('Total'); ?></strong></td>
                            <td><span class="label label-info">{{frmtNumber(order.Order.total_amt)}}</label></td>
                        </tr>
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
                                <a href="javascript:void(0);" class="btn btn-xs btn-danger" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " ng-click="cancelOrder()">
                                    <?php echo __('Cancelar'); ?>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-xs btn-success" ng-disabled=" !order.Order.account_id || 0 == order.Order.total_amt || order.Order.status == 'closed' || order.Order.status == 'cancelled' " >
                                    <?php echo __('Cerrar'); ?>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-xs btn-info" ng-disabled=" order.Order.status == 'cancelled' || order.Order.status == 'open' " ng-href="/Orders/raiseticket/{{order.Order.id}}" target="_blank" >
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
                    <input type="text" class="form-control" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " ng-model="selectedAccount" data-animation="am-flip-x"  bs-options="staccount.Account.firstname + ' ' + staccount.Account.lastname for staccount in accounts" placeholder="<?php echo __('Buscar cliente'); ?>" bs-typeahead>
                </div>
                <section ng-if="order.Account.id">
                    <!-- Customer Info -->
                    <div class="block-section text-center">
                        <h3>{{account.Account.firstname}}&nbsp;{{account.Account.lastname}}</h3>
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
                        <span class="label label-info">{{frmtNumber(order.Order.total_amt)}}</span>
                    </div>
                    <h2><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo __('Productos'); ?></h2>
                </div>
                <div class="block-section text-center">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="<?php echo __('Buscar producto por nombre...'); ?>"  ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " ng-model="selectedProduct" data-animation="am-flip-x" bs-options="thproduct.Product.name for thproduct in getProductByName($viewValue)" bs-typeahead>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="<?php echo __('Buscar producto por código de barras...'); ?>" ng-if="barcodecompleted"  ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " />
                        </div>
                    </div>
                    <div class="row">
                            <!--<input type="text" class="form-control" ng-model="selectedAddress" data-animation="am-flip-x" bs-options="address.formatted_address as address.formatted_address for address in getAddress($viewValue)" placeholder="Enter address" bs-typeahead>-->
                    </div>
                </div>
                <!-- END Products in Cart Title -->
                <div class="table-responsive">
                    <!-- Products in Cart Content -->
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Impuesto</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center" ng-if="orderProducts.length < 1" >
                                    <?php echo __('No hay productos seleccionados'); ?>
                                </td>
                            </tr>
                            <tr ng-repeat="orderproduct in orderProducts">
                            <td>{{ orderproduct.Product.name}}</td>
                            <td>${{ orderproduct.OrderProduct.product_price}}</td>
                            <td>{{ orderproduct.OrderProduct.product_qty}}</td>
                            <td>${{ orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty }}</td>
                            <td>${{ ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 ) }} </td>
                            <td>${{ (orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty + ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 )).toFixed(2)  }}</td>
                            <td>
                                <a href="javascript:void(0);" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " class="btn btn-danger btn-xs" ng-click="cancelOrderProduct(orderproduct.OrderProduct, $index)" >
                                    <i class="gi gi-bin"></i>
                                </a>
                                <br/>
                                <a href="javascript:void(0);" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' " class="btn btn-warning btn-xs" ng-click="showeditOrderProductModal(orderproduct.OrderProduct)" >
                                    <i class="gi gi-check"></i>
                                    <?php echo __('Ingredientes'); ?>
                                </a>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->
            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-info"><strong>$ 517,00</strong></span>
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