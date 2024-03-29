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

<!-- END Normal Form Title -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="block">
            <!-- Customer Info Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-o"></i> <strong><?php echo __('ACCOUNT_VIEW_BLOCK_TITLE'); ?></strong></h2>
                <div class="block-options pull-right">
                    <?php
                    echo $this->AclView->link(__('<i class="fa fa-edit fa-fw"></i> Editar'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'edit', $account['Account']['id']), array('escape' => false, 'class' => array('btn btn-xs btn-warning')));
                    ?>
                </div>
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
                <h2><i class="fa fa-line-chart"></i> <strong>Estadísticas</strong></h2>
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
                        <strong>$ <?php echo $totOrd ?></strong><br><small>Valor total de Ordenes</small>
                    </h4>
                </div>
            </a>            
        </div>
        <!-- END Quick Stats Block -->
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <!-- Orders Block -->
        <div class="block full">
            <!-- Orders Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <span class="label label-info"><strong>$ <?php echo $totOrd ?></strong></span>
                </div>
                <h2><i class="fa fa-truck"></i> <strong>Ordenes</strong></h2>
            </div>
            <!-- END Orders Title -->

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter table-bordered" id="example-datatable">
                        <thead>
                            <tr>
                                <th># Folio</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ordersList as $idx => $order) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $this->Html->link(__($order['Order']['folio']), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => 'Order', 'action' => 'view', $order['Order']['id']), array('escape' => false, 'class' => array('')));
                                        ?>
                                    </td>
                                    <td><?php echo __('<strong>$ '.$order['Order']['price'].'</strong>'); ?></td>
                                    <td><?php
                                        if($order['Order']['status'] == "closed")
                                        {
                                            echo __('<span class="label label-success">cerrada</label>');
                                        }
                                        else if($order['Order']['status'] == "open")
                                        {
                                            echo __('<span class="label label-info">abierta</label>');
                                        }
                                        else if($order['Order']['status'] == "paid")
                                        {
                                            echo __('<span class="label label-success">pagada</label>');
                                        }
                                        else if($order['Order']['status'] == "cancelled")
                                        {
                                            echo __('<span class="label label-danger">cancelada</label>');
                                        }
                                        else if($order['Order']['status'] == "pending")
                                        {
                                            echo __('<span class="label label-danger">pendiente</label>');
                                        }
                                        else
                                        {
                                            echo __('<span class="label label-warning">pendiente</label>');
                                        }
                                        
                                        ?></td>
                                    <td><?php echo __($order['Order']['created']); ?></td>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(__('<i class="fa fa-eye fa-fw"></i>'), array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => 'Orders', 'action' => 'view', $order['Order']['id']), array('escape' => false, 'class' => array('btn btn-xs btn-info')));
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
        <div class="block full">
            <!-- Customer Addresses Title -->
            <div class="block-title">
                <h2><i class="fa fa-building-o"></i> <strong>Domicilios</strong></h2>
                <div class="block-options pull-right">
                    <a id="addAddress" href="" class="label label-success animation-pulse">
                        <i class="fa fa-plus"></i> <strong>Agregar Dirección</strong>
                    </a>
                </div>
            </div>
            <!-- END Customer Addresses Title -->

            <!-- Customer Addresses Content -->
            <div class="row" id="addressesArea">
            
                <?php
                foreach ($addresses as $address)
                {?>
                    <div class="col-md-6">
                        <div class="block">
                            <div class="block-title">
                            <?php
                                if($address["Address"]["billing"] == "1" && $address["Address"]["delivery"] == "1")
                                {
                                    echo "<h2>Domicilio de Entregas y Facturación</h2>";
                                }
                                else if($address["Address"]["delivery"] == "1")
                                {
                                    echo "<h2>Domicilio de Entregas</h2>";
                                }
                                else if($address["Address"]["billing"] == "1")
                                {
                                    echo "<h2>Domicilio de Facturación</h2>";
                                }
                                else
                                {
                                    echo "<h2>Domicilio General</h2>";
                                }
                            ?>
                                <div class="block-options pull-right">
                                    <a id="mapView<?php echo $address["Address"]["id"] ?>" href="" class="btn btn-info btn-xs mapView" mapID="<?php echo $address["Address"]["id"] ?>">
                                        <i class="fa fa-eye"></i> <strong>Ver Mapa</strong>
                                    </a>
                                </div>
                            </div>
                            <address id="dataAddress">
                                <i class="fa fa-home"></i>
                                <span id="strAddress<?php echo $address["Address"]["id"] ?>"><?php echo $address["Address"]["street"]; ?></span>, No. 
                                <span id="numAddress<?php echo $address["Address"]["id"] ?>"><?php echo $address["Address"]["street_no"]; ?></span><br>
                                <span id="subAddress<?php echo $address["Address"]["id"] ?>"><?php echo $address["Address"]["suburb"]; ?></span><br>
                                <span id="citAddress<?php echo $address["Address"]["id"] ?>"><?php echo $address["Address"]["city"]; ?></span>, 
                                <span id="staAddress<?php echo $address["Address"]["id"] ?>"><?php echo $address["Address"]["state"]; ?></span><br><br>
                                <!--<i class="fa fa-phone"></i> (81) 8352-1111<br>
                                <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">hugoruiz@prollux.com</a>-->
                            </address>
                        </div>
                    </div>
                <?php 
                }
                ?>
            </div>
            <div class="row" id="gmapContainer" style="display:none">
                <div class="col-md-12">
                        <div class="block full">
                            <div class="block-title">
                                <h2>Mapa Seleccionado</h2>
                                <div class="block-options pull-right">
                                    <a id="closeMap" href="" class="" style="color:gray">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="gmap"></div>
                        </div>
                    </div>
            </div>
            <!-- END Customer Addresses Content -->
        </div>
        <div class="block full">
            <!-- Private Notes Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-text-o"></i> <strong>Notas</strong> Privadas</h2>
            </div>
            <!-- END Private Notes Title -->

            <!-- Private Notes Content -->
            <form method="post" onsubmit="return false;">
                <textarea id="private-note" name="private-note" class="form-control" rows="4" placeholder="Your note.."></textarea>
                <a href="javascript:void(0);" class="btn btn-sm btn-info" id="addNote">
                    <i class="fa fa-plus"></i> Agregar Nota
                </a>
            </form>
            <!-- END Private Notes Content -->
        </div>
        <div class="block full">
            <!-- Private Notes Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-text-o"></i> <strong>Historial</strong> de Notas</h2>
            </div>
            <!-- END Private Notes Title -->

            <!-- Private Notes Content -->
            <div id="notesHistory">                  
                <?php
                foreach ($notes as $note) {
                    ?>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" onclick="deleteNote(this)" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Eliminar" noteID="<?php echo $note["Note"]["id"]; ?>"><span aria-hidden="true">&times;</span></button>
                        <?php echo $note["Note"]["description"]; ?>                        
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- END Private Notes Content -->
    </div>
    <div class="row">
        <?php echo $this->App->drawAccountAddressAdd(); ?> 
        <?php //echo $this->App->drawAccountMapView(); ?> 
    </div>
</div>
</div>
<?php
echo $this->Html->script("/template_assets/js/pages/tablesDatatables.js");
?>
<!-- END Normal Form Block -->

<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="/template_assets/js/helpers/gmaps.min.js"></script>
<script src="/template_assets/plugins/gmaps/gmaps.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#addAddress").click(function(){ 
            $("#addAccountAddress").modal();
            $(".empty").hide();
            $(".error").removeClass("has-error");
            cleanAddress();
        });        
        $(".mapView").click(function(){ loadModalMap(this); });
        $("#closeMap").click(function(){ $("#gmapContainer").fadeOut(500); });
        //getYouCurrentLocation();
    });


    $("#addNote").click(function() {
        if($("#private-note").val() != "")
            saveNote();
    });

    function clickSaveAddress()
    {
        if(validateFields())
            saveAddress();
    }

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
            success: function(data)
            {
                $("#private-note").val('');
                var description = data["xData"]["Note"]["description"];
                var html = '<div class="alert alert-info alert-dismissible" role="alert">' +
                        '<button type="button" class="close" onclick="deleteNote(this)" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Eliminar" noteID="' + data.xData.Note.id + '"><span aria-hidden="true">&times;</span></button>' +
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
    
    function saveAddress()
    {
        var input = $("#addressForm").serialize();
        //console.log("INPUT:" + input);
        $.ajax({
            type: "POST", // Tipo post 
            url: qualifyURL("/Addresses/jsAddress/?CRUD_operation=CREATE&format="),
            data: input, // el input que acabas de crear
            dataType: 'json', // Tipo json
            success: function(data)
            {
                //console.log(data);
                //alert("El domicilio se ha guardado correctamente!");
                cleanAddress();
                $("#addAccountAddress").modal("toggle");
                $.bootstrapGrowl('Domicilio guardado correctamente!', {
                                type: 'success',
                                delay: 2000,
                                allow_dismiss: true
                            });
                loadNewAddress(data.xData);
            },
            error: function(xhr, textStatus, errorThrown)
            {
                alert("Ocurrió un error inesperado al guardar la direccion " + textStatus);
            }
        });
    }
    
    function loadModalMap(obj)
    {
        //$("#mapViewModal").modal();
        searchInGMaps($(obj).attr('mapID'));
        //google.maps.event.trigger(gmap, "resize");
    }
    
    $(function() {
            TablesDatatables.init();
	});
        
    function searchInGMaps(addressID)
    {        
        var key = "AIzaSyB1YPpPbvd3Yx8zUtMBAi54-iUZ_i8FFFY";
        var pluginUrl = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=";
        
        var number = $("#numAddress" + addressID).text();
        var street = $("#strAddress" + addressID).text();
        var suburb = $("#subAddress" + addressID).text();
        var city = $("#citAddress" + addressID).text();
        var state = $("#staAddress" + addressID).text();
        
        var params = number + "+" + street.replace(" ","+") + ",+" + suburb.replace(" ","+") + ",+" + city.replace(" ","+") + ",+" + state.replace(" ","+") + "&key=" + key;
        
        //console.log(pluginUrl + params);
        $.ajax({
            url: pluginUrl + params,
            dataType: "json",
            success: function(data)
            {
                var latitude = data.results[0].geometry.location.lat;
                var longitude = data.results[0].geometry.location.lng;
                loadMap(latitude, longitude);
                
            },
            error: function (data) 
            {
                alert("error 0: " + data);
            }
        });
    }
    
    function loadMap(lat, lng)
    {        
        $("#gmapContainer").fadeIn(500);
         new GMaps({
               div: '#gmap',
               lat: lat,
               lng: lng,
               zoom: 14,
               disableDefaultUI: true,
               scrollwheel: true,
               zoomControl: true
           }).addMarkers([
               {
                   lat: lat,
                   lng: lng,
                   title: 'Find Us',
                   infoWindow: {content: '<strong>Company Address &amp; Info</strong>'},
                   animation: google.maps.Animation.DROP
               }
           ]);    
           
           $("#gmap").css("height","350px");
           $("#gmap").css("width","80%");
           $("#gmap").css("margin", "0 auto");
           $("html, body").animate({ scrollTop: $('#gmapContainer').offset().top }, 1000);
    }

    function loadNewAddress(obj)
    {
        var addressTitle = "";
        if(obj.Address.billing && obj.Address.delivery)
            addressTitle = "Domicilio de Entregas y Facturación";
        else if(obj.Address.billing)
            addressTitle = "Domicilio de Facturación";
        else if(obj.Address.delivery)
            addressTitle = "Domicilio de Entregas";
        else
            addressTitle = "Domicilio General";
        var newAddress = 
            '<div class="col-md-6">' +
                '<div class="block">' +
                    '<div class="block-title">' +
                       '<h2>' + addressTitle + '</h2>' +
                        '<div class="block-options pull-right">' +
                            '<a id="mapView' + obj.Address.id + '" class="btn btn-info btn-xs mapView" mapID="' + obj.Address.id + '">' +
                                '<i class="fa fa-eye"></i> <strong>Ver Mapa</strong>' +
                            '</a>' +
                        '</div>' +
                    '</div>' +
                    '<address id="dataAddress">' +
                        '<i class="fa fa-home"></i>' +
                        '<span id="strAddress' + obj.Address.id + '">' + obj.Address.street + '</span>, No. ' +
                        '<span id="numAddress' + obj.Address.id + '">' + obj.Address.street_no + '</span><br>' +
                        '<span id="subAddress' + obj.Address.id + '">' + obj.Address.suburb + '</span><br>' +
                        '<span id="citAddress' + obj.Address.id + '">' + obj.Address.city + '</span>, ' +
                        '<span id="staAddress' + obj.Address.id + '">' + obj.Address.state + '</span><br><br>' +
                    '</address>' +
                '</div>' +
            '</div>';
        $("#addressesArea").append(newAddress);    
        $(".mapView").click(function(){ loadModalMap(this); });        
        //$("#mapView" + obj.Address.id).click(function(){ loadModalMap(this); });
    }
    
    function cleanAddress()
    {
        $("#AddressStreetNo").val('');
        $("#AddressStreet").val('');
        $("#AddressSuburb").val('');
        $("#AddressCity").val('');
        $("#AddressState").val('');
        $("#AddressCountry").val('');
        $("#addAccountAddress").hide();
        $("#addressesList").html('');
        $("#addressesList").hide();
    }
    
    function deleteNote(obj)
    {        
        var deletedNote = {
            Note: {
                id: $(obj).attr("noteID")
            }
        };
        
        $.ajax({
            type: "POST",
            url: qualifyURL("/Notes/jsNote/?CRUD_operation=DELETE&format="),
            data: deletedNote,
            dataType: 'json',
            success: function(data)
            {
                $.bootstrapGrowl('Se eliminó la Nota!', {
                                type: 'warning',
                                delay: 2000,
                                allow_dismiss: true
                            });
            },
            error: function(xhr, textStatus, errorThrown)
            {
                alert("Ocurrió un error inesperado al borrar la nota " + textStatus);
            }
        });
    }
</script>