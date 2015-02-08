<section class="row" data-ng-controller="OrderAddController">
	<!--    <a ng-href="/admin/Users">Users</a>-->
	<!-- Forms General Header -->
	<div class="content-header">
		<div class="header-section">
			<?php echo $this->MenuBuilder->build('menu-header-pos');?>
		</div>
	</div>
	<!-- END Forms General Header -->
	<div class="col-md-8">
		<a href="" class="btn btn-info btn-xs animation-floating" ng-click="toogleFam()" ><i class="fa fa-bars "></i>&nbsp;{{familySearchLegend}}</a>
		<div id="famContainer">
			<legend><i class="fa fa-angle-right"></i> Familias</legend>
			<!-- Familias -->
			<section ng-repeat="family in families">
				<div class="col-md-3">
					<a href="" data-ng-class="" class="btn btn-alt btn-block text-center " data-ng-click="loadProductsbyFam(family.Family.id)" >{{family.Family.title}}</a>
				</div>
			</section>
			<legend><i class="fa fa-angle-right"></i> Productos</legend>
			<!-- Productos -->
			<section ng-repeat="product in products">
				<div class="col-md-3">
					<a href="" ng-click="processSelectedProduct(product.Product.id)" class="btn btn-alt btn-block text-center" >{{product.Product.name}}</a>
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
								<td>${{ orderproduct.OrderProduct.product_price * orderproduct.OrderProduct.product_qty}}</td>
								<td><a href="" class="btn btn-warning btn-xs"><i class="gi gi-pencil"></i></a></td>
								<td><a href="" class="btn btn-danger btn-xs" ng-click="deleteOrderProduct(orderproduct.OrderProduct.id)" ><i class="gi gi-bin"></i></a></td>
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
				<a href="javascript:void(0)" class="widget-icon pull-right themed-background">
					<i class="fa fa-dollar animation-floating"></i>
				</a>
				<h4 class="widget-content widget-content-light">Resumen de la orden<br/>Folio:&nbsp;{{newOrder.Order.folio}}</h4>
			</div>
			<div class="widget-extra themed-background">
				<div class="row text-center">
					<div class="col-xs-4">
						<h3 class="widget-content-light">
							<strong>{{newOrder.Order.total_amt}}</strong><br>
							<small>Total</small>
						</h3>
					</div>
					<div class="col-xs-4">
						<h3 class="widget-content-light">
							<strong>26</strong><br>
							<small>Pagos</small>
						</h3>
					</div>
					<div class="col-xs-4">
						<h3 class="widget-content-light">
							<strong>100</strong><br>
							<small>Deuda</small>
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
                        <div class="widget-main text-center">
                            <div class="widget-options-left">
                                <a href="javascript:void(0);" class="btn btn-xs btn-info" data-toggle="tooltip" title="Asociar" data-ng-click="open()" ><i class="hi hi-plus"></i> Asociar</a>
                            </div>
                            <div class="widget-options">
                                <a href="javascript:void(0);" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Remover" data-ng-click="removeAccount()" ><i class="hi hi-remove"></i> Remover</a>
                            </div>
                        </div>
                        <!-- END Widget Header -->
                        <!-- Widget Main -->
                        <div class="widget-main">
                            <div class="list-group remove-margin">
                                <a href="javascript:void(0)" class="list-group-item" data-ng-show="account">
                                    <!-- <span class="pull-right"><strong>160</strong></span>-->
                                    <h4 class="list-group-item-heading remove-margin"><i class="gi gi-user"></i> {{ account.Account.firstname }}&nbsp;{{ account.Account.lastname }}</h4>
                                </a>
                            </div>
                        </div>
                        <!-- END Widget Main -->
                    </div>
                </div>
                <!-- END Advanced Active Theme Color Widget Alternative -->
                <h4 class="sub-header">Pago:</h4>
			</div>
		</div>
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
                                <td><a href="" class="btn btn-info btn-xs" ng-click="ok(item)" ><i class="hi hi-ok"></i></a></td>
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
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>
</section>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<script type="text/javascript">
$(document).ready(function ()
{
		//$('#page-container').removeClass('sidebar-visible-xs');
		//$('#page-container').removeClass('sidebar-visible-lg');

		$('#page-container').attr('class', 'sidebar-no-animations');
		$('header').hide();
});
</script>
