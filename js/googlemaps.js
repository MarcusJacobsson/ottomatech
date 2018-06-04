/**
 * Created by Marcus Jacobsson on 2015-01-13.
 */

function initialize() {
    var map_canvas = document.getElementById('map_canvas');
    var center = new google.maps.LatLng(55.544511, 13.096768)
    var map_options = {
        center: center,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(map_canvas, map_options)

    var marker = new google.maps.Marker({
        position: center,
        map: map,
        title: 'OttoMaTech'
    });
}
google.maps.event.addDomListener(window, 'load', initialize);