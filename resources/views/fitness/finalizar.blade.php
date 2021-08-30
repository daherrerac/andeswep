<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"/>

<div class="p-2">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-center block w-full">Finaliza tu registro</h2>
        <p class="md:w-1/2 w-full text-center mx-auto my-3">
            Recuerda que la aplicación preguntará eventualmente por tu ubicación para registrar tu actividad fisica y/o desplazamiento
        </p>
        
        <p class="md:w-1/2 w-full text-center mx-auto my-3">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Hay problemas con los datos ingresados</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
            <button onclick="geoFindMe()" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Obtener mi ubicación</button>
        </p>
        
        <form class="w-full max-w-lg mx-auto my-5" action="/fitness/terminar" method="POST" >
            @csrf
                            
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-2/3">
                    <label for="">Datos finales</label>
                </div>
                <div class="md:w-2/3">
                    <label for="" >Lat. Inicial: <span id="latold">{{ $contenidos->lat_inicial}}</span></label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-4 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="valorlat" name="lat_final" type="text" placeholder="Lat.">
                    <label for="" >Long. Inicial <span id="longold">{{ $contenidos->long_inicial}}</span></label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="valorlong" name="long_final" type="text" placeholder="Long.">
                    <input class="hidden" id="id" name="id" type="text" value="{{ $contenidos->id}}">
                    <input class="hidden" id="distancia" name="distancia" type="text" value="">                    
                </div>
            </div>
            
            <p class="md:w-1/2 w-full text-center mx-auto my-3">
                <button type="submit" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Guardar</button>
            </p>
        </form>      

        <span id="dato"></span>
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
        var output3 = document.getElementById("distancia");

        if (!navigator.geolocation){
            output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
            return;
        }

        function success(position) {
            var latitude  = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latitudeold;
            var longitudeold;
            
            document.getElementById("valorlat").value = latitude ;
            document.getElementById("valorlong").value = longitude;
            latitudeold =  document.getElementById("latold").textContent;
            longitudeold = document.getElementById("longold").textContent;
            console.log(latitudeold);

            Number.prototype.toRad = function() {
                return this * Math.PI / 180;
            }

            var lat2 = latitude; 
            var lon2 = longitude; 
            var lat1 = parseFloat(latitudeold); 
            var lon1 = parseFloat(longitudeold); 

            var R = 6371; // km 
            //has a problem with the .toRad() method below.
            var x1 = lat2-lat1;
            var dLat = x1.toRad();  
            var x2 = lon2-lon1;
            var dLon = x2.toRad();  
            var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                            Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
                            Math.sin(dLon/2) * Math.sin(dLon/2);  
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = R * c; 
            console.log(d);
            document.getElementById("distancia").value = d;
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

    window.addEventListener('load', inicio, false);

    function inicio() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(mostrarCoordenada);
        } else {
          alert('El navegador no dispone la capacidad de geolocalización');
        }
    }
  
    function mostrarCoordenada(posicion) {
        document.getElementById('dato').innerHTML='Latitud:'+
           posicion.coords.latitude+
           '<br> Longitud:'+posicion.coords.longitude+
           '<br>Exactitud:'+posicion.coords.accuracy;
    }


</script>
</x-app-layout>