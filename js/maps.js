 
 var companylocation = new google.maps.LatLng(53.06822,-1.250424);
  var parliament = new google.maps.LatLng(53.06822,-1.250424);
  var marker;
  var map;
 
  function initialize() {
    var mapOptions = {
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: companylocation
    };
 
    map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
          
    marker = new google.maps.Marker({
      map:map,
      draggable:true,
      animation: google.maps.Animation.DROP,
      position: parliament
    });
    google.maps.event.addListener(marker, 'click', toggleBounce);
  }
 
  function toggleBounce() {
 
    if (marker.getAnimation() != null) {
      marker.setAnimation(null);
    } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
    }
  }