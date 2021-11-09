<title>Vehiculo | {{$vehiculo->NombreVehiculo}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{$vehiculo->NombreVehiculo}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                       
                        <div class="perfiles">
                          <img src="/imagen/{{$vehiculo->imagen}}"  width="65%" height="65%">
                      </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 col-xs-4">
                            <div class="titulo">Información Basica</div>
                            <table class="table">
                                <tbody>
                                <tr><th scope="row" class="text-left">Nombre</th>
                                <td class="text-right">{{$vehiculo->NombreVehiculo}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Marca</th>
                                <td class="text-right"> {{$vehiculo->marcasVehiculo->marca}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Modelo</th>
                                    @foreach ($modelo as $item)
                                    <td class="text-right">{{$item->modelo}}</td>   
                                    @endforeach
                               
                                </tr>
                                <tr><th scope="row" class="text-left">Año</th>
                                <td class="text-right">{{$vehiculo->anio}}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                            <div class="titulo">Configuración</div>
                            <table class="table" >
                                <tbody>
                                <tr><th scope="row" class="text-left">Tipo de Vehiculo</th></small>
                                <td class="text-right">{{$vehiculo->tiposVehiculo->Nombre}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Estatus</th>
                                <td class="text-right">
                                    @if($vehiculo->StatusInicial=='Disponible')
                                    <span class="badge bg-primary">{{$vehiculo->StatusInicial}}</span>
                                    @elseif($vehiculo->StatusInicial=='Taller')
                                    <span class="badge bg-warning">{{$vehiculo->StatusInicial}}</span>
                                    @elseif($vehiculo->StatusInicial=='Asignado')
                                    <span class="badge bg-info">{{$vehiculo->StatusInicial}}</span>
                                    @elseif($vehiculo->StatusInicial=='Fuera de servicio')
                                    <span class="badge bg-danger">{{$vehiculo->StatusInicial}}</span>
                                    @endif
                                </td>
                                </tr>
                                <tr><th scope="row" class="text-left">Medida</th>
                                <td class="text-right">{{$vehiculo->MedidaUso}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Tipo de Combustible</th>
                                <td class="text-right">{{$vehiculo->combustible}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Medida de Combustible</th>
                                <td class="text-right">{{$vehiculo->MedidaCombustible}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Motor</th>
                                <td class="text-right">{{$vehiculo->motor}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Disposición de Cilindros</th>
                                <td class="text-right">{{$vehiculo->cilindraje}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Numero de Cilindros</th>
                                <td class="text-right">{{$vehiculo->cilindrada}}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                              <div class="titulo">Información Adicional</div>
                               <table class="table" width="400">
                                <tbody>
                                <tr><th class="text-left">Placas</th>
                                <td class="text-right">{{$vehiculo->Placa}}</td>
                                </tr>
                                <tr><th class="text-left">Color</th>
                                <td class="text-right">{{$vehiculo->Color}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">No. Serie</th>
                                <td class="text-right">{{$vehiculo->NoSerie}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Seguro</th>
                                <td class="text-right"> {{$vehiculo->CompaniaSeguros}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Poliza de seguro</th>
                                <td class="text-right">{{$vehiculo->PolizaSeguro}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Vigencia de Poliza</th>
                                <td class="text-right">{{$vehiculo->fecha_poliza}}</td>
                                </tr>
                                </tbody>
                            </table>
                               <div class="titulo">Documentación</div>
                              <a href="/factura/{{$vehiculo->factura}}" class="btn btn-success">ver factura</a>
                            </div>
                            <div class="col-md-12 col-xs-12 col-xs-12">
                                <div class="titulo">Incidentes</div>
                                <div id="incidentes">

                                </div>
                            </div>
                   

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
       
        
     
            const chart = Highcharts.chart('incidentes', {
                chart: {
                    type: 'column',
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
                   
                },
                yAxis: {
                    title: {
                        text: 'Incidentes Registrados'
                    }
    
                },
                series: [{
                    name: 'Incidentes',
                    data: datas
    
                            }]
            });
        });
        
                                    </script>