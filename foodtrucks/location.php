<!DOCTYPE html>
<html>
<body>
	<form  method="get" enctype="multipart/form-data" action="locationget">
<input type="checkbox" id="loc" value="loc" onclick="getLocation()">share my location<br>
<input id="MyLocation" name="MyLocation" hidden="true"></input>

<button>Try It</button>
</form>
<script>
var x = document.getElementById("MyLocation");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            // Success function
            showPosition, 
            // Error function
            null, 
            // Options. See MDN for details.
            {
               enableHighAccuracy: true,
               timeout: 5000,
               maximumAge: 0
            });
    } else { 
        x.value = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.value="Latitude: " + position.coords.latitude + 
    " Longitude: " + position.coords.longitude;  
}
</script>

</body>
</html>

