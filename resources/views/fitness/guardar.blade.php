<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"/>

<div class="p-2">

    <div class="md:items-center mb-6 pt-20">
        <h2 class="text-center block w-full">Inicia tu actividad física</h2>
        <button onclick="goBack()" class="verde-lima-bg text-white py-2 px-4 ml-20 border border-gray-400 rounded shadow">
            <img src="/images/back-arrow-svgrepo-com.svg" alt="" class="inline-flex w-4 mr-2">
            Volver
        </button>
    
        <script>
            function goBack() {
                window.history.back();
            }
        </script> 
        <p class="md:w-1/2 w-full text-center mx-auto my-3">
            Recuerda que la aplicación preguntará eventualmente por tu ubicación para registrar tu actividad fisica y/o desplazamiento
        </p>
        @if ($detalle->tipo == "gps")
            <p class="md:w-1/2 w-full text-center mx-auto mt-3">
                <button onclick="geoFindMe()" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Obtener mi ubicación</button>
            </p>
            <form class="w-full max-w-lg mx-auto my-5" action="/fitness/posicion" method="POST" >
                @csrf
                                
                <div class="md:flex md:items-center mb-6">
                    
                    <div class="md:w-2/3 hidden">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-4 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="valorlat" name="lat_inicial" type="text" placeholder="Lat.">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="valorlong" name="long_inicial" type="text" placeholder="Long.">
                        <input type="text" class="hidden" value="{{$detalle->id}}" name="evento_id">
                    </div>
                </div>
                
                <p class="md:w-1/2 w-full text-center mx-auto my-3">
                    <button type="submit" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Guardar</button>
                </p>
            </form>
        @else
        <div class="bg-white shadow-md rounded my-6 w-2/3 mx-auto"> 
            <p class="p-5">
                <strong>Realiza tu actividad fisica con tu celular y la web abierta para registrar el movimiento</strong>
            </p>
        </div>
        @endif
        <p class="md:w-1/2 w-full text-center mx-auto my-3">
            <a href="{{route ('fitness.finalizar')}}" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Cerrar registro</a>
        </p>
        <div id="map"  class="md:w-1/2 w-full text-center mx-auto my-3"></div>
        
    </div>

    

    
    
    
    
</div>
  

<script>

        getLocation = () => {
            if (navigator.geolocation) {
                naviagtor.geolocation.watchPosition(postion => {
                console.log(`Latitude: ${position.coords.latitude} <br>
                Longitude: ${position.coords.longitude}` );
            });
            } else {
                console.log("Geolocation is not supported by this browser. "); 
            }
        }


    function geoFindMe() {        
        var output1 = document.getElementById("valorlat");
        var output2 = document.getElementById("valorlong");

        if (!navigator.geolocation){
            output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
            return;
        }

        function success(position) {
            var latitude  = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            document.getElementById("valorlat").value = latitude ;
            document.getElementById("valorlong").value = longitude;

            var mapsipe = L.map('map').
            setView([latitude, longitude], 
            15); //[38.6202, -0.5731] es la latitud y longitud de la zona que queremos mostrar, en nuestro caso Ibi 
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://cloudmade.com">CloudMade</a>',
                maxZoom: 18
            }).addTo(mapsipe);
            var marker = L.marker([latitude, longitude]).addTo(mapsipe);
            marker.bindPopup("<b>Hola!</b><br>Inicias recorrido aquí").openPopup();
            getLocation = () => {
                if (navigator.geolocation) {
                    naviagtor.geolocation.watchPosition(postion => {
                    console.log(`Latitude: ${position.coords.latitude} <br>
                    Longitude: ${position.coords.longitude}` );
                });
                } else {
                    console.log("Geolocation is not supported by this browser. "); 
                }
            }
        };

        function error() {
            output.innerHTML = "Unable to retrieve your location";
        };
        

        navigator.geolocation.getCurrentPosition(success, error);

       
    }


</script>
</x-app-layout>