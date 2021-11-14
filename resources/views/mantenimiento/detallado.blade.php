<title>Detalles</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalle de Matenimiento</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        {{$mantenimiento->fecha_inicio}}
                        {{$mantenimiento->hora_entrada}}
                        {{$mantenimiento->vehiculosM->NombreVehiculo}}
                        {{$mantenimiento->odometro}}
                        {{$mantenimiento->costo_partes}}
                        {{$mantenimiento->Mano_obra}}
                        {{$mantenimiento->total}}
                        {{$mantenimiento->referencia_man}}
                        {{$mantenimiento->tipo_man}}
                        {{$mantenimiento->proveedor}}
                        {{$mantenimiento->comentario}}
                        <img src="/mantenimiento/{{$mantenimiento->imagen_man}}" width="120" height="90px">


             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection