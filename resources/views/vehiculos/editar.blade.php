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
{{--                             <form action="{{route('vehiculos.update',$vehiculos->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="NombreVehiculo" class="form-control" value="{{$vehiculos->NombreVehiculo}}">
                                        </div>
                                    </div>
                                </div>
                                
                            </form> --}}
                            <form action="{{route('vehiculos.update',$vehiculos->id)}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                               <div class="row">
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Nombre del vehiculo</label>
                                   <input type="text" name="NombreVehiculo" class="form-control" onkeyup="mayus(this);" value="{{$vehiculos->NombreVehiculo}}">
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Tipo de vehiculo</label>
                                   <input type="text" name="TipoVehiculo" class="form-control" onkeyup="mayus(this);" value="{{$vehiculos->TipoVehiculo}}">
                               </div>
                               @livewireStyles
                               <div class="col-md-4 col-xs-4 col-xs-4">        
                                @livewire('select-dep')
                            </div>
                            @livewireScripts





                            <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Estatus Inicial</label>
                             <input type="text" name="StatusInicial" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->StatusInicial }}">
                         </div>
                         <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Estadisticas</label>
                             <input type="text" name="Estadisticas" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Estadisticas }}">
                         </div>

                         <div class="col-md-3 col-xs-3 col-xs-3">
                             <label>Medida de Uso</label>
                             <input type="text" name="MedidaUso" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->MedidaUso }}">
                         </div>
                         <div class="col-md-3 col-xs-3 col-xs-3">
                            <label>Medida de Combustible</label>
                            <input type="text" name="MedidaCombustible" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->MedidaCombustible }}">
                        </div>
                        <div class="col-md-3 col-xs-3 col-xs-3">
                           <label>Año</label>
                           <input type="text" name="anio" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->anio }}">
                       </div>
                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Grupo</label>
                           <input type="text" name="Grupo" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Grupo }}">
                       </div>

                       <div class="titulo col-md-12 col-xs-12 col-xs-12"> Informacion adicional</div>

                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Compañia de seguros</label>
                           <input type="text" name="CompaniaSeguros" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->CompaniaSeguros }}">
                       </div>
                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Numero de serie</label>
                           <input type="text" name="NoSerie" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->NoSerie }}">
                       </div>
                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Poliza de seguro</label>
                           <input type="text" name="PolizaSeguro" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->PolizaSeguro  }}">
                       </div>
                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Placa</label>
                           <input type="text" name="Placa" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Placa}}">
                       </div>
                       <div class="col-md-6 col-xs-6 col-xs-6">
                           <label>Color</label>
                           <input type="text" name="Color" class="form-control" onkeyup="mayus(this);" value=" {{$vehiculos->Color }}">
                       </div>
                       <div class="subir col-md-12 col-xs-12 col-xs-12">
                         <div >
                            <img id="imagenSeleccionada" width="150px" src="/imagen/{{$vehiculos->imagen}}">
                        </div>
                        <div>
                            <label for="">Subir Imagen</label>
                            <input type="file" name="imagen" id="imagen">
                                                 </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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