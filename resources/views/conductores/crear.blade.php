<title>Alta Conductores</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Alta de Conductores</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="titulo mt-1">Información del Conductor</div>
                        @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos! </strong>
                            @foreach($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>  </button>
                            </div>
                            @endif
                            <form action="{{route('conductores.store')}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                <div class="subir col-md-3 col-xs-3 col-xs-3"> 
                                 @include('conductores.imagen')
                                </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Nombre(s)</label><span class="text-danger">*</span>
                                 <input type="text" name="NombreConductor" class="form-control" onkeyup="mayus(this);">
                             </div>
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Apellido Paterno</label><span class="text-danger">*</span>
                                 <input type="text" name="APaterno" class="form-control" onkeyup="mayus(this);">
                             </div>
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Apellido Materno</label><span class="text-danger">*</span>
                                 <input type="text" name="AMaterno" class="form-control" onkeyup="mayus(this);">
                             </div>                         
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Edad</label>
                                 <input type="text" name="edad" class="form-control">
                                <br>  
                             </div>   
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Dirección</label><span class="text-danger">*</span>
                                 <input type="text" name="direccion" class="form-control" onkeyup="mayus(this);">
                             </div>   
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Correo Electronico</label><span class="text-danger">*</span>
                                 <input type="text" name="correo" class="form-control" >
                             </div>      
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Telefono</label><span class="text-danger">*</span>
                                 <input type="text" name="telefono" class="form-control">
                             </div>                                                                            
                             <div class="titulo">Licencia de Conducir</div>                                                       
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>No.Licencia</label><span class="text-danger">*</span>
                                 <input type="text" name="NoLiciencia" class="form-control" onkeyup="mayus(this);">
                             </div>  
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Fecha de Expiración</label><span class="text-danger">*</span>
                                <input type="text" name="fecha_exp" min="01-01-2021" class="form-control icono-placeholder " id="datepicker" placeholder="" autocomplete="off" min="01-05-2021">
                             </div>                               
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Tipo de Licencia</label><span class="text-danger">*</span>
                                 <select name="tipoLicencia" class="form-control" >
                                <option value="">-</option>
                                <option >Tipo A</option>
                                <option >Tipo B</option>
                                <option >Tipo C</option>
                                <option >Tipo D</option>
                                </select>
                            </div> 
                </div> 
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{route('conductores.index')}}" class="btn btn-danger ml-2">Cancelar</a>
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
    function mayus(e) {

       e.value = e.value.toUpperCase();


   }
</script>

