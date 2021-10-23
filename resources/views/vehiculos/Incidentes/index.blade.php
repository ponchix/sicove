@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Incidentes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('incidentes.create')}}" class="btn btn-warning mb-0 mt-1">Registrar</a>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-secondary mb-0 mt-1">Vehiculos</a>

                        <div class="container">

                        </div>
                        <div id="container">

                        </div>
                       
                            
                        <div >
                            <div class="titulo">Tabla de Incidentes</div>
                            @include('vehiculos/Incidentes.DatatableIncidente')
                        </div>
                            
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    var datas = <?php echo json_encode($datas)?>;
   
    
 
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'area',
                options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70,
        }
            },
            title: {
                text: 'Total de Incidentes'
            },
            plotOptions: {
                series:{
                    allowPointSelect:true
                },
        area: {
            depth: 100
        }
    },
            xAxis: {
                title: {
                    text: 'Total'
                },
                categories:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
            },
            yAxis: {
                title: {
                    text: 'Incidentes registrados'
                }

            },
            series: [{
                name: 'Incidentes',
                data: datas

                        }]
        });
    });
    
                                </script>