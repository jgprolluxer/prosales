<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos'); ?>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<!-- Normal Form Block -->

<!-- Normal Form Title -->
<div class="block-title">
    <div class="block-options pull-right">
        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
    </div>
</div>
<!-- END Normal Form Title -->
<div class="row">
    <div class="col-lg-4">
        <div class="block">
            <!-- Customer Info Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-o"></i> <strong><?php echo __('ACCOUNT_VIEW_BLOCK_TITLE'); ?></strong></h2>
            </div>
            <!-- END Customer Info Title -->

            <!-- Customer Info -->
            <div class="block-section text-center">
                <h3>
                    <strong><?php echo __($account['Account']['firstname']); ?> <?php echo __($account['Account']['lastname']); ?></strong><br><small></small>
                </h3>
            </div>
            <table class="table table-borderless table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td class="text-right" style="width: 50%;"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_ALIAS'); ?></strong></td>
                        <td><?php echo __($account['Account']['alias']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_BIRTHDATE'); ?></strong></td>
                        <td><?php echo __($account['Account']['birthdate']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_SEX'); ?></strong></td>
                        <td><?php echo __($account['Account']['sex']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_TEAM'); ?></strong></td>
                        <td><?php echo __($account['Team']['name']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_MODE'); ?></strong></td>
                        <td><?php echo __($account['Account']['mode']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong><?php echo __('ACCOUNT_VIEW_FORM_FIELD_TYPE'); ?></strong></td>
                        <td><?php echo __($account['Account']['type']); ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Customer Info -->
        </div>
        <!-- END Customer Info Block -->
        <!-- Quick Stats Block -->
        <div class="block">
            <!-- Quick Stats Title -->
            <div class="block-title">
                <h2><i class="fa fa-line-chart"></i> <strong>Quick</strong> Stats</h2>
            </div>
            <!-- END Quick Stats Title -->

            <!-- Quick Stats Content -->
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background">
                        <i class="fa fa-truck"></i>
                    </div>
                    <h4 class="text-left">
                        <strong><?php echo $sumOrd ?></strong><br><small>Total de Ordenes</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-success">
                        <i class="fa fa-usd"></i>
                    </div>
                    <h4 class="text-left text-success">
                        <strong>$ 2.125,00</strong><br><small>Orders Value</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-warning">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <h4 class="text-left text-warning">
                        <strong>3</strong> ($ 517,00)<br><small>Products in Cart</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-info">
                        <i class="fa fa-group"></i>
                    </div>
                    <h4 class="text-left text-info">
                        <strong>2</strong><br><small>Referred Members</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-danger">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h4 class="text-left text-danger">
                        <strong>15</strong><br><small>Favorite Products</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-muted">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <h4 class="text-left text-muted">
                        <strong>2</strong><br><small>Tickets</small>
                    </h4>
                </div>
            </a>
            <!-- END Quick Stats Content -->
        </div>
        <!-- END Quick Stats Block -->
    </div>
    <div class="col-lg-8">
        <!-- Orders Block -->
        <div class="block">
            <!-- Orders Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <span class="label label-success"><strong>$ 2125,00</strong></span>
                </div>
                <h2><i class="fa fa-truck"></i> <strong>Orders</strong> (4)</h2>
            </div>
            <!-- END Orders Title -->

            <!-- Orders Content -->
            <table class="table table-bordered table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td class="text-center" style="width: 100px;"><a href="page_ecom_order_view.html"><strong>ORD.685199</strong></a></td>
                        <td class="hidden-xs" style="width: 15%;"><a href="javascript:void(0)">5 Products</a></td>
                        <td class="text-right hidden-xs" style="width: 10%;"><strong>$585,00</strong></td>
                        <td><span class="label label-warning">Processing</span></td>
                        <td class="hidden-xs">Paypal</td>
                        <td class="hidden-xs text-center">16/11/2014</td>
                        <td class="text-center" style="width: 70px;">
                            <div class="btn-group btn-group-xs">
                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685198</strong></a></td>
                        <td class="hidden-xs"><a href="javascript:void(0)">2 Products</a></td>
                        <td class="text-right hidden-xs"><strong>$958,00</strong></td>
                        <td><span class="label label-info">For delivery</span></td>
                        <td class="hidden-xs">Credit Card</td>
                        <td class="hidden-xs text-center">03/10/2014</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685197</strong></a></td>
                        <td class="hidden-xs"><a href="javascript:void(0)">3 Products</a></td>
                        <td class="text-right hidden-xs"><strong>$318,00</strong></td>
                        <td><span class="label label-success">Delivered</span></td>
                        <td class="hidden-xs">Bank Wire</td>
                        <td class="hidden-xs text-center">17/06/2014</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685196</strong></a></td>
                        <td class="hidden-xs"><a href="javascript:void(0)">6 Products</a></td>
                        <td class="text-right hidden-xs"><strong>$264,00</strong></td>
                        <td><span class="label label-success">Delivered</span></td>
                        <td class="hidden-xs">Paypal</td>
                        <td class="hidden-xs text-center">27/01/2014</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- END Orders Content -->
        </div>
        <div class="block">
            <!-- Customer Addresses Title -->
            <div class="block-title">
                <h2><i class="fa fa-building-o"></i> <strong>Customer</strong> Addresses (2)</h2>
                <div class="block-options pull-right">
                    <a id="addAddress" href="" class="label label-success"><strong>Agregar Dirección</strong></a>
                </div>
            </div>
            <!-- END Customer Addresses Title -->

            <!-- Customer Addresses Content -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Billing Address Block -->
                    <div class="block">
                        <!-- Billing Address Title -->
                        <div class="block-title">
                            <h2>Billing Address</h2>
                        </div>
                        <!-- END Billing Address Title -->

                        <!-- Billing Address Content -->
                        <h4><strong>Jonathan Taylor</strong></h4>
                        <address>
                            Sunset Str 620<br>
                            Melbourne<br>
                            Australia, 21-842<br><br>
                            <i class="fa fa-phone"></i> (999) 852-11111<br>
                            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">johnathan.taylor@example.com</a>
                        </address>
                        <!-- END Billing Address Content -->
                    </div>
                    <!-- END Billing Address Block -->
                </div>
                <div class="col-lg-6">
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
            <!-- END Customer Addresses Content -->
        </div>
        <div class="block full">
            <!-- Private Notes Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-text-o"></i> <strong>Private</strong> Notes</h2>
            </div>
            <!-- END Private Notes Title -->

            <!-- Private Notes Content -->
            <form action="page_ecom_customer_view.html" method="post" onsubmit="return false;">
                <textarea id="private-note" name="private-note" class="form-control" rows="4" placeholder="Your note.."></textarea>
                <button type="submit" class="btn btn-sm btn-primary" id="addNote"><i class="fa fa-plus"></i> Add Note</button>
            </form>
            <!-- END Private Notes Content -->
        </div>
        <div class="block full">
            <!-- Private Notes Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-text-o"></i> <strong>Past</strong> Notes</h2>
            </div>
            <!-- END Private Notes Title -->

            <!-- Private Notes Content -->
            <div id="notesHistory">                  
                <?php
                foreach ($notes as $note) {
                    ?>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $note["Note"]["description"]; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- END Private Notes Content -->
    </div>
    <div class="row">
        <?php echo $this->App->drawAccountAddressAdd(); ?> 
    </div>
</div>        
<?php
echo $this->Form->input('id', array(
    'label' => array('class' => 'col-md-4 control-label', 'text' => __('ACCOUNT_VIEW_FORM_FIELD_ID')),
    'class' => 'form-control',
    'type' => 'hidden',
    'readonly' => 'readonly'
));
?>
<?php
echo $this->Form->input('orders', array(
    'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_REPORT_ADD_FORM_FIELD_STATUS')),
    'class' => 'form-control',
    'type' => 'hidden',
    'value' => $sumOrd
));
?>
</div>
<!-- END Normal Form Block -->
<script type="text/javascript">
    $(document).ready(function()
    {
        //$('#page-container').removeClass('sidebar-visible-xs');
        //$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
        $("#addAddress").click(function(){ $("#addAccountAddress").modal() });
    });


    $("#addNote").click(function() {
        saveNote();
    });

    function saveNote()
    {
        var newNote = {
            Note: {
                title: '',
                description: '',
                objectType: $("#txt_objectType").val(),
                objectid: $("#txt_objectID").val()
            }
        };

        newNote.Note.title = 'From account';
        newNote.Note.description = $("#private-note").val();

        $.ajax({
            type: "POST", // Tipo post 
            url: qualifyURL("/Notes/jsNote/?CRUD_operation=CREATE&format="),
            data: newNote, // el note que acabas de crear
            dataType: 'json', // Tipo json
            async: false,
            success: function(data)
            {
                $("#private-note").val('');
                var description = data["xData"]["Note"]["description"];
                var html = '<div class="alert alert-info alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        description +
                        '</div>';
                $("#notesHistory").html(html + $("#notesHistory").html());
            },
            error: function(xhr, textStatus, errorThrown)
            {
                alert("Ocurrió un error inesperado al guardar la nota " + textStatus);
            }
        });

    }
    /*
     var newNote = {
     Note: {
     title: '',
     description: '',
     objectType: '',
     objectId: ''
     }
     };
     
     newNote.Note.title = 'From account';
     newNote.Note.description = $('#noteDescription').val();
     
     
     $.ajax();
     
     
     if ($this->Order->save($this->request->data))
     EN ORDERSCONTROLLER
     
     */
</script>