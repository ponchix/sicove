<title>Alta Vehiculo</title>
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
                            <form action="{{route('vehiculos.store')}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Nombre del vehiculo</label><span class="text-danger">*</span>
                                 <input type="text" name="NombreVehiculo" class="form-control" onkeyup="mayus(this);">
                             </div>


                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Tipo de vehiculo</label><span class="text-danger">*</span>
                                 <select name="TipoVehiculo" class="form-control">
                                    <option>-</option>
                                    <option value="">AUTOMOVIL</option>
                                    <option >BUS</option>
                                    <option >CAMIONETA</option>
                                    <option >MOTOCICLETA</option>
                                    <option >PICK-UP</option>
                                    <option >SUV</option>
                                    <option >TRAILER</option>
                                    <option >VAN</option>
                                </select>
                            </div>


                            @livewireStyles
                            <div class="col-md-6 col-xs-6 col-xs-6">        
                                @livewire('select-dep')
                            </div>
                            @livewireScripts
                            <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Color</label><span class="text-danger">*</span>
                             <input type="text" name="Color" class="form-control" onkeyup="mayus(this);">
                         </div>

                         <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Placa</label><span class="text-danger">*</span>
                             <input type="text" name="Placa" class="form-control" onkeyup="mayus(this);">
                         </div>



                         <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Estatus Inicial</label><span class="text-danger">*</span>
                           <input type="text" name="StatusInicial" class="form-control" onkeyup="mayus(this);">
                       </div>
                       <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Estadisticas</label><span class="text-danger">*</span>
                           <input type="text" name="Estadisticas" class="form-control" onkeyup="mayus(this);">
                       </div>

                       <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Medida de Uso</label><span class="text-danger">*</span>
                           <input type="text" name="MedidaUso" class="form-control" onkeyup="mayus(this);">
                       </div>
                       <div class="col-md-3 col-xs-3 col-xs-3">
                        <label>Medida de Combustible</label><span class="text-danger">*</span>
                        <input type="text" name="MedidaCombustible" class="form-control" onkeyup="mayus(this);">
                    </div>
                    <div class="col-md-3 col-xs-3 col-xs-3">
                     <label>Año</label><span class="text-danger">*</span>
                     <input type="text" name="anio" class="form-control" onkeyup="mayus(this);">
                 </div>
                 <div class="col-md-3 col-xs-3 col-xs-3">
                     <label>Grupo</label><span class="text-danger">*</span>
                     <input type="text" name="Grupo" class="form-control" onkeyup="mayus(this);">
                 </div>

                 <div class="titulo col-md-12 col-xs-12 col-xs-12"> Informacion adicional</div>

                 <div class="col-md-6 col-xs-6 col-xs-6">
                     <label>Compañia de seguros</label><span class="text-danger">*</span>
                     <input type="text" name="CompaniaSeguros" class="form-control" onkeyup="mayus(this);">
                 </div>
                 <div class="col-md-6 col-xs-6 col-xs-6">
                     <label>Numero de serie</label><span class="text-danger">*</span>
                     <input type="text" name="NoSerie" class="form-control" onkeyup="mayus(this);">
                 </div>
                 <div class="col-md-6 col-xs-6 col-xs-6">
                     <label>Poliza de seguro</label><span class="text-danger">*</span>
                     <input type="text" name="PolizaSeguro" class="form-control" onkeyup="mayus(this);">
                 </div>


                 <div class="subir col-md-12 col-xs-12 col-xs-12">
                    @include('vehiculos.imagen')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>   
            </div>

        </form>
                            {{-- {!! Form::open (array('route'=>'vehiculos.store','method'=>'POST','files'=>'true', 'class'=>'add')) !!}
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
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        @include('vehiculos.Imagen') --}}
                                        {{-- {!! Form::file('imagen',null,array('class'=>'form-control')) !!} --}}
{{--                                     </div>
</div> --}}

{{--                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Estadisticas</label>
                                        {!! Form::select('roles[]',$roles,[],array('class'=>'form-control')) !!}
                                    </div>
                                </div>  --}}
{{--                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>                              
                            </div>

                            {!! Form::close() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
    <script type="text/javascript">
        function mayus(e) {

           e.value = e.value.toUpperCase();


       }
   </script>