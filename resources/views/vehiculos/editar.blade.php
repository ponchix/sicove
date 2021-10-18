@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Editar Vehiculos</h3>
 </div>
 <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" >
             <div class="titulo mt-1">Información basica</div>
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

           </form> 
           <form action="{{route('vehiculos.update',$vehiculos->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row">
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Nombre del vehiculo</label>
                  <input type="text" name="NombreVehiculo" class="form-control" onkeyup="mayus(this);" value="{{$vehiculos->NombreVehiculo}}">
               </div>

               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Año</label>
                  <input type="text" name="anio" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->anio }}">
               </div>

               @livewireStyles
               <div class="col-md-6 col-xs-6 col-xs-6">        
                  @livewire('select-dep')
               </div>
               @livewireScripts

               <div class="titulo">Configuración</div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                <label>Tipo de vehiculo</label>


                <select name="TipoVehiculo" class="form-control">
                  <option value="">-</option>
                  @foreach($tipos as $tipo)
                  <?php if ($tipo['id']==$vehiculos->TipoVehiculo){ ?>
                  <option value="{{$tipo['id']}}" selected='selected'>{{$tipo['Nombre']}}</option>
                  <?php } else { ?>
                  <option value="{{$tipo['id']}}">{{$tipo['Nombre']}}</option>
                  <?php }?>
                  @endforeach
               </select>

            </div>


            <div class="col-md-3 col-xs-3 col-xs-3">
             <label>Estatus Inicial</label>
             <select name="StatusInicial" class="form-control">
                <option value="">-</option>
                <option  {{$vehiculos->StatusInicial =="Asignado" ? 'selected':''}}>Asignado</option>
                <option  {{$vehiculos->StatusInicial =="Disponible" ? 'selected':''}}>Disponible</option>
                <option  {{$vehiculos->StatusInicial =="Taller" ? 'selected':''}}>Taller</option>
                <option  {{$vehiculos->StatusInicial =="Fuera de servicio" ? 'selected':''}}>Fuera de servicio</option>
             </select>
          </div>

          <div class="col-md-3 col-xs-3 col-xs-3">
            <label>Tipo de combustible</label><span class="text-danger">*</span>
            <select name="combustible" class="form-control" >
              <option value="">-</option>
              <option {{$vehiculos->combustible=="Gasolina"?'selected':''}}>Gasolina</option>
              <option {{$vehiculos->combustible=="Diésel"?'selected':''}}>Diésel</option>
              <option {{$vehiculos->combustible=="Otro6"?'selected':''}}>Otro</option>
           </select>
        </div>

        <div class="col-md-3 col-xs-3 col-xs-3">
         <label>Medida de Uso</label>
         <select name="MedidaUso" class="form-control" >
            <option value="">-</option>
            <option {{$vehiculos->MedidaUso =="kilómetros" ? 'selected':''}}>kilómetros</option>
            <option {{$vehiculos->MedidaUso =="millas" ? 'selected':''}}>millas</option>
         </select>
      </div>


      <div class="col-md-3 col-xs-3 col-xs-3">
       <label>Medida de Combustible</label>

       <select name="MedidaCombustible" class="form-control" >
         <option value="">-</option>
         <option {{$vehiculos->MedidaCombustible =="lítros" ? 'selected':''}}>lítros</option>
         <option {{$vehiculos->MedidaCombustible =="galones" ? 'selected':''}}>galones</option>
      </select>
   </div>
   <div class="col-md-3 col-xs-3 col-xs-3">
     <label>Motor</label><span class="text-danger">*</span>
     <select name="motor" class="form-control" >
       <option value="">-</option>
       <option {{$vehiculos->motor =="Gasolina" ? 'selected':''}}>Gasolina</option>
       <option {{$vehiculos->motor =="Diésel" ? 'selected':''}}>Diésel</option>
       <option {{$vehiculos->motor =="Hibrido" ? 'selected':''}}>Hibrido</option>
    </select>
 </div>
 <div class="col-md-3 col-xs-3 col-xs-3">
   <label>Disposición de cilindros</label><span class="text-danger">*</span>
   <select name="cilindraje" class="form-control" >
     <option value="">-</option>
     <option {{$vehiculos->cilindraje =="En línea" ? 'selected':''}}>En línea</option>
     <option {{$vehiculos->cilindraje =="En V" ? 'selected':''}}>En V</option>
     <option {{$vehiculos->cilindraje =="Bóxer" ? 'selected':''}}>Bóxer</option>
     <option {{$vehiculos->cilindraje =="Radial" ? 'selected':''}}>Radial</option>
  </select>
</div>
<div class="col-md-3 col-xs-3 col-xs-3">
   <label>Numero de cilindros</label><span class="text-danger">*</span>
   <select name="cilindrada" class="form-control" >
     <option value="">-</option>
     <option {{$vehiculos->cilindrada =="4" ? 'selected':''}}>4</option>
     <option {{$vehiculos->cilindrada =="6" ? 'selected':''}}>6</option>
     <option {{$vehiculos->cilindrada =="8" ? 'selected':''}}>8</option>
     <option {{$vehiculos->cilindrada =="12" ? 'selected':''}}>12</option>
  </select>
</div>

<div class="titulo col-md-12 col-xs-12 col-xs-12"> Informacion adicional</div>

<div class="col-md-3 col-xs-3 col-xs-3">
  <label>Fecha de compra</label>
  <input type="text" name="fecha_compra" class="form-control" value=" {{$vehiculos->fecha_compra}}" id="datepicker">
</div>
<div class="col-md-3 col-xs-3 col-xs-3">
   <label>Color</label>
   <input type="text" name="Color" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Color }}">
</div>
<div class="col-md-3 col-xs-3 col-xs-3">
   <label>Placa</label>
   <input type="text" name="Placa" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Placa}}">
</div>
<div class="col-md-3 col-xs-3 col-xs-3">
   <label>Compañia de seguros</label>
   <input type="text" name="CompaniaSeguros" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->CompaniaSeguros }}">
</div>
<div class="col-md-4 col-xs-4 col-xs-4">
   <label>Numero de serie</label>
   <input type="text" name="NoSerie" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->NoSerie }}">
</div>
<div class="col-md-4 col-xs-4 col-xs-4">
   <label>Poliza de seguro</label>
   <input type="text" name="PolizaSeguro" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->PolizaSeguro  }}">
</div>
<div class="col-md-4 col-xs-4 col-xs-4">
   <label>Vigencia Póliza</label>
   <input type="text" name="fecha_poliza" class="form-control" onkeyup="mayus(this);" id="poliza" value=" {{$vehiculos->fecha_poliza  }}" autocomplete="off">
</div>



<div class="subir col-md-12 col-xs-12 col-xs-12">
  <div >
     <img id="imagenSeleccionada" width="150px" src="/imagen/{{$vehiculos->imagen}}">
  </div>
  <div class="mt-2">
     
   <label for="">Subir Imagen</label><input type="file" name="imagen" id="imagen" class="separacion form-control">
  </div>
  <div class="mt-2">

   <label for="">Subir Factura</label> <input type="file" name="factura" id="factura" class="separacion form-control">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{route('vehiculos.index')}}" class="btn btn-danger ml-2">Cancelar</a>
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