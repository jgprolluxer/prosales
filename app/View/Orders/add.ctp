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
        <div id="icon-gen" class="block full">
            <!-- Default Tabs -->
            <ul class="nav nav-tabs push" data-toggle="tabs">
                <li class="active"><a href="#tab_SearchBarCode">Código de barras</a></li>
                <li><a href="#tab_SearchProductName">Nombre de producto</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_SearchBarCode">
                    <input type="text" ng-disabled="newOrder.Order.total_amt <= totalPayments && totalPayments != 0 " id="productBarcodeSearcher" name="productBarcodeSearcher" placeholder="No busca nada aun..." class="form-control">
                </div>
                <div class="tab-pane" id="tab_SearchProductName">
                    <input type="text" ng-disabled="newOrder.Order.total_amt <= totalPayments && totalPayments != 0 " id="productSearcher" name="productSearcher" placeholder="Buscar producto..." class="form-control">
                </div>
            </div>
            <!-- END Default Tabs -->
        </div>
        <!-- Products Block -->
        <div class="block">
            <!-- Products Title -->
            <div class="block-title">
                <h2><i class="fa fa-shopping-cart"></i> <strong>Productos</strong></h2>
            </div>
            <!-- END Products Title -->
            <!-- Products Content -->
            <div class="table-responsive">
                <table class="table table-bordered table-vcenter" datatable="ng" dt-options="dtOrderProductsOptions" >
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
                    <tr ng-repeat="orderproduct in orderProducts">
                        <td>{{ orderproduct.Product.name}}</td>
                        <td>${{ orderproduct.OrderProduct.product_price}}</td>
                        <td>{{ orderproduct.OrderProduct.product_qty}}</td>
                        <td>${{ orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty }}</td>
                        <td>${{ ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 ) }} </td>
                        <td>${{ (orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty + ( ( orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty * orderproduct.OrderProduct.product_tax) /100 )).toFixed(2)  }}</td>
                        <td>
                            <a href="javascript:void(0);" ng-disabled="totalPayments >= newOrder.Order.total_amt && totalPayments != 0  " class="btn btn-warning btn-xs">
                                <i class="gi gi-pencil"></i>
                            </a>
                            <a href="javascript:void(0);" ng-disabled="totalPayments >= newOrder.Order.total_amt && totalPayments != 0 " class="btn btn-danger btn-xs" ng-click="deleteOrderProduct(orderproduct.OrderProduct.id)" >
                                <i class="gi gi-bin"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Products Content -->
        </div>
        <!-- END Products Block -->
    </div>
    <div class="col-md-4">
        <div class="widget" >
            <div class="widget-simple themed-background-dark">
                <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
                    <i class="fa fa-dollar animation-floating"></i>
                </a>
                <h4 class="widget-content widget-content-light">Resumen de la orden<br/>Folio:&nbsp;{{newOrder.Order.folio}}</h4>
                <a href="javascript:void(0)" ng-click="cancelOrder()" class="pull-right btn-xs btn btn-danger" data-ng-disabled=" totalPayments >= newOrder.Order.total_amt && totalPayments != 0 " >
                    Cancelar Orden
                </a>
            </div>
            <div class="widget-extra themed-background">
                <div class="row text-center">
                    <div class="col-xs-6">
                        <h3 class="widget-content-light">
                            <strong>${{newOrder.Order.total_amt}}</strong><br>
                            <small>Total</small>
                        </h3>
                    </div>
                    <div class="col-xs-6">
                        <h3 class="widget-content-light">
                            <strong>${{totalPayments}}</strong><br>
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
                <!-- END Advanced Active Theme Color Widget Alternative -->
                <h4 class="sub-header">Pago:</h4>
                <!-- Advanced Active Theme Color Widget Alternative -->
                <div class="widget-extra-full">
                    <form ng-submit="addQuickPayment()" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-text-input">Recibí:</label>
                            <div class="col-md-9">
                                <input ng-model="pmnt_received" ng-change="calcChange()" ng-disabled=" !account || totalPayments >= newOrder.Order.total_amt" type="number" id="txtReceived" name="txtReceived" class="form-control">
                            </div>
                        </div>
                        <div class="form-actions">
                            <a ng-click="addQuickPayment()" ng-disabled=" !account || totalPayments >= newOrder.Order.total_amt" class="pull-right btn btn-xs btn-info">
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
                                <a href="javascript:void(0);" class="btn btn-xs btn-success" ng-click="closeOrder()" ng-disabled=" newOrder.Order.total_amt <= totalPayments && newOrder.Order.total_amt == 0  || 'closed' == newOrder.Order.status " >
                                    <i class="hi hi-check"></i> Cerrar Orden
                                </a>
                            </div>
                            <div class="pull-right" >
                                <a href="javascript:void(0);" ng-href="/Orders/raiseticket/{{newOrder.Order.id}}" target="_blank" ng-disabled="'closed' != newOrder.Order.status" class="btn btn-xs btn-success">
                                    <i class="hi hi-arrow-down"></i> Imprimir Ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
        <!-- Products Block -->
        <div class="block">
            <!-- Products Title -->
            <div class="block-title">
                <h2><i class="fa fa-shopping-cart"></i> <strong>Clientes</strong></h2>
            </div>
            <!-- END Products Title -->

            <!-- Products Content -->
            <div class="table-responsive">
                <table id="tblAccountModal" class="table table-bordered table-vcenter" class="table" datatable="ng" dt-options="dtAccountModalOptions" >
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
            <!-- END Products Content -->
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
        /* Add placeholder attribute to the search input */
        $('.dataTables_filter input').attr('placeholder', 'Search');
    });
</script>
