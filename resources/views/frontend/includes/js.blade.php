{{-- Datapicker --}}
<script>
    $(function() {
    $('input[name="tanggal"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2010,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    });
</script>

{{-- Tambah data dana --}}
<script>
function addRowDana() {
    /* Declare variables */
    var elements, templateRow, rowCount, row, className, newRow, element;
    var i, s, t;

    /* Get and count all "tr" elements with class="row".    The last one will
     * be serve as a template. */
    if (!document.getElementsByTagName)
        return false; /* DOM not supported */
    elements = document.getElementsByTagName("tr");
    templateRow = null;
    rowCount = 0;
    for (i = 0; i < elements.length; i++) {
        row = elements.item(i);

        /* Get the "class" attribute of the row. */
        className = null;
        if (row.getAttribute)
            className = row.getAttribute('class')
        if (className == null && row.attributes) {    // MSIE 5
            /* getAttribute('class') always returns null on MSIE 5, and
             * row.attributes doesn't work on Firefox 1.0.    Go figure. */
            className = row.attributes['class'];
            if (className && typeof(className) == 'object' && className.value) {
                // MSIE 6
                className = className.value;
            }
        }

        /* This is not one of the rows we're looking for.    Move along. */
        if (className != "row_to_clone_dana")
            continue;

        /* This *is* a row we're looking for. */
        templateRow = row;
        rowCount++;
    }
    if (templateRow == null)
        return false; /* Couldn't find a template row. */

    /* Make a copy of the template row */
    newRow = templateRow.cloneNode(true);

    /* Change the form variables e.g. price[x] -> price[rowCount] */
    elements = newRow.getElementsByTagName("input");
    for (i = 0; i < elements.length; i++) {
        element = elements.item(i);
        s = null;
        s = element.getAttribute("name");
        if (s == null)
            continue;
        t = s.split("[");
        if (t.length < 2)
            continue;
        s = t[0] + "[" + rowCount.toString() + "]";
        element.setAttribute("name", s);
        element.value = "";
    }

    /* Add the newly-created row to the table */
    templateRow.parentNode.appendChild(newRow);
    return true;
}
</script>

{{-- Tambah data sales people --}}
<script>
    function addRow() {
        /* Declare variables */
        var elements, templateRow, rowCount, row, className, newRow, element;
        var i, s, t;

        /* Get and count all "tr" elements with class="row".    The last one will
         * be serve as a template. */
        if (!document.getElementsByTagName)
            return false; /* DOM not supported */
        elements = document.getElementsByTagName("tr");
        templateRow = null;
        rowCount = 0;
        for (i = 0; i < elements.length; i++) {
            row = elements.item(i);

            /* Get the "class" attribute of the row. */
            className = null;
            if (row.getAttribute)
                className = row.getAttribute('class')
            if (className == null && row.attributes) {    // MSIE 5
                /* getAttribute('class') always returns null on MSIE 5, and
                 * row.attributes doesn't work on Firefox 1.0.    Go figure. */
                className = row.attributes['class'];
                if (className && typeof(className) == 'object' && className.value) {
                    // MSIE 6
                    className = className.value;
                }
            }

            /* This is not one of the rows we're looking for.    Move along. */
            if (className != "row_to_clone")
                continue;

            /* This *is* a row we're looking for. */
            templateRow = row;
            rowCount++;
        }
        if (templateRow == null)
            return false; /* Couldn't find a template row. */

        /* Make a copy of the template row */
        newRow = templateRow.cloneNode(true);

        /* Change the form variables e.g. price[x] -> price[rowCount] */
        elements = newRow.getElementsByTagName("input");
        for (i = 0; i < elements.length; i++) {
            element = elements.item(i);
            s = null;
            s = element.getAttribute("name");
            if (s == null)
                continue;
            t = s.split("[");
            if (t.length < 2)
                continue;
            s = t[0] + "[" + rowCount.toString() + "]";
            element.setAttribute("name", s);
            element.value = "";
        }

        /* Add the newly-created row to the table */
        templateRow.parentNode.appendChild(newRow);
        return true;
    }
</script>

<script>
    $(document).ready(function(){
        $("#dataDana").on('click','.removeDana',function(){
            $(this).parent().parent().remove();
        });
    });
</script>
{{-- Map Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js'></script>


{{-- <script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid--').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script> --}}

{{-- <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script> --}}

<script>

     // please replace this with your own mapbox token!
    // var token = 'pk.eyJ1IjoicmltYmFib3JuZSIsImEiOiJja3Z5bjZrZGwwMWtyMnVvN2xqaWRwdWh4In0.xUbfIJAJn2vMBTd_IKDzTQ';
    // var mapboxUrl = 'https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}@2x?access_token=' + token;
    // var mapboxAttrib = 'Map data © <a href="http://osm.org/copyright">OpenStreetMap</a> contributors. Tiles from <a href="https://www.mapbox.com">Mapbox</a>.';
    // var mapbox = new L.TileLayer(mapboxUrl, {
    //         attribution: mapboxAttrib,
    //         tileSize: 512,
    //         zoomOffset: -1
    // });

    // var map = L.map('mapid', {
    //         tap: false, // ref https://github.com/Leaflet/Leaflet/issues/7255
    //         layers: [mapbox],
    //         center: [{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}],
    //         zoom: {{ config('leaflet.zoom_level') }},
    //         zoomControl: true
    //         }
    //     );
        // .setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

    // inisiasi mapbox
    L.mapbox.accessToken = 'pk.eyJ1IjoicmltYmFib3JuZSIsImEiOiJja3Z5bjZrZGwwMWtyMnVvN2xqaWRwdWh4In0.xUbfIJAJn2vMBTd_IKDzTQ';
    var map = L.mapbox.map('mapid')
                .setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }})
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'))
                .addControl(L.mapbox.geocoderControl('mapbox.places', {
                autocomplete: true
            }));

    // lokasi titik posisi
    L.control.locate().addTo(map);

    // legend. ukuran skala jarak peta
    L.control.scale({position: 'topright'}).addTo(map);

    // lisensi
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    })
    .addTo(map);

    // untuk group marker, tapi jika tidak pake circle
    // var markers = L.markerClusterGroup();

    // ngambil data
    // axios.get('https://honda-map.test/api/outlets', {
    //     headers: {
    //         'Access-Control-Allow-Origin' : '*',
    //         'Access-Control-Allow-Methods':'GET,PUT,POST,DELETE,PATCH,OPTIONS',
    //     }
    // })
    // .then(function (response) {
    //     var marker = L.geoJSON(response.data, {
    //         pointToLayer: function(geoJsonPoint, latlng, layer) {
    //             markerr  = L.marker(latlng).bindPopup('Dealer Tes');
    //             circle   = L.circle(latlng, {radius: 500, color: 'red', opacity:.5});
    //             return L.featureGroup([markerr, circle])
    //                     // .bindPopup(nama)
    //                     .addTo(map);
    //         }
    //     });
    //     markers.addLayer(marker);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });

    L.marker([-1.242292, 116.879625]).bindPopup('Dealer A').addTo(map);
    L.circle([-1.242292, 116.879625], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    L.marker([-1.252223, 116.851946]).bindPopup('Dealer B').addTo(map);
    L.circle([-1.252223, 116.851946], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    L.marker([-1.242223, 116.852946]).bindPopup('Dealer C').addTo(map);
    L.circle([-1.242223, 116.852946], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    L.marker([-1.239848, 116.916119]).bindPopup('Dealer D').addTo(map);
    L.circle([-1.239848, 116.916119], {radius: 500, color: 'red', opacity:.5}).addTo(map);
    // map.addLayer(marker);

    // tambah data manual
    // var markers = [
    //         [ -1.242292, 116.879625, "Dealer A" ],
    //      ];

    //      //Loop through the markers array
    //      for (var i=0; i<markers.length; i++) {

    //         var lon = markers[i][0];
    //         var lat = markers[i][1];
    //         var popupText = markers[i][2];

    //         // markerr  = L.marker(lat, lon).bindPopup('Dealer Tes');
    //         // circle   = L.circle(lat, lon, {radius: 500, color: 'red', opacity:.5});
    //         // L.featureGroup([markerr, circle])
    //         //             .bindPopup(popupText)
    //         //             .addTo(map);

    //          var markerLocation = new L.LatLng(lat, lon);
    //          var marker = new L.Marker(markerLocation);
    //          map.addLayer(marker);

    //         //  marker.bindPopup(popupText);

        //  }

    // untuk group marker, tapi jika tidak pake circle
    // map.addLayer(markers);


    // Tambah Data Marker
    var theMarker;

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        var popupContent = "Tandai Disini";
        // popupContent += '<br><a href="latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
</script>
