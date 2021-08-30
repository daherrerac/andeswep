<x-app-layout>
    

    <div class="max-w-7xl mx-auto sm:px-10 lg:px-8 pt-20">
        <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg ">


            @if ($datos > 0)
                @foreach ($contenidos as $contenido)
                        
                    <div class="grid grid-cols-4 gap-2 listado py-5">
                        <div class="col-auto">
                            <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block mx-auto p-2 rounded">
                        </div>
                        <div class="col-span-2 ">
                            <strong class="block verde-andes">{{ $contenido->titulo }}</strong>
                            <span class="block py-3">{!! \Str::limit($contenido->descripcion, 50) !!}</span>
                        </div>
                        <div class="col-auto my-auto text-right">
                            <a href="{{ route ('detalle.evento', $contenido->id)}}" class="block mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 verde-andes block mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a> 
                        </div>
                    </div>                                                                                    
                    
                @endforeach
            @else
                <h1 class="text-left py-10 px-5">
                    No tiene eventos registrados
                </h1>
            @endif
            
                
        
            


            <div class="row nav-pagination">
                <div class="offset-lg-5 col-lg-1 col-2 offset-4 ">
                    {{-- {{ $contenido->links() }} --}}
                </div>
            </div>

        </div>
        
        <div class="py-5"></div>
        <button onclick="goBack()" class="verde-lima-bg text-white py-2 px-4 border border-gray-400 rounded shadow">
            <img src="/images/back-arrow-svgrepo-com.svg" alt="" class="inline-flex w-4 mr-2">
            Volver
        </button>
        
        <script>
            function goBack() {
                window.history.back();
            }

                        // Step 1: Get user coordinates
            function getCoordintes() {
                var options = {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                };
            
                function success(pos) {
                    var crd = pos.coords;
                    var lat = crd.latitude.toString();
                    var lng = crd.longitude.toString();
                    var coordinates = [lat, lng];
                    console.log(`Latitude: ${lat}, Longitude: ${lng}`);
                    getCity(coordinates);
                    return;
            
                }
            
                function error(err) {
                    console.warn(`ERROR(${err.code}): ${err.message}`);
                }
            
                navigator.geolocation.getCurrentPosition(success, error, options);
            }
            
            // Step 2: Get city name
            function getCity(coordinates) {
                var xhr = new XMLHttpRequest();
                var lat = coordinates[0];
                var lng = coordinates[1];
            
                // Paste your LocationIQ token below.
                xhr.open('GET', "
            https://us1.locationiq.com/v1/reverse.php?key=YOUR_PRIVATE_TOKEN&lat=" +
                lat + "&lon=" + lng + "&format=json", true);
                xhr.send();
                xhr.onreadystatechange = processRequest;
                xhr.addEventListener("readystatechange", processRequest, false);
            
                function processRequest(e) {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        var city = response.address.city;
                        console.log(city);
                        return;
                    }
                }
            }
            
            getCoordintes();
        </script>
    </div>
       

</x-app-layout>




