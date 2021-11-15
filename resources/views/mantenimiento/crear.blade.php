<title>Registro Nuevo</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Aplicar Mantenimiento</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
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
                            <form action="{{route('servicios.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-xs-6 col-xs-6">
                                    <label>Mecanico</label><span class="text-danger">*</span>
                                    <select name="vehiculo" class="form-control">
                                       <option value="">-</option>
                                       @foreach($mecanicos as $mecanico)
                                       <option value="{{$mecanico['id']}}">{{$mecanico['NombreMecanico']}}</option>
                                       @endforeach
                                           </select>
                               </div>
                                <div class="col-md-6 col-xs-6 col-xs-6">
                                    <label>Vehiculo</label><span class="text-danger">*</span>
                                    <select name="vehiculo" class="form-control">
                                       <option value="">-</option>
                                       @foreach($vehiculos as $vehiculo)
                                       <option value="{{$vehiculo['id']}}">{{$vehiculo['NombreVehiculo']}}</option>
                                       @endforeach
                                           </select>
                               </div>
                               <div class="col-md-6 col-xs-6 col-xs-6">
                                <label>Fecha de Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" min="2020-11-11">
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Hora de Registro</label>
                                <input type="time" class="form-control" name="hora_entrada"  value="now"  readonly >
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Odómetro</label>
                                <input type="number" class="form-control" name="odometro"   step="any">
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Servicio(s)</label>
                                <select name="servicios[]" class="form-control servicios" multiple="multiple">
                                      @foreach($servicios as $servicio)
                                    <option value="{{$servicio['id']}}">{{$servicio['nombre']}}</option>
                                    @endforeach
                                        </select>

                            </div>

                            <div class="titulo">Desglose Partes/Refacciones</div>

                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Costos Partes/Refacciones</label>
                                <input type="number" class="form-control" name="costo_partes" step="any" id="qty" onblur="myFunction()">
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Mano de Obra</label>
                                <input type="number" class="form-control" name="mano_obra" step="any" id="qty2" oninput="myFunction()">
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Total</label>
                                <input type="number" class="form-control" name="total" step="any" readonly id="total" >
                            </div>


                            <div class="titulo"> Información de Referencia</div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Referencia</label>
                                <input type="text" class="form-control" name="referencia_man" placeholder="Ej. Factura/Ticket,etc.">
                            </div>

                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Tipo de Mentenimiento</label><span class="text-danger">*</span>
                                <select name="tipo_man" class="form-control" >
                                 <option value="">-</option>
                                 <option >Correctivo</option>
                                 <option >Preventivo</option>
                             </select>
                            </div>
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Proveedor</label><span class="text-danger">*</span>
                                <select name="proveedor" class="form-control">
                                    <option value="">-</option>
                                    @foreach($proveedores as $proveedor)
                                    <option value="{{$proveedor['id']}}">{{$proveedor['NombreProveedor']}}</option>
                                    @endforeach
                                     </select>
                            </div>
                            <div class="col-md-12 col-xs-12 col-xs-12">
                                <label>Comentarios</label>
                                <input type="text" class="form-control" name="comentario" >
                            </div>

                            <div class="titulo">Cargar imagen</div>

                            <div class="col-md-12 col-xs-12 col-xs-12">
                                <label>Subir Imagen</label>
                                <input type="file" class="imagenes form-control" name="imagen_man" >
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                <a class="btn btn-danger mt-3" href="{{route('servicios.index')}}">Regresar</a>
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
   var x,y,suma,text;  
   x = document.getElementById("qty").value;  
   y = document.getElementById("qty2").value;  
   if (isNaN(x) || isNaN(y)) {  
     text = "Es necesarios introducir dos números válidos";  
   } else {  
     //si no ponemos parseFloat concatenaría x con y  
     suma=parseFloat(x)+parseFloat(y);  
     text= suma;  
   }  
   document.getElementById("total").value=text;  
 }  
        </script>


