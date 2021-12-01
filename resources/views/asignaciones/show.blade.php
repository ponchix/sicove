<title>Detalle Asignacion | {{ $asignacion->id }}</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalles De Asignacion</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-primary mb-0 mt-1"><i class="fas fa-chevron-left"></i> Atrás</a>
                        <div class="row">
                           <div class="col-md-12 col-xs-12 col-xs-12">
                                <div class="titulo">Numero de asignacion : {{ $asignacion->id }}
                                    @foreach ($conductor as $item)
                                        conductor: {{ $item->name }}
                                        Apellido: {{ $item->APaterno }}
                                    @endforeach
                                    <br>
                                </div>
                            </div>
                               <div class="col-md-6 col-xs-5 col-xs-5">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left">Vehiculo</th>
                                            <td class="text-right">{{ $asignacion->vehiculos->NombreVehiculo }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Status</th>
                                            @if ($asignacion->status == '1')
                                            <td class="text-right"><span class="badge badge-info">{{ $asignacion->estado->status }}</span>
                                            </td>
                                            @elseif($asignacion->status == '2')
                                            <td class="text-right"><span class="badge badge-primary">{{ $asignacion->estado->status }}</span>
                                            </td>  
                                            @endif

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Conductor</th>
                                            <td class="text-right">{{ $asignacion->conductores->NombreConductor }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Fecha de asignacion</th>
                                            <td class="text-right"> {{ $asignacion->fecha_a }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left"> Fecha de entrega</th>
                                            <td class="text-right">{{ $asignacion->fecha_e }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Odometro inicial</th>
                                            <td class="text-right"> {{ $asignacion->odometro_a }} Km</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Odometro final</th>
                                            <td class="text-right">{{ $asignacion->odometro_e }} Km</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Combustible inicial</th>
                                            <td class="text-right">{{ $asignacion->combustible_a }} Lts</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">Combustible final</th>
                                            <td class="text-right">{{ $asignacion->combustible_e }} Lts</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                             <div class="col-md-6 col-xs-5 col-xs-5">
                             <img src="/imagen/{{ $asignacion->vehiculos->imagen }}" width="100%" height="90%">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
