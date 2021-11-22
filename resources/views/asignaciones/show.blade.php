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
                            <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-primary mb-0 mt-1"><i
                                    class="fas fa-chevron-left"></i> Regresar</a>
                            <br>Numero de asignacion :{{ $asignacion->id }}
                            @foreach ($conductor as $item)
                                conductor: {{ $item->name }}
                                Apellido: {{ $item->APaterno }}
                            @endforeach
                            <br>
                            <br> vehiculo: {{ $asignacion->vehiculos->NombreVehiculo }}
                            <br> fecha de asignacion: {{ $asignacion->fecha_a }}
                            <br> Fecha de entrega: {{ $asignacion->fecha_e }}
                            <br> odometro inicial: {{ $asignacion->odometro_a }}
                            <br> odometro final: {{ $asignacion->odometro_e }}
                            <br> combustible inicial: {{ $asignacion->combustible_a }}
                            <br> combustible final: {{ $asignacion->combustible_e }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
