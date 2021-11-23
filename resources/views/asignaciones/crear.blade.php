<title>Asignacion Nueva</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva Asignación</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos! </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span> </button>
                                </div>
                            @endif
                            <div class="titulo">{{ $vehiculo->NombreVehiculo }}</div>
                            <form action="{{ route('asignaciones.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="card">
                                            <img src="/imagen/{{ $vehiculo->imagen }}"
                                                class="portada img-fluid card-img-top">
                                        </div>
                                    </div>
                                    <div class="row three">
                                        <div class="col-md-6 col-xs-6 col-xs-6">
                                            <label>Conductor</label><span class="text-danger">*</span>
                                            <select name="conductor" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($conductores as $conductor)
                                                    <option value="{{ $conductor['id'] }}">
                                                        {{ $conductor->NombreConductor }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="text" name="vehiculo" value="{{ $vehiculo->id }}"
                                            class="form-control" hidden readonly>

                                        <div class="col-md-6 col-xs-6 col-xs-6">
                                            <label>Fecha de asignacion</label><span class="text-danger">*</span>
                                            <input type="date" class="form-control" name="fecha_a" min="2020-11-11"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>

                                        <div class="col-md-6 col-xs-6 col-xs-6">
                                            <label>Odometro Actual</label><span class="text-danger">*</span>
                                            @if ($odometro == 0)
                                            <input class="form-control" type="number" name="odometro_a" min="0"
                                            step="any" value="{{ $odometro }}">
                                            @else
                                                <input class="form-control" type="number" name="odometro_a" min="0"
                                                    step="any" value="{{ $odometro }}" readonly>
                                            @endif

                                        </div>

                                        <div class="col-md-6 col-xs-6 col-xs-6">
                                            <label>Combustible Actual</label><span class="text-danger">*</span>
                                            <input type="number" name="combustible_a" min="0" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary mt-1">Guardar</button>
                                        <a class="btn btn-danger mt-1" href="{{ route('vehiculos.index') }}">Regresar</a>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script type="text/javascript">
    function myFunction() {
        var x, y, suma, text;
        x = document.getElementById("qty").value;
        y = document.getElementById("qty2").value;
        if (isNaN(x) || isNaN(y)) {
            text = "Es necesarios introducir dos números válidos";
        } else {
            //si no ponemos parseFloat concatenaría x con y  
            suma = parseFloat(x) + parseFloat(y);
            text = suma;
        }
        document.getElementById("total").value = text;
    }
</script>
