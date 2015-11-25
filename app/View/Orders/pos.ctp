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
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm  themed-border-spring themed-color-spring">
                            <small> 1 </small>
                        </a>
                    </div>
                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <h3>{{order.Order.folio}}</h3>
                </div>
                <div class="block-section">
                    <div class="list-group remove-margin">
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="pull-right">
                                <span class="label label-info">
                                    <strong>{{frmtNumber(order.Order.total_amt)}}</strong>
                                </span>
                            </span>
                            <h4 class="list-group-item-heading remove-margin">
                                <i class="fa fa-usd fa-fw"></i>&nbsp;<?php echo __('Total'); ?>
                            </h4>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="pull-right">
                                <strong>{{order.Order.created}}</strong>
                            </span>
                            <h4 class="list-group-item-heading remove-margin">
                                <i class="fa fa-calendar fa-fw"></i>&nbsp;<?php echo __('Creada el'); ?>
                            </h4>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="pull-right">
                                <strong>{{order.CreatedBy.firstname}}&nbsp;{{order.CreatedBy.lastname}}</strong>
                            </span>
                            <h4 class="list-group-item-heading remove-margin">
                                <i class="fa fa-user fa-fw"></i>&nbsp;<?php echo __('Creada por'); ?>
                            </h4>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="pull-right">
                                <strong>{{order.Order.status}}</strong>
                            </span>
                            <h4 class="list-group-item-heading remove-margin">
                                <i class="fa fa-check fa-fw"></i>&nbsp;<?php echo __('Estado'); ?>
                            </h4>
                        </a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12"> <br/>
                                    <a href="javascript:void(0);" class="btn btn-xs btn-danger" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' || order.Order.status == 'paid' " ng-click="cancelOrder()">
                                        <?php echo __('Cancelar'); ?>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-xs btn-success" ng-disabled=" !account.Account.id || 0 == order.Order.total_amt || order.Order.status != 'paid' " ng-click="closeOrder()" >
                                        <?php echo __('Cerrar'); ?>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-xs btn-info" ng-disabled=" order.Order.status == 'cancelled' || order.Order.status == 'open' " ng-href="/Orders/raiseticket/{{order.Order.id}}" target="_blank" >
                                        <?php echo __('Imprimir ticket'); ?>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Customer Info -->
            </div>
            <!-- END Customer Info Block -->
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="gi gi-user"></i>&nbsp;<?php echo __('Cliente'); ?></h2>
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm  themed-border-spring themed-color-spring">
                            <small>2</small>
                        </a>
                    </div>
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
                                <td>{{account.Account.created}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <?php echo __('Creado por'); ?>
                                </td>
                                <td>{{account.CreatedBy.firstname}}&nbsp;{{account.CreatedBy.lastname}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- END Customer Info -->
                    
                </section>
            </div>
            <!-- END Customer Info Block -->
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <h2><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo __('Productos'); ?></h2>
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm  themed-border-spring themed-color-spring">
                            <small>3</small>
                        </a>
                    </div>
                </div>
                <div class="block-section text-center">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="<?php echo __('Buscar producto por nombre...'); ?>"  ng-disabled=" !account.Account.id || order.Order.status == 'closed' || order.Order.status == 'cancelled'  || order.Order.status == 'paid' " ng-model="selectedProduct" data-animation="am-flip-x" bs-options="thproduct.Product.name for thproduct in getProductByName($viewValue)" bs-typeahead>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="<?php echo __('Buscar producto por código de barras...'); ?>" ng-if="barcodecompleted"  ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled'  || order.Order.status == 'paid'  " />
                        </div>
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
                                <a href="javascript:void(0);" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' || order.Order.status == 'paid' " class="btn btn-danger btn-xs" ng-click="cancelOrderProduct(orderproduct.OrderProduct, $index)" >
                                    <i class="gi gi-bin"></i>
                                </a>
                                <br/>
                                <a href="javascript:void(0);" ng-disabled="order.Order.status == 'closed' || order.Order.status == 'cancelled' || order.Order.status == 'paid' " class="btn btn-warning btn-xs" ng-click="showeditOrderProductModal(orderproduct.OrderProduct)" >
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
                    <h2><i class="fa fa-usd"></i>&nbsp;<?php echo __('Pago'); ?></h2>
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm  themed-border-spring themed-color-spring">
                            <small>4</small>
                        </a>
                    </div>
                </div>
                <!-- END Products in Cart Title -->
                
                <table class="table table-bordered table-striped table-vcenter">
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <form ng-submit="applyPayment()">
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="number" class="form-control" ng-change="checkPayment()" ng-model="payment_received_amt" ng-disabled="order.Order.status !== 'pending'" placeholder="<?php echo __('Pago'); ?>"  />
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-info btn-md" ng-disabled="order.Order.status !== 'pending'" value="<?php echo __('Pagar'); ?>"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                        
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label for=""><?php echo __('Cambio'); ?></label>
                                    <div class="block-section text-center">
                                        <h4>{{txnChange}}</h4>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr ng-repeat="payment in order.OrderPayment">
                            <td class="text-center "><strong>{{payment.created}}</strong></td>
                            <td class="text-center "><strong>{{payment.folio}}</strong></td>
                            <td class="text-center "><strong>{{payment.type}}</strong></td>
                            <td class="text-center"><strong>${{payment.total_amt}}</strong></td>
                            <td><span class="label label-success">{{payment.status | translate}}</span></td>
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