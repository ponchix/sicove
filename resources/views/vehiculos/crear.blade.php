@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de Vehiculos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >

                            @if($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos! </strong>
                                @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>                    </button>
                            </div>
                            @endif

                            {!! Form::open (array('route'=>'vehiculos.store','method'=>'POST', 'class'=>'add')) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="NombreVehiculo">Nombre del vehiculo</label>
                                        {!! Form::text('NombreVehiculo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Tipo de Vehiculo</label>
                                        {!! Form::text('TipoVehiculo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Marca:</label>
                                        {!! Form::text('Marca',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Estatus</label>
                                        {!! Form::text('StatusInicial',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Estadisticas</label>
                                        {!! Form::text('Estadisticas',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Modelo</label>
                                        {!! Form::text('Modelo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Medida de uso:</label>
                                        {!! Form::text('MedidaUso',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Medida</label>
                                        {!! Form::text('MedidaCombustible',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Año</label>
                                        {!! Form::text('anio',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Grupo</label>
                                        {!! Form::text('Grupo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Placa</label>
                                        {!! Form::text('Placa',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Color</label>
                                        {!! Form::text('Color',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                                <div class="info col-lg-12 col-md-12 col-xs-12">
                                    Informacion Adicional
                                </div>


                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Compañia de seguros</label>
                                        {!! Form::text('CompaniaSeguros',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">No. Serie</label>
                                        {!! Form::text('NoSerie',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Poliza</label>
                                        {!! Form::text('PolizaSeguro',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>


{{--                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Estadisticas</label>
                                        {!! Form::select('roles[]',$roles,[],array('class'=>'form-control')) !!}
                                    </div>
                                </div>  --}}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>                              
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


