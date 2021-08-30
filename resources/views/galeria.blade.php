<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

<div class="p-2">

    
    @if ($success != null)
        <div class="alert-success text-center py-5">
            <p class="verde-lima-color">{{ $success }}</p>
            @php
                header("refresh: 0");
            @endphp
        </div>
    @endif



    <!-- component -->
    <div class="md:w-1/2 w-full mx-auto mt-4  rounded">
        <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
        <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Galeria</a></li>
        <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Subir foto</a></li>      
        </ul>

        <!-- Tab Contents -->
        <div id="tab-contents">
        <div id="first" class="p-4">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @if ($contenidos != '' || $contenidos != null )

                    @foreach ($contenidos as $contenido)
                        <div class="col-auto">
                            <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block p-2 mx-auto">
                        </div>
                    @endforeach
                    
                @endif                
            </div>    
                
            @if ($contenidos != '' || $contenidos != null )
                <div class="pager">
                    {{ $contenidos->links() }}
                </div>
            @endif 
            </div>
            <div id="second" class="hidden p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Hay problemas con los datos ingresados</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        
                <form class="w-full my-5 px-5 py-5" action="/galeria" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <h2 class="text-center">Sube tus fotos a la galería</h2>
                    </div>
                    
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Titulo:
                        </label>
                        </div>
                    <div class="w-full">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="titulo" type="text" placeholder="Ingresar título">
                    </div>
                    
                    <div class="py-3"></div>
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name3">
                            Imagen:
                        </label>
                    </div>

                    <div class="w-full">
                        <div class="overflow-hidden relative w-64 mt-4 mb-4 upload-custom">
                            <button class=" azul-andes-bg  text-white font-bold py-2 px-4 w-full inline-flex items-center rounded">
                                <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                </svg>
                                <span class="ml-2">Sube tus archivos</span>
                            </button>
                            <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" type="file" name="imagen" @change="fileName" multiple>
                            @error('imagen')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>                                            
                    </div>
                    

                    <div class="md:flex items-center">                      
                        <div class="w-full py-10">
                            <button class="shadow verde-lima-bg  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Guardar
                            </button>
                        </div>
                    </div>
                </form> 
            </div>      
        </div>
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