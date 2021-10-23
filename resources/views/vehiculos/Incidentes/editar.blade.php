@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Reporte de Incidentes</h3>
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

                            <form action="{{route('incidentes.update',$incidentes->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Vehiculo</label>
                                    <input type="text" class="form-control" name="vehiculo" value="{{$incidentes->vehiculo}}" onkeyup="mayus(this);">
                                </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Conductor</label>
                                    <input type="text" class="form-control" name="conductor" value="{{$incidentes->conductor}}" onkeyup="mayus(this);">
                                </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Fecha de Reporte</label>
                                    <input type="date" class="form-control" name="Fecha_reporte" value="{{$incidentes->Fecha_reporte}}" onkeyup="mayus(this);">
                                </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Descripcion Corta</label>
                                    <input type="text" class="form-control" name="descripcion" value="{{$incidentes->descripcion}}" onkeyup="mayus(this);">
                                </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Importancia</label><span class="text-danger">*</span>
                           <select name="importancia" class="form-control">
                            <option value="">-</option>
                            <option >Alta</option>
                            <option >Media</option>
                            <option >Baja</option>
                        </select>
                    </div>
                                <div class="col-md-9 col-xs-9 col-xs-9">
                                    <label>Descripcion Detallada</label>
                                    <textarea rows="1" cols="3" class="form-control" name="detallada" value="{{$incidentes->detallada}}" onkeyup="mayus(this);"></textarea>
                                </div>
                                <div class="col-md-9 col-xs-9 col-xs-9">
                                    <label>Foto: </label>
                                    <input class="form-control" type="file" name='foto'>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                            <a href="{{route('incidentes.index')}}" class="btn btn-danger mt-2">Cancelar</a>
                            </form>
                        

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