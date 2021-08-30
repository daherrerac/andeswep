@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-20"></div>
        <div class="bg-white shadow-md">
            
            <div id="chart"></div>                        
                        
        </div>

        <div class="bg-white shadow-md">
            <div id="chart2"></div>
        </div>
    
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
          series: [{
          name: 'Evento 1',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Evento 2',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Evento 3',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
          title: {
            text: 'Acumulados por evento de todos los participantes'
          }
        },
        yaxis: {
          title: {
            text: 'Km recorridos'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "Km " + val + " "
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var options2 = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Participante 1', 'Participante 2', 'Participante 3', 'Participante 4', 'Participante 5', 'Participante 6', 'Participante 7',
            'Participante 8', 'Participante 9', 'Participante 10'
          ],
          title: {
            text: 'Pasos por participante'
          }
        }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();
    </script>
        
    @endif
@endsection
    
    
