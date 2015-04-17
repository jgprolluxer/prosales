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
					<!-- Begin: life time stats -->
					<div class="block full">
						<div class="block-title">
							<div class="caption">
								<i class="icon-basket font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">
								Order #12313232 </span>
								<span class="caption-helper">Dec 27, 2013 7:16:25</span>
							</div>
						</div>
						<div class="">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-lg">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
										Details </a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab">
										Invoices <span class="badge badge-success">
										4 </span>
										</a>
									</li>
									<li>
										<a href="#tab_3" data-toggle="tab">
										Credit Memos </a>
									</li>
									<li>
										<a href="#tab_4" data-toggle="tab">
										Shipments <span class="badge badge-danger">
										2 </span>
										</a>
									</li>
									<li>
										<a href="#tab_5" data-toggle="tab">
										History </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="portlet yellow-crusta box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Order Details
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order #:
															</div>
															<div class="col-md-7 value">
																 12313232 <span class="label label-info label-sm">
																Email confirmation was sent </span>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order Date & Time:
															</div>
															<div class="col-md-7 value">
																 Dec 27, 2013 7:16:25 PM
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order Status:
															</div>
															<div class="col-md-7 value">
																<span class="label label-success">
																Closed </span>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Grand Total:
															</div>
															<div class="col-md-7 value">
																 $175.25
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Payment Information:
															</div>
															<div class="col-md-7 value">
																 Credit Card
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="portlet blue-hoki box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Customer Information
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Customer Name:
															</div>
															<div class="col-md-7 value">
																 Jhon Doe
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Email:
															</div>
															<div class="col-md-7 value">
																 jhon@doe.com
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 State:
															</div>
															<div class="col-md-7 value">
																 New York
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Phone Number:
															</div>
															<div class="col-md-7 value">
																 12234389
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="portlet green-meadow box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Billing Address
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-12 value">
																 Jhon Done<br>
																 #24 Park Avenue Str<br>
																 New York<br>
																 Connecticut, 23456 New York<br>
																 United States<br>
																 T: 123123232<br>
																 F: 231231232<br>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="portlet red-sunglo box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Shipping Address
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-12 value">
																 Jhon Done<br>
																 #24 Park Avenue Str<br>
																 New York<br>
																 Connecticut, 23456 New York<br>
																 United States<br>
																 T: 123123232<br>
																 F: 231231232<br>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12">
												<div class="portlet grey-cascade box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Shopping Cart
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="table-responsive">
															<table class="table table-hover table-bordered table-striped">
															<thead>
															<tr>
																<th>
																	 Product
																</th>
																<th>
																	 Item Status
																</th>
																<th>
																	 Original Price
																</th>
																<th>
																	 Price
																</th>
																<th>
																	 Quantity
																</th>
																<th>
																	 Tax Amount
																</th>
																<th>
																	 Tax Percent
																</th>
																<th>
																	 Discount Amount
																</th>
																<th>
																	 Total
																</th>
															</tr>
															</thead>
															<tbody>
															<tr>
																<td>
																	<a href="javascript:;">
																	Product 1 </a>
																</td>
																<td>
																	<span class="label label-sm label-success">
																	Available
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 2
																</td>
																<td>
																	 2.00$
																</td>
																<td>
																	 4%
																</td>
																<td>
																	 0.00$
																</td>
																<td>
																	 691.00$
																</td>
															</tr>
															<tr>
																<td>
																	<a href="javascript:;">
																	Product 1 </a>
																</td>
																<td>
																	<span class="label label-sm label-success">
																	Available
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 2
																</td>
																<td>
																	 2.00$
																</td>
																<td>
																	 4%
																</td>
																<td>
																	 0.00$
																</td>
																<td>
																	 691.00$
																</td>
															</tr>
															<tr>
																<td>
																	<a href="javascript:;">
																	Product 1 </a>
																</td>
																<td>
																	<span class="label label-sm label-success">
																	Available
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 2
																</td>
																<td>
																	 2.00$
																</td>
																<td>
																	 4%
																</td>
																<td>
																	 0.00$
																</td>
																<td>
																	 691.00$
																</td>
															</tr>
															<tr>
																<td>
																	<a href="javascript:;">
																	Product 1 </a>
																</td>
																<td>
																	<span class="label label-sm label-success">
																	Available
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 345.50$
																</td>
																<td>
																	 2
																</td>
																<td>
																	 2.00$
																</td>
																<td>
																	 4%
																</td>
																<td>
																	 0.00$
																</td>
																<td>
																	 691.00$
																</td>
															</tr>
															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<div class="well">
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Sub Total:
														</div>
														<div class="col-md-3 value">
															 $1,124.50
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Shipping:
														</div>
														<div class="col-md-3 value">
															 $40.50
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Grand Total:
														</div>
														<div class="col-md-3 value">
															 $1,260.00
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Total Paid:
														</div>
														<div class="col-md-3 value">
															 $1,260.00
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Total Refunded:
														</div>
														<div class="col-md-3 value">
															 $0.00
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Total Due:
														</div>
														<div class="col-md-3 value">
															 $1,124.50
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2">
										<div class="table-container">
											<div class="table-actions-wrapper">
												<span>
												</span>
												<select class="table-group-action-input form-control input-inline input-small input-sm">
													<option value="">Select...</option>
													<option value="pending">Pending</option>
													<option value="paid">Paid</option>
													<option value="canceled">Canceled</option>
												</select>
												<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
											</div>
											<table class="table table-striped table-bordered table-hover" id="datatable_invoices">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													<input type="checkbox" class="group-checkable">
												</th>
												<th width="5%">
													 Invoice&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Invoice&nbsp;Date
												</th>
												<th width="10%">
													 Amount
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_bill_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_to" placeholder="To"/>
												</td>
												<td>
													<select name="order_invoice_status" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="paid">Paid</option>
														<option value="canceled">Canceled</option>
													</select>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_3">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_credit_memos">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Credit&nbsp;Memo&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Created&nbsp;Date
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_shipment">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Shipment&nbsp;#
												</th>
												<th width="15%">
													 Ship&nbsp;To
												</th>
												<th width="15%">
													 Shipped&nbsp;Date
												</th>
												<th width="10%">
													 Quantity
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_ship_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_to" placeholder="To"/>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_5">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_history">
											<thead>
											<tr role="row" class="heading">
												<th width="25%">
													 Datetime
												</th>
												<th width="55%">
													 Description
												</th>
												<th width="10%">
													 Notification
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_history_desc" placeholder="To"/>
												</td>
												<td>
													<select name="order_history_notification" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="notified">Notified</option>
														<option value="failed">Failed</option>
													</select>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->


<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('created_by');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('folio');
		echo $this->Form->input('price');
		echo $this->Form->input('total_amt');
		echo $this->Form->input('subtotal_amt');
		echo $this->Form->input('tax');
		echo $this->Form->input('disc');
		echo $this->Form->input('disc_desc');
		echo $this->Form->input('account_id');
		echo $this->Form->input('description');
		echo $this->Form->input('saleschannel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Order.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Payments'), array('controller' => 'order_payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Payment'), array('controller' => 'order_payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
