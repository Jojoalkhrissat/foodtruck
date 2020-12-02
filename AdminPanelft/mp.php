<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.5/leaflet.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=lI3pta3b3Si2yoUgQyaq0KNyTU1TuvAA"></script>

        <script type="text/javascript">
            window.onload = function() {
                var popup = L.popup();
                var geolocationMap = L.map('map', {
                    layers: MQ.mapLayer(),
                    center: [40.731701, -73.993411],
                    zoom: 12
                });

                function geolocationErrorOccurred(geolocationSupported, popup, latLng) {

                    popup.setLatLng(latLng);
                    popup.setContent(geolocationSupported ?
                            '<b>Error:</b> The Geolocation service failed.' :
                            '<b>Error:</b> This browser doesn\'t support geolocation.');
                    popup.openOn(geolocationMap);
                }


                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                       
                        var latLng = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                            
                        };
console.log(position);
                        popup.setLatLng(latLng);
                        popup.setContent(position.coords);
                        popup.openOn(geolocationMap);

                        geolocationMap.setView(latLng);
                    }, function() {
                        geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
                    });
                } else {
                    //No browser support geolocation service
                    geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
                }
            }

        </script>
    </head>

    <body style='border:0; margin: 0'>
        <div id='map' style='width: 100%; height:530px;'></div>
    </body>
</html>