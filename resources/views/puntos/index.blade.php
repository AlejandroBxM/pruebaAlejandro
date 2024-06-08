@include('header')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mapa con OpenStreetMap y Leaflet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #map {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        $(document).ready(function() {
            $("#content").load("content.html");
       
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Crear un mapa
        var map = L.map('map').setView([90.505, -0.09], 13); // Coordenadas iniciales y nivel de zoom

        // Añadir un tile layer de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        console.log('antes de ');
        $.ajax({
                url: "{{ route('puntosgps.buscarMarcadores') }}" , // Reemplaza con la URL correcta
                headers: {'X-CSRF-TOKEN': csrfToken},
                method: 'post',
                success: function(data) {
                    console.log(data);
                    data.forEach(element => {
                        console.log(element);
                        L.marker([element.latitud,element.longitud],10).addTo(map)
            .bindPopup('Un marcador en Londres.')
            .openPopup();      
                    });
                },
                error: function(error) {
                    alert('romero alejo');
                    console.error('Error al obtener los datos de los marcadores:', error);
                }
            });
        });
        console.log('antesdespues de de ');
   
    </script>
</body>

</html>