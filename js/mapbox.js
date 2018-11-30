var lat,long;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(start);
    }
    else { console.log("O seu navegador não suporta Geolocalização."); }
}


function start(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;

    mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FycmlyaWJlaXJvIiwiYSI6ImNqb29tMHltaTA0cXczcHFzaWprejRpbTQifQ.xpzFIs7SZxLTBgCX77S_Zg';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [long, lat], // starting position
        zoom: 15 // starting zoom
    });
}

getLocation();




