<!-- Interactive Block -->
<div class="block">
    <div class="block-content">    
        <div id="gmap" style="height: 550px;"></div>
        <!--<iframe src="" width="100%" height="450" frameborder="0" style="border:0" id="mapFrame"></iframe>        -->
    </div>
</div>

<script>
    
    function getYouCurrentLocation()
    {
        // Try HTML5 geolocation
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(function(position)
            {
                var latlng = new google.maps.LatLng(position.coords.latitude,
                    position.coords.longitude);
                    //alert(latlng);
                    var myOptions = {
                        zoom: 14,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        }
                    };
                    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
                    google.maps.event.trigger(map, 'resize');

                    //google.maps.event.addListener(map, 'click', function(e) { google.placeMarker(e.latLng, map); });
                }, function()
                {
                    //handleNoGeolocation(true);
                });
            } 
       else 
       {

       }
    }


    function initSearch()
    {
        var formParams = getFormParamsToSearch();
        searchInGMaps(formParams);
    }
        
    function getFormParamsToSearch()
    {

        var vals = $('#AddressAddForm').serializeArray();

        var paramsToSearch = "";
        for (var index = 0; index < vals.length; index++)
        {
            if ('_method' !== vals[index].name)
            {
                paramsToSearch += ('' === vals[index].value ? '' : vals[index].value + ',');
            }
            if ('data[Address][country]' === vals[index].name)
            {
                break;
            }
        }

        return paramsToSearch;
    }
        
    function searchInGMaps(addressID)
    {
        var key = "AIzaSyCRb9Wxzl1l8omtJELsQrRvKZ5d4bgdz3A";
        var pluginUrl = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=";
        
        var number = $("#numAddress" + addressID).text();
        var street = $("#strAddress" + addressID).text();
        var suburb = $("#subAddress" + addressID).text();
        var city = $("#citAddress" + addressID).text();
        var state = $("#staAddress" + addressID).text();
        
        params = number + "+" + street.replace(" ","+") + ",+" + suburb.replace(" ","+") + ",+" + city.replace(" ","+") + ",+" + state.replace(" ","+") + "&key=" + key;
        
        
        //alert(pluginUrl + params);
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
         new GMaps({
               div: '#gmap',
               lat: lat,
               lng: lng,
               zoom: 14,
               disableDefaultUI: true,
               scrollwheel: true
           }).addMarkers([
               {
                   lat: lat,
                   lng: lng,
                   title: 'Find Us',
                   infoWindow: {content: '<strong>Company Address &amp; Info</strong>'},
                   animation: google.maps.Animation.DROP
               }
           ]);    
           
           $("#gmap").css("height","500px");
           $("#gmap").css("width","516px");
    }
</script>