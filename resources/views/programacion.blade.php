<x-app-layout>
    <div class="md:w-1/2  mx-auto mt-4  rounded pt-20">
    @if ($datos > 0)
        
        @if ($datos == 1)
            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50">
                    @foreach ($contenidos as $contenido)
                        <a id="default-tab" href="#first">{{ $contenido->fecha_inicio }}</a>
                    @endforeach
                    
                </li>                
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">
                    <h3>
                        {{ $contenido->titulo }}
                    </h3>
                    <p>
                        <strong>Descripción:</strong><br>
                        {{ $contenido->descripcion }}
                    </p>
                    <p>
                        <strong>Hora de inicio:</strong><br>
                        {{ $contenido->hora_inicio }}
                    </p>
                    <p>
                        <strong>Hora de finalización:</strong><br>
                        {{ $contenido->hora_fin }}
                    </p>
                </div>                
            </div>
        @else
            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50">
                    <a id="default-tab" href="#first"></a>                                        
                </li> 
                @foreach ($contenidos as $contenido)
                <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50">                    
                    <a  href="{{ "#".$contenido->titulo }}">{{ $contenido->fecha_inicio }}</a>                                        
                </li>                
                @endforeach
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">
                
                </div>
                @foreach ($contenidos as $contenido)
                    <div id="{{ $contenido->titulo }}" class="py-4 px-10">
                        <h3>
                            {{ $contenido->titulo }}
                        </h3>
                        <p>
                            <strong>Descripción:</strong><br>
                            {{ $contenido->descripcion }}
                        </p>
                        <p>
                            <strong>Hora de inicio:</strong><br>
                            {{ $contenido->hora_inicio }}
                        </p>
                        <p>
                            <strong>Hora de finalización:</strong><br>
                            {{ $contenido->hora_fin }}
                        </p>
                    </div> 
                @endforeach               
            </div>
        @endif

        
                        
        
    @else
        <h1 class="py-10">
            No tiene actividades registradas
        </h1>
    @endif

    </div>


    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {

                tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                if ("#" + tabContents.children[i].id === tabName) {
                    continue;
                }
                tabContents.children[i].classList.add("hidden");

            }
            e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
        });
        });

        document.getElementById("default-tab").click();

    </script>



</x-app-layout>