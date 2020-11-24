function getLocation(callback) {
    if (navigator.geolocation) {
        var lat_lng = navigator.geolocation.getCurrentPosition(function(position){
        // console.log(position);
          var user_position = {};
          user_position.lat = position.coords.latitude; 
          user_position.lng = position.coords.longitude; 
          callback(user_position);
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: 24.390270,
    lng: 44.458569
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });



getLocation(function(lat_lng){




  // Get element references
  var confirmBtn = document.getElementById('confirmPosition');
  var onClickPositionView = document.getElementById('onClickPositionView');
  var onIdlePositionView = document.getElementById('onIdlePositionView');
  var map = document.getElementById('map');
  var shoplat=document.getElementById('shoplat');
  var shoplong=document.getElementById('shoplong');

  // Initialize LocationPicker plugin
  if(typeof lat_lng.lat!=='undefined'&&typeof lat_lng.lng!=='undefined'){
  var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: lat_lng.lat,
    lng: lat_lng.lng
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });
}else{

var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: 24.390270,
    lng: 44.458569
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });



}
  // Listen to button onclick event
 

  // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
  google.maps.event.addListener(lp.map, 'idle', function (event) {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    
    shoplat.value =  location.lat ;
    shoplong.value =  location.lng ;
  });

});




  // Listen to button onclick event
  

  // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
  google.maps.event.addListener(lp.map, 'idle', function (event) {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    
    shoplat.value =  location.lat ;
    shoplong.value =  location.lng ;
  });
navigator.permissions.query({name:'geolocation'}).then(function(result) {
  if (result.state === 'granted') {
    showMap();
  } else if (result.state === 'prompt') {
    showButtonToEnableMap();
  }
  // Don't do anything if the permission was denied.
});
