<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
    <div class="block-title">
        <h2>Domicilio</h2>
    </div>
    <!-- END Interactive Title -->

    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->Form->create('Address', array(
            'class' => 'form-horizontal',
            'id' => 'addressForm',
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'between' => '<div class="col-md-8">',
                'after' => '</div>',
                'error' => array(
                    'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                ),
        )));
        ?>
        <?php
        echo $this->Form->input('account_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Account_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'value' => $relObjId
            ));
        ?>
        <div class="col-md-6">

            <div id="streetInput">
                <?php
                echo $this->Form->input('street', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Calle')),
                    'class' => 'form-control',
                    'type' => 'text'
                ));
                ?>
                <div id="streetError" class="help-block animation-slideDown" style="display:none">Favor de introducir calle</div>
            </div>

            <div id="streetNoInput">
                <?php
                echo $this->Form->input('street_no', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Número')),
                    'class' => 'form-control',
                    'type' => 'text'
                ));
                ?>
                <div id="streetNoError" class="help-block animation-slideDown" style="display:none">Favor de introducir número de calle</div>
            </div>

            <div id="suburbInput">
                <?php
                echo $this->Form->input('suburb', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Colonia')),
                    'class' => 'form-control',
                    'type' => 'text'
                ));
                ?>
                <div id="suburbError" class="help-block animation-slideDown" style="display:none">Favor de introducir colonia</div>
            </div>

            <div id="cityInput">
                <?php
                echo $this->Form->input('city', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Ciudad')),
                    'class' => 'form-control',
                    'type' => 'text'
                ));
                ?>
                <div id="cityError" class="help-block animation-slideDown" style="display:none">Favor de introducir ciudad</div>
            </div>

            <div id="stateInput">
                <?php
                echo $this->Form->input('state', array(
                    'label' => array('class' => 'col-md-4 control-label', 'text' => __('Estado')),
                    'class' => 'form-control',
                    'type' => 'text'
                ));
                ?>
                <div id="stateError" class="help-block animation-slideDown" style="display:none">Favor de introducir estado</div>
            </div>

        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('zip', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Código Postal')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('country', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('País')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('billing', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Dirección de Facturación')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
            <?php
            echo $this->Form->input('delivery', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Dirección de Entrega')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <a href="" class="btn btn-success" id="saveAddress" onclick="clickSaveAddress();"><?php echo __('ACCOUNT_ADD_FORM_BTN_SAVE'); ?></a>
                <a href="" class="btn btn-info" id="searchAddress" onclick="clickSearchAddress();">Buscar</a>
            </div>
        </div>
        <!--<legend><i class="fa fa-angle-right"></i> Tags Input</legend>-->
    </div>
</div>

<div class="block full" id="addressContent" style="display:none;">
    <div class="block-title">
        <h2>Búsqueda de Domicilio</h2>
    </div>
    <div class="block-content" id="addressesList">        
    </div>
</div>

<script type="text/javascript">
        function validateFields(){
            var flag = 0;
            if($("#AddressStreet").val() == "") {
                $("#streetInput").addClass("error");
                $("#streetError").addClass("empty");
                $("#AddressStreet").focus();
                flag = 1;
            }
            if($("#AddressStreetNo").val() == "") {
                $("#streetNoInput").addClass("error");
                $("#streetNoError").addClass("empty");
                $("#AddressStreetNo").focus();
                flag = 1;
            }
            if($("#AddressSuburb").val() == "") {
                $("#suburbInput").addClass("error");
                $("#suburbError").addClass("empty");
                $("#AddressSuburb").focus();
                flag = 1;
            }
            if($("#AddressCity").val() == "") {
                $("#cityInput").addClass("error");
                $("#cityError").addClass("empty");
                $("#AddressCity").focus();
                flag = 1;
            }
            if($("#AddressState").val() == "") {
                $("#stateInput").addClass("error");
                $("#stateError").addClass("empty");
                $("#AddressState").focus();
                flag = 1;
            }
            /*if(!($("#AddressBilling").is(":checked")) && !($("#AddressDelivery").is(":checked"))) {
                $("#checkError").addClass("empty");
                $("#AddressBilling").focus();
                flag = 1;
            }*/
            
            $(".empty").css('margin-top','-10px');
            $(".empty").css('text-align','right');
            $(".empty").css('font-size','10px');
            $(".error").addClass("has-error");
            $(".empty").show();

            if(flag == 1)
                return false
            else
                return true;             
        }

        function clickSearchAddress()
        {
            $("#addressesList").html('');
            var key = "AIzaSyCRb9Wxzl1l8omtJELsQrRvKZ5d4bgdz3A";
            var pluginUrl = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=";
            var params = "", newAddress = "";
            
            var number = $("#AddressStreetNo").val();
            var street = $("#AddressStreet").val();
            var suburb = $("#AddressSuburb").val();
            var city = $("#AddressCity").val();
            var state = $("#AddressState").val();
            var zip = $("#AddressZip").val();
            var country = $("#AddressCountry").val();
            
            if(number != "")
                params += "+" + number;
            if(street != "")
                params += "+" + street;
            if(suburb != "")
                params += "+" + suburb;
            if(city != "")
                params += "+" + city;
            if(state != "")
                params += "+" + state;
            if(zip != "")
                params += "+" + zip;
            if(country != "")
                params += "+" + country;
            
            $("#addressContent").show();
                                
            $.ajax({
                url: pluginUrl + params,
                dataType: "json",
                success: function(data)
                {
                    var addressesList = data.results
                    $(addressesList).each( function(i,address) { 
                        console.log(address.formatted_address);                        
                        if(address.address_components[5] != undefined)
                        {
                            newAddress = '<div number="' + address.address_components[0].long_name + '" street="' + address.address_components[1].long_name + '" suburb="' + address.address_components[2].long_name + '" city="' + address.address_components[3].long_name + '" state="' + address.address_components[4].long_name + '" country="' + address.address_components[5].long_name + '" href="" class="list-group-item" style="cursor:default">' +
                                                '<span class="badge btn-success addressElement" style="cursor:pointer"><i class="fa fa-check"></i></span>'+
                                                '<p class="list-group-item-text">' + address.formatted_address + '</p>' +
                                            '</div>';
                            $("#addressesList").append(newAddress);                            
                        }
                    });
                    $("#addressesList").show();
                    $(".addressElement").click(function() {
                        //Se llenan los campos del address con el seleccionado
                        $("#AddressStreetNo").val($(this).parent().attr("number"));
                        $("#AddressStreet").val($(this).parent().attr("street"));
                        $("#AddressSuburb").val($(this).parent().attr("suburb"));
                        $("#AddressCity").val($(this).parent().attr("city"));
                        $("#AddressState").val($(this).parent().attr("state"));
                        $("#AddressCountry").val($(this).parent().attr("country"));
                        $("#AddressDelivery").prop("checked", true);
                        saveAddress();
                    });
                    
                },
                error: function (data) 
                {
                    alert("error 0: " + data);
                }
            });
        }
    </script>
