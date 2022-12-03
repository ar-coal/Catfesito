function iniciarMap(){
    var coord = {lat:21.9835371 ,lng: -99.0135549};
    var map = new google.maps.Map(document.getElementById('mapa'),{
      zoom: 20,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}