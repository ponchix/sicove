<title>Conductor | {{$conductores->NombreConductor}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Editar Conductores</h3>
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
                 <span aria-hidden="true">&times;</span>                    </button>
              </div>
              @endif
           <form action="{{route('conductores.update',$conductores->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row">
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <img id="imagenSeleccionada" width="150px" src="/imagen/{{$conductores->imagen}}">
                </div>
                <div class="mt-2 col-md-3 col-xs-3 col-xs-3">
                 <label for="">Subir Imagen</label><input type="file" name="imagen" id="imagen" class="separacion form-control" >
                </div>
           
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Nombre(s)</label><span class="text-danger">*</span>
                  <input type="text" name="NombreConductor" class="form-control" onkeyup="mayus(this);" value="{{$conductores->NombreConductor}}">
               </div>

               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Apellido Paterno</label><span class="text-danger">*</span>
                  <input type="text" name="APaterno" class="form-control" onkeyup="mayus(this);" value=" {{$conductores->APaterno }}">
               </div><br>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Apellido Materno</label><span class="text-danger">*</span>
                  <input type="text" name="AMaterno" class="form-control" onkeyup="mayus(this);" value=" {{$conductores->AMaterno }}"> 
               </div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Edad</label>
                  <input type="text" name="edad" class="form-control"  value=" {{$conductores->edad }}">
               </div>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Direccion</label><span class="text-danger">*</span>
                  <input type="text" name="direccion" class="form-control" onkeyup="mayus(this);" value=" {{$conductores->direccion }}">
               </div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Correo</label><span class="text-danger">*</span>
                  <input type="text" name="correo" class="form-control" value=" {{$conductores->correo }}">
               </div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Telefono</label><span class="text-danger">*</span>
                  <input type="text" name="telefono" class="form-control" value=" {{$conductores->telefono }}">
               </div>
               <div class="titulo">Licencia de Conducir</div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                <label>No. Licencia</label><span class="text-danger">*</span>
                  <input type="text" name="NoLiciencia" class="form-control"  value=" {{$conductores->NoLiciencia }}">
               </div>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Fecha de Expiración</label><span class="text-danger">*</span>
                  <input type="text" name="fecha_exp"  class="form-control  " id="datepicker" value=" {{$conductores->fecha_exp }}">
               </div> 
               <div class="col-md-3 col-xs-3 col-xs-3">
                 <label>Tipo de Licencia</label><span class="text-danger">*</span>
                 <select name="tipoLicencia" class="form-control" >
                   <option value="">-</option>
                   <option {{$conductores->tipoLicencia =="Tipo A" ? 'selected':''}}>Tipo A</option>
                   <option {{$conductores->tipoLicencia =="Tipo B" ? 'selected':''}}>Tipo B</option>
                   <option {{$conductores->tipoLicencia =="Tipo C" ? 'selected':''}}>Tipo C</option>
                   <option {{$conductores->tipoLicencia =="Tipo D" ? 'selected':''}}>Tipo D</option>
                </select>
          </div>         
<div class="col-xs-12 col-sm-12 col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{route('conductores.index')}}" class="btn btn-danger ml-2">Cancelar</a>
</div>   


</form>                                 
</div>

</div>
</div>
</div>
</div>
</div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function(e){
    $('#imagen').change(function(){
       let reader=new FileReader();
       reader.onload=(e)=>{
         $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
   });
 });
</script>

<script type="text/javascript">
  function mayus(e) {

     e.value = e.value.toUpperCase();


  }
</script>