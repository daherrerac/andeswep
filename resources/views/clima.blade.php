<x-app-layout>
    
    <div class="max-w-7xl mx-auto py-5  lg:px-8">
        <div class="h-auto overflow-hidden pt-20">
            <div class="icon-container shadow-xl">                                  
                <div class="current block text-center w-full">
                    <div class="grid grid-cols-2">
                        <div class="col-auto">                    
                            <p class="text-right"><i class="wi wi-time-10 pr-2"></i>{{gmdate("Y-m-d", $data ['current']['dt'])}}  </p>    
                            <p class="text-right"><i class="wi wi-thermometer pr-2"></i>Temperatura actual: <br> {{ $data ['current']['temp'] }} °C</p>
                            <p class="text-right"><i class="wi wi-small-craft-advisory pr-2"></i> Velocidad del viento: <br> {{ $data ['current']['wind_speed'] }} m/s </p>                                    
                        </div>
                        <div class="col-auto icono text-left">
                            <p style="line-height: 100px" class="ml-5">
                                @php
                                    $estado = $data ['current']['weather'][0]["main"];
                                @endphp  
    
                                @if ( $estado == 'Clouds')
                                    <i class="wi wi-cloudy"></i>                                
                                @endif
                                @if ( $estado == 'Drizzle')
                                    <i class="wi wi-sleet"></i>                                
                                @endif
                                @if ( $estado == 'Rain')
                                    <i class="wi wi-rain"></i>                                
                                @endif
                                                                
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 clima ">
                    <div class="col-auto">
                        <div class="card">
                            <p><i class="wi wi-time-10 pr-2 mt-2"></i><strong>{{gmdate("l", $data ["daily"][1]['dt'])}}</strong> </p>
                            <p><i class="wi wi-thermometer pr-2"></i><strong>{{( $data ["daily"][1]['temp']['day'])}} °C</strong></p>
                            <div class="col-auto icono">
                                <p>
                                    @php
                                        $estado3 = $data  ["daily"][1]['weather'][0]["main"];
                                    @endphp  
        
                                    @if ( $estado3 == 'Clouds')
                                        <i class="wi wi-cloudy"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Drizzle')
                                        <i class="wi wi-sleet"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Rain')
                                        <i class="wi wi-rain"></i>                                
                                    @endif
                                                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card">
                            <p><i class="wi wi-time-10 pr-2 mt-2"></i><strong>{{gmdate("l", $data ["daily"][2]['dt'])}} </strong></p>
                            <p><i class="wi wi-thermometer pr-2"></i><strong>{{( $data ["daily"][2]['temp']['day'])}} °C</strong></p>
                            <div class="col-auto icono">
                                <p>
                                    @php
                                        $estado3 = $data  ["daily"][2]['weather'][0]["main"];
                                    @endphp  
        
                                    @if ( $estado3 == 'Clouds')
                                        <i class="wi wi-cloudy"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Drizzle')
                                        <i class="wi wi-sleet"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Rain')
                                        <i class="wi wi-rain"></i>                                
                                    @endif
                                                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card">
                            <p><i class="wi wi-time-10 pr-2 mt-2"></i><strong>{{gmdate("l", $data ["daily"][3]['dt'])}}</strong> </p>
                            <p><i class="wi wi-thermometer pr-2"></i><strong>{{( $data ["daily"][3]['temp']['day'])}} °C</strong></p>
                            <div class="col-auto icono">
                                <p>
                                    @php
                                        $estado3 = $data  ["daily"][3]['weather'][0]["main"];
                                    @endphp  
        
                                    @if ( $estado3 == 'Clouds')
                                        <i class="wi wi-cloudy"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Drizzle')
                                        <i class="wi wi-sleet"></i>                                
                                    @endif
                                    @if ( $estado3 == 'Rain')
                                        <i class="wi wi-rain"></i>                                
                                    @endif
                                                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>                                                

            </div>
        </div>
    </div>
</x-app-layout>