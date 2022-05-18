@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')    
    @if(Auth::user()->hasRole('admin')) 

        @if($errors->any())
            <div class="mt-20">
                <strong class="text-red-500 pt-20">Hay problemas con los datos ingresados</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pt-10"></div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-left py-5">
                Actividad
            </h1>
            <div class="bg-white shadow-md">
                <form class="w-full my-5 px-5 py-5" action="{{ route('actividades.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4 text-xl">Nueva actividad</label>
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4">Seleccione el evento relacionado</label>                        
                        <input type="text" id="search" name="search" placeholder="Seleccione un evento de la lista" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" />
                        <input type="text" id="search2" name="evento" placeholder="Id Evento" class="form-control identificador" />
                    </div>
                    


                    <div class="py-3"></div>
                    <div class="md:flex md:items-center mb-6">                                          
                      <div class="w-full">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="titulo" type="text" placeholder="Ingresar título de la actividad" value={{ old('titulo') }}>
                      </div>
                    </div>
                                               
                    <div class="md:flex">

                        <div class="w-1/2 pr-3">
                            <label for="datepicker" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Fecha de inicio de la actividad</label>
                            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                                <div class="mx-auto  py-2">
                                    <div class="mb-5 w-full">                                                            
                                        <div class="relative">
                                        <input type="hidden" name="fecha_inicio" x-ref="date">
                                        <input 
                                            type="text"
                                            readonly
                                            x-model="datepickerValue"
                                            @click="showDatepicker = !showDatepicker"
                                            @keydown.escape="showDatepicker = false"
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100"
                                            placeholder="Seleccionar fecha">
                
                                            <div class="absolute top-0 right-0 px-3 py-2">
                                                <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                
                
                                            <!-- <div x-text="no_of_days.length"></div>
                                            <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                            <div x-text="new Date(year, month).getDay()"></div> -->
                
                                            <div 
                                                class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
                                                style="width: 17rem" 
                                                x-show.transition="showDatepicker"
                                                @click.away="showDatepicker = false">
                
                                                <div class="flex justify-between items-center mb-2">
                                                    <div>
                                                        <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                        <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                    </div>
                                                    <div>
                                                        <button 
                                                            type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                            :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                            :disabled="month == 0 ? true : false"
                                                            @click="month--; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                            </svg>  
                                                        </button>
                                                        <button 
                                                            type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                            :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                            :disabled="month == 11 ? true : false"
                                                            @click="month++; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                            </svg>									  
                                                        </button>
                                                    </div>
                                                </div>
                
                                                <div class="flex flex-wrap mb-3 -mx-1">
                                                    <template x-for="(day, index) in DAYS" :key="index">	
                                                        <div style="width: 14.26%" class="px-1">
                                                            <div
                                                                x-text="day" 
                                                                class="text-gray-800 font-medium text-center text-xs"></div>
                                                        </div>
                                                    </template>
                                                </div>
                
                                                <div class="flex flex-wrap -mx-1">
                                                    <template x-for="blankday in blankdays">
                                                        <div 
                                                            style="width: 14.28%"
                                                            class="text-center border p-1 border-transparent text-sm">
                                                        </div>
                                                    </template>	
                                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                                        <div style="width: 14.28%" class="px-1 mb-1">
                                                            <div
                                                                @click="getDateValue(date)"
                                                                x-text="date"
                                                                class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                                            ></div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                                            
                                </div>
                            </div>
                        </div>
                        
        
                        <div class="w-1/2 pl-3">
                            <label for="datepicker2" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Fecha de finalización de la actividad</label>
                            <div x-data="app2()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                                <div class="mx-auto  py-2">
                                    <div class="mb-5 w-full">                                                            
                                        <div class="relative">
                                        <input type="hidden" name="fecha_fin" x-ref="date">
                                        <input 
                                            type="text"
                                            readonly
                                            x-model="datepickerValue"
                                            @click="showDatepicker = !showDatepicker"
                                            @keydown.escape="showDatepicker = false"
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100"
                                            placeholder="Seleccionar fecha">
                
                                            <div class="absolute top-0 right-0 px-3 py-2">
                                                <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                
                
                                            <!-- <div x-text="no_of_days.length"></div>
                                            <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                            <div x-text="new Date(year, month).getDay()"></div> -->
                
                                            <div 
                                                class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
                                                style="width: 17rem" 
                                                x-show.transition="showDatepicker"
                                                @click.away="showDatepicker = false">
                
                                                <div class="flex justify-between items-center mb-2">
                                                    <div>
                                                        <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                        <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                    </div>
                                                    <div>
                                                        <button 
                                                            type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                            :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                            :disabled="month == 0 ? true : false"
                                                            @click="month--; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                            </svg>  
                                                        </button>
                                                        <button 
                                                            type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                            :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                            :disabled="month == 11 ? true : false"
                                                            @click="month++; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                            </svg>									  
                                                        </button>
                                                    </div>
                                                </div>
                
                                                <div class="flex flex-wrap mb-3 -mx-1">
                                                    <template x-for="(day, index) in DAYS" :key="index">	
                                                        <div style="width: 14.26%" class="px-1">
                                                            <div
                                                                x-text="day" 
                                                                class="text-gray-800 font-medium text-center text-xs"></div>
                                                        </div>
                                                    </template>
                                                </div>
                
                                                <div class="flex flex-wrap -mx-1">
                                                    <template x-for="blankday in blankdays">
                                                        <div 
                                                            style="width: 14.28%"
                                                            class="text-center border p-1 border-transparent text-sm">
                                                        </div>
                                                    </template>	
                                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                                        <div style="width: 14.28%" class="px-1 mb-1">
                                                            <div
                                                                @click="getDateValue(date)"
                                                                x-text="date"
                                                                class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                                            ></div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                                            
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex">
                        <div class="w-1/2 pr-3">
                            <div class="w-full">
                                <label class="block text-gray-500 font-bold md:text-left  md:mb-0 pr-4">Hora inicio</label>
                            </div>
                            <!-- component -->
                            <div class="mt-2 w-40">
                                <div class="flex">
                                <select name="hours" class="bg-transparent  appearance-none outline-none" value={{ old('hours') }}>
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <span class="text-xl mx-3">:</span>
                                <select name="minutes" class="bg-transparent  appearance-none outline-none mr-4" value={{ old('minutes') }}>
                                    <option value="00" selected="selected">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                                <select name="ampm" class="bg-transparent  appearance-none outline-none" value={{ old('ampm') }}>
                                    <option value="AM" selected="selected">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 pl-3">
                            <div class="w-full">
                                <label class="block text-gray-500 font-bold md:text-left  md:mb-0 pr-4">Hora fin</label>
                            </div>
                            <!-- component -->
                            <div class="mt-2 w-40">
                                <div class="flex">
                                <select name="hours_end" class="bg-transparent  appearance-none outline-none" value={{ old('hours_end') }}>
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <span class="text-xl mx-3">:</span>
                                <select name="minutes_end" class="bg-transparent  appearance-none outline-none mr-4" value={{ old('minutes_end') }}>
                                    <option value="00" selected="selected">00</option>                                    
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                                <select name="ampm_end" class="bg-transparent  appearance-none outline-none" value={{ old('ampm_end') }}>
                                    <option value="AM" selected="selected">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"></div>
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2">
                            Descripción:
                        </label>
                    </div>
                    
                    <div class="w-full">
                        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="descripcion"  cols="30" rows="7">{{ old('descripcion') }}</textarea>                      
                    </div>
        
                    <div class="py-3"></div>
                                                                                                    

                    
        
                    <div class="md:flex items-center">                      
                      <div class="w-full py-10">
                        <button class="shadow verde-lima-bg  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                          Guardar
                        </button>
                      </div>
                    </div>
                </form>
            </div>
            <button onclick="goBack()" class="verde-lima-bg text-white py-2 px-4 border border-gray-400 rounded shadow">
                <img src="/images/back-arrow-svgrepo-com.svg" alt="" class="inline-flex w-4 mr-2">
                Volver
            </button>
    
                         
        </div>
        
        <script>
            const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'];
            const DAYS = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
        
            function app() {
                return {
                    showDatepicker: false,
                    datepickerValue: '',
        
                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        
                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    },
        
                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
        
                        return today.toDateString() === d.toDateString() ? true : false;
                    },
        
                    getDateValue(date) {
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();
        
                        this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ (selectedDate.getMonth()+1)).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
        
                        console.log(this.$refs.date.value);
        
                        this.showDatepicker = false;
                    },
        
                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
        
                        // find where to start calendar day of week
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for ( var i=1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }
        
                        let daysArray = [];
                        for ( var i=1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }
        
                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }
            }

            function app2() {
                return {
                    showDatepicker: false,
                    datepickerValue: '',
        
                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        
                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    },
        
                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
        
                        return today.toDateString() === d.toDateString() ? true : false;
                    },
        
                    getDateValue(date) {
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();
        
                        this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ (selectedDate.getMonth()+1)).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
        
                        console.log(this.$refs.date.value);
        
                        this.showDatepicker = false;
                    },
        
                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
        
                        // find where to start calendar day of week
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for ( var i=1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }
        
                        let daysArray = [];
                        for ( var i=1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }
        
                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }
            }
            function goBack() {
                window.history.back();
            }
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
        </script>
        <script>
            var route = "{{ url('/autocomplete-search') }}";
            var idevento;
            $('#search').typeahead({
                source: function (query, process) {
                    return $.get(route, {
                        query: query
                    }, function (data) {
                        return process(data);
                    });
                },
                displayText: function(item) {
                    return item.titulo
                },
                afterSelect: function(item) {
                    idevento = item.id;
                    $( "#search2" ).val(idevento);
                }
            });
            
        </script>
    @endif
@endsection