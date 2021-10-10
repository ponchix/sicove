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
                            <form action="{{route('vehiculos.store')}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Nombre del vehiculo</label><span class="text-danger">*</span>
                                 <input type="text" name="NombreVehiculo" class="form-control" onkeyup="mayus(this);">
                             </div>
                             <div class="col-md-3 col-xs-3 col-xs-3">
                                 <label>Año</label><span class="text-danger">*</span>
                                 <input type="text" name="anio" class="form-control" onkeyup="mayus(this);">
                             </div>
                             @livewireStyles
                             <div class="col-md-6 col-xs-6 col-xs-6">        
                                @livewire('select-dep')
                            </div>
                            @livewireScripts
                            <!--Inicio Configuracion--->
                            <div class="titulo">Configuración</div>
                            <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Tipo de vehiculo</label><span class="text-danger">*</span>
                             <select name="TipoVehiculo" class="form-control">
                                <option value="">-</option>
                                <option >AUTOMOVIL</option>
                                <option >BUS</option>
                                <option >CAMIONETA</option>
                                <option >MOTOCICLETA</option>
                                <option >PICK-UP</option>
                                <option >SUV</option>
                                <option >TRAILER</option>
                                <option >VAN</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Estatus Inicial</label><span class="text-danger">*</span>
                           <select name="StatusInicial" class="form-control">
                            <option value="">-</option>
                            <option >Asignado</option>
                            <option >Disponible</option>
                            <option >Taller</option>
                            <option >Fuera de servicio</option>
                        </select>
                    </div>


                    <div class="col-md-3 col-xs-3 col-xs-3">
                       <label>Medida de Uso</label><span class="text-danger">*</span>
                       <select name="MedidaUso" class="form-control" >
                        <option value="">-</option>
                        <option >kilómetros</option>
                        <option >millas</option>
                    </select>
                </div>
                <div class="col-md-3 col-xs-3 col-xs-3">
                 <label>Tipo de combustible</label><span class="text-danger">*</span>
                 <select name="combustible" class="form-control" >
                    <option value="">-</option>
                    <option >Gasolina</option>
                    <option >Diésel</option>
                    <option >Otro</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-3 col-xs-3">
               <label>Medida de combustible</label><span class="text-danger">*</span>
               <select name="MedidaCombustible" class="form-control" >
                <option value="">-</option>
                <option >lítros</option>
                <option >galones</option>
            </select>
        </div>

        <div class="col-md-3 col-xs-3 col-xs-3">
         <label>Motor</label><span class="text-danger">*</span>
         <select name="motor" class="form-control" >
            <option value="">-</option>
            <option >Gasolina</option>
            <option >Diésel</option>
            <option >Hibrido</option>
        </select>
    </div>
    <div class="col-md-3 col-xs-3 col-xs-3">
     <label>Disposición de cilindros</label><span class="text-danger">*</span>
     <select name="cilindraje" class="form-control" >
        <option value="">-</option>
        <option >En línea</option>
        <option >En V</option>
        <option >Bóxer</option>
        <option >Radial</option>
    </select>
</div>
<div class="col-md-3 col-xs-3 col-xs-3">
 <label>Numero de cilindros</label><span class="text-danger">*</span>
 <select name="cilindrada" class="form-control" >
    <option value="">-</option>
    <option >4</option>
    <option >6</option>
    <option >8</option>
    <option >12</option>
</select>
</div>
<!---Fin Configuracion--->
<!--Inicio Info Adicional---->


<div class="titulo col-md-12 col-xs-12 col-xs-12"> Informacion adicional</div>


<div class="col-md-3 col-xs-3 col-xs-3">
   <label>Fecha de compra</label><span class="text-danger">*</span>
   <input type="text" name="fecha_compra" class="form-control icono-placeholder " id="datepicker" placeholder="" autocomplete="off">
</div>   


<div class="col-md-3 col-xs-3 col-xs-3">
 <label>Color</label><span class="text-danger">*</span>
 <input type="text" name="Color" class="form-control" onkeyup="mayus(this);">
</div>

<div class="col-md-3 col-xs-3 col-xs-3">
 <label>Placa</label><span class="text-danger">*</span>
 <input type="text" name="Placa" class="form-control" onkeyup="mayus(this);">
</div>

<div class="col-md-3 col-xs-3 col-xs-3">
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

