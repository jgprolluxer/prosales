<section data-ng-controller="OrderAddController">
<!-- <a ng-href="/admin/Users">Users</a>-->
<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
    </div>
</div>
<!-- END Forms General Header -->
<div class="row">
    <div class="col-md-8">
        <a href="javascript:void(0);" class="btn btn-info btn-xs animation-floating" ng-click="toogleFam()" ><i class="fa fa-bars "></i>&nbsp;{{familySearchLegend}}</a>
        <div id="famContainer">
            <legend><i class="fa fa-angle-right"></i> Familias</legend>
            <!-- Familias -->
            <section ng-repeat="family in families">
                <div class="col-md-3">
                    <a href="javascript:void(0);" data-ng-class="" class="btn btn-alt btn-block text-center " data-ng-click="loadProductsbyFam(family.Family.id)" >{{family.Family.title}}</a>
                </div>
            </section>
            <legend><i class="fa fa-angle-right"></i> Productos</legend>
            <!-- Productos -->
            <section ng-repeat="product in products">
                <div class="col-md-3">
                    <a href="javascript:void(0);" ng-click="processSelectedProduct(product.Product.id)" class="btn btn-alt btn-block text-center" >{{product.Product.name}}</a>
                </div>
            </section>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div id="icon-gen" class="block full">
            <!-- Default Tabs -->
            <ul class="nav nav-tabs push" data-toggle="tabs">
                <li class="active"><a href="#tab_SearchBarCode">Código de barras</a></li>
                <li><a href="#tab_SearchProductName">Nombre de producto</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_SearchBarCode">
                    <input type="text" id="productBarcodeSearcher" name="productBarcodeSearcher" placeholder="No busca nada aun..." class="form-control">
                </div>
                <div class="tab-pane" id="tab_SearchProductName">
                    <input type="text" id="productSearcher" name="productSearcher" placeholder="Buscar producto..." class="form-control">
                </div>
            </div>
            <!-- END Default Tabs -->
        </div>
        <legend><i class="fa fa-angle-right"></i> Productos seleccionados</legend>
        <!-- Responsive Classes -->
        <div class="block">
            <div class="block-title">

            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table" datatable="ng" dt-options="dtOrderProductsOptions" >
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Impuesto</th>
                            <th>Total</th>
                            <th>Editar</th>
                            <th>Cancelar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="orderproduct in orderProducts">
                            <td>{{ orderproduct.Product.name}}</td>
                            <td>${{ orderproduct.OrderProduct.product_price}}</td>
                            <td>{{ orderproduct.OrderProduct.product_qty}}</td>
                            <td>${{ orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty }}</td>
                            <td>${{ ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 ) }} </td>
                            <td>${{ (orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty + ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 )).toFixed(2)  }}</td>
                            <td>
                                <a href="javascript:void(0);" ng-disabled="totalPayments >= newOrder.Order.total_amt || 'closed' == newOrder.Order.status" class="btn btn-warning btn-xs">
                                    <i class="gi gi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" ng-disabled="totalPayments >= newOrder.Order.total_amt || 'closed' == newOrder.Order.status" class="btn btn-danger btn-xs" ng-click="deleteOrderProduct(orderproduct.OrderProduct.id)" >
                                    <i class="gi gi-bin"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END Responsive Classes -->
            <!-- END Responsive Partial Content -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget" >
            <div class="widget-simple themed-background-dark">
                <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
                    <i class="fa fa-dollar animation-floating"></i>
                </a>
                <h4 class="widget-content widget-content-light">Resumen de la orden<br/>Folio:&nbsp;{{newOrder.Order.folio}}</h4>
                <a href="javascript:void(0)" class="pull-right btn-xs btn btn-danger" data-ng-disabled=" totalPayments >= newOrder.Order.total_amt" >
                    Cancelar Orden
                </a>
            </div>
            <div class="widget-extra themed-background">
                <div class="row text-center">
                    <div class="col-xs-6">
                        <h3 class="widget-content-light">
                            <strong>{{newOrder.Order.total_amt}}</strong><br>
                            <small>Total</small>
                        </h3>
                    </div>
                    <div class="col-xs-6">
                        <h3 class="widget-content-light">
                            <strong>0</strong><br>
                            <small>Pagos</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="widget-extra">
                <h4 class="sub-header">Cliente:</h4>
                <!-- Advanced Active Theme Color Widget Alternative -->
                <div class="widget">
                    <div class="widget-advanced widget-advanced-alt">
                        <!-- Widget Header -->
                        <div class="widget-extra-full text-center">
                            <div class="pull-left" >
                                <a href="javascript:void(0);" data-ng-disabled="account" class="btn btn-xs btn-info" data-toggle="tooltip" title="Asociar" data-ng-click="open()" ><i class="hi hi-plus"></i> Asociar</a>
                            </div>
                            <div class="pull-right" >
                                <a href="javascript:void(0);" data-ng-disabled="!account || totalPayments >= newOrder.Order.total_amt" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Remover" data-ng-click="removeAccount()" ><i class="hi hi-remove"></i> Remover</a>
                            </div>
                        </div>
                        <!-- END Widget Header -->
                        <!-- Widget Main -->
                        <div class="widget-main">
                            <div class="list-group remove-margin">
                                <a href="javascript:void(0)" class="list-group-item" data-ng-show="account">
                                    <!-- <span class="pull-right"><strong>160</strong></span>-->
                                    <h4 class="list-group-item-heading remove-margin">
                                        <i class="gi gi-user"></i> {{ account.Account.firstname }}&nbsp;{{ account.Account.lastname }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <!-- END Widget Main -->
                    </div>
                </div>
                <section data-ng-disabled="account ">
                    <!-- END Advanced Active Theme Color Widget Alternative -->
                    <h4 class="sub-header">Pago:</h4>
                    <!-- Advanced Active Theme Color Widget Alternative -->
                    <div class="widget-extra-full">
                        <form ng-submit="addQuickPayment()" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Recibí:</label>
                                <div class="col-md-9">
                                    <input ng-model="pmnt_received" ng-change="calcChange()" ng-disabled="totalPayments >= newOrder.Order.total_amt" type="number" id="txtReceived" name="txtReceived" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions">
                                <a ng-click="addQuickPayment()" ng-disabled="totalPayments >= newOrder.Order.total_amt" class="pull-right btn btn-xs btn-info">
                                    <i class="fa fa-plus"></i>Pago Rápido
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- END Advanced Active Theme Color Widget Alternative -->
                    <!-- Advanced Active Theme Color Widget Alternative -->
                    <div class="widget-extra-full" style="display: none;">
                            <a disabled="disabled" href="javascript:void(0);" class="pull-right btn btn-xs btn-info" data-toggle="tooltip" title="Agregar Pago"  >
                                <i class="hi hi-plus"></i> Agregar Pagos diferidos próximamente
                            </a>
                    </div>
                    <!-- END Advanced Active Theme Color Widget Alternative -->
                    <!-- Advanced Active Theme Color Widget Alternative -->
                    <div class="widget-extra-full">
                        <form onsubmit="return false" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="txtChange">Cambio:</label>
                                <div class="col-md-9">
                                    <input ng-model="pmnt_change"  type="number" id="txtChange" name="txtChange" class="form-control" readonly="readonly" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Advanced Active Theme Color Widget Alternative -->
                    <h4 class="sub-header">Finalizar:</h4>
                    <!-- Advanced Active Theme Color Widget Alternative -->
                    <div class="widget">
                        <div class="widget-advanced widget-advanced-alt">
                            <!-- Widget Header -->
                            <div class="widget-main text-center">
                                <div class="pull-left" >
                                    <a href="javascript:void(0);" class="btn btn-xs btn-success" ng-click="closeOrder()" ng-disabled="'closed' == newOrder.Order.status || !totalPayments >= newOrder.Order.total_amt" >
                                        <i class="hi hi-check"></i> Cerrar Orden
                                    </a>
                                </div>
                                <div class="pull-right" >
                                    <a href="javascript:void(0);" ng-disabled="'closed' != newOrder.Order.status" class="btn btn-xs btn-warning">
                                        <i class="hi hi-remove"></i> Imprimir Ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="jumbotron"></div>
</div>
<script type="text/ng-template" id="AccountModalContent.html">
    <div class="modal-header">
        <h3 class="modal-title">Clientes</h3>
    </div>
    <div class="modal-body">
        <!-- Responsive Classes -->
        <div class="block">
            <div class="block-title">
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table id="tblAccountModal" class="table" datatable="ng" dt-options="dtAccountModalOptions" >
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Asociar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in items">
                            <td>{{ item.Account.firstname }} &nbsp; {{ item.Account.lastname }}</td>
                            <td><a href="javascript:void(0);" class="btn btn-info btn-xs" ng-click="ok(item)" ><i class="hi hi-ok"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Responsive Classes -->
            <!-- END Responsive Partial Content -->
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-warning" ng-click="cancel()">Cancelar</button>
    </div>
</script>
</section>
<script type="text/javascript">
    $(document).ready(function ()
    {
        //$('#page-container').removeClass('sidebar-visible-xs');
        //$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
    });
</script>
