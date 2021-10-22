<title>Vehiculo | {{$vehiculo->NombreVehiculo}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{$vehiculo->NombreVehiculo}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="perfil">
                          <img src="/imagen/{{$vehiculo->imagen}}"  width="50%" height="50%">
                      </div>
                      <a href="/factura/{{$vehiculo->factura}}" class="btn btn-success">ver factura </a>
                    {{$vehiculo->NombreVehiculo}}
                {{$vehiculo->marcasVehiculo->marca}}
                    @php
                     use App\Models\Marca;
                     $total=Marca::count();  
                    @endphp
                    {{$total}}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
