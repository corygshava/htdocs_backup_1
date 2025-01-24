var curpos = new Object;
var map,markers = [undefined,undefined];
var requesttype = 0;
var pointsdistance = 0;

const pointA = { lat: 23.456, lng: 34.567 };
const pointB = { lat: 12.345, lng: 45.678 };
var distance = calculateDistance(pointA, pointB);

curpos.lat = 0;
curpos.long = 0;


function setupmap(id){
    // Initialize the map and set the initial view
    var map = L.map(id).setView([curpos.lat, curpos.long], 13);

    // Add a tile layer (you can replace the URL with your preferred map source)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a click event listener to the map
    map.on('click', function(e) {
        // Log the clicked location's latitude and longitude to the console
        console.log('You clicked at latitude: ' + e.latlng.lat + ', longitude: ' + e.latlng.lng);
    });
}

function initializeMapForInput() {
    console.log("setting up map");

    if (!map) {
        getCurrentLocation();
        map = L.map('themap').setView([curpos.lat, curpos.long], 5); // Initial map view, change coordinates and zoom level as needed
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); // Add a tile layer (you can use any tile provider)

        // Add a click listener to the map
        map.on('click', function (e) {
            var latitude = e.latlng.lat;
            var longitude = e.latlng.lng;

            makecoord(latitude,longitude);
        });

        console.log("map has been set up");
    } else {
        console.log("map already exists");
    }
}

function makecoord(lat,long) {
    // var markerIcon = requesttype === 0 ? 'purple-icon.png' : 'blue-icon.png'; // Change marker colors as needed
    var tooltipText = requesttype == 0 ? 'pickup point' : 'chosen destination';
    var mycol = requesttype == 0 ? 'blue' : 'orange';

    // Check if there is a marker on the map
    if (markers[requesttype] == undefined) {
        // If no marker exists, create a new one at the clicked location
        var marker = L.marker([lat, long]).addTo(map)
        	.bindPopup(tooltipText)
        	.openPopup();

        marker.setTooltipContent(tooltipText);
        marker.color = mycol;
        markers[requesttype] = marker;
    } else {
        // If a marker exists, modify its position to the clicked location
        markers[requesttype].setLatLng([lat, long]);
        markers[requesttype].openPopup();
    }

    // Update global variables
    dummy.value = lat + ',' + long;
    curmapinput.value = lat + ',' + long;

    calculateDistancesAndAlert(markers);
    showdistance();
}

function getCurrentLocation(){
    if ("geolocation" in navigator) {
        // Geolocation is available in this browser
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            console.log("Latitude: " + latitude);
            console.log("Longitude: " + longitude);

            curpos.lat = latitude;
            curpos.long = longitude;
        }, function (error) {
        // Handle any errors that may occur when trying to retrieve the location
        switch (error.code) {
            case error.PERMISSION_DENIED:
            console.error("User denied the request for Geolocation.");
            break;
            case error.POSITION_UNAVAILABLE:
            console.error("Location information is unavailable.");
            break;
            case error.TIMEOUT:
            console.error("The request to get user location timed out.");
            break;
            case error.UNKNOWN_ERROR:
            console.error("An unknown error occurred.");
            break;
        }
        });
    } else {
        // Geolocation is not available in this browser
        console.error("Geolocation is not available in this browser.");
    }
}

function trackuser() {
	// Check if the browser supports geolocation
	if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function (position) {
	        var userLat = position.coords.latitude;
	        var userLng = position.coords.longitude;

	        // Set the map view to the user's location
	        map.setView([userLat, userLng], 13);

	        makecoord(userLat,userLng);
	    }, function () {
	        alert("Geolocation failed or was blocked.");
	    });
	} else {
	    alert("Geolocation is not supported by your browser.");
	}
}

function calculateDistance(point1, point2) {
    const earthRadius = 6371; // Earth's radius in kilometers

    function toRadians(degrees) {
        return degrees * (Math.PI / 180);
    }

    const lat1 = toRadians(point1.lat);
    const lon1 = toRadians(point1.lng);
    const lat2 = toRadians(point2.lat);
    const lon2 = toRadians(point2.lng);

    const dLat = lat2 - lat1;
    const dLon = lon2 - lon1;

    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(lat1) * Math.cos(lat2) *
              Math.sin(dLon / 2) * Math.sin(dLon / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    distance = earthRadius * c;
    return distance;
}

function calculateDistancesAndAlert(markers) {
    let outxt = "";

    if (markers[0] == undefined || markers[1] == undefined) {
        return;
    }

    var distances = [];
    var lat1;var lng1;var lat2;var lng2;
    
    lat1 = markers[0].getLatLng().lat;
    lng1 = markers[0].getLatLng().lng;
    lat2 = markers[1].getLatLng().lat;
    lng2 = markers[1].getLatLng().lng;

    distances[0] = calculateDistanceBetweenPoints(lat1, lng1, lat2, lng2);

    outxt = `${distances[0]}km`;

    pointsdistance = distances[0];
}

function calculateDistanceBetweenPoints(lat1, lng1, lat2, lng2) {
    const earthRadius = 6371; // Earth's radius in kilometers

    function toRadians(degrees) {
        return degrees * (Math.PI / 180);
    }

    lat1 = toRadians(lat1);
    lng1 = toRadians(lng1);
    lat2 = toRadians(lat2);
    lng2 = toRadians(lng2);

    var dLat = lat2 - lat1;
    var dLng = lng2 - lng1;

    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1) * Math.cos(lat2) *
            Math.sin(dLng / 2) * Math.sin(dLng / 2);

    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    var distance = earthRadius * c;
    return distance;
}

function getCurrentLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var currentLocation = `(${latitude.toFixed(6)}, ${longitude.toFixed(6)})`;
            console.log("Current Location:", currentLocation);
            return currentLocation;
        }, function(error) {
            console.error("Error getting geolocation:", error);
            return "0,0";
        });
    } else {
        console.error("Geolocation is not available in this browser.");
        return "0,0";
    }
}
