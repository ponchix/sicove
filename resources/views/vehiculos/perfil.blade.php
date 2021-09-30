<title>Vehiculo | {{$vehiculo->NombreVehiculo}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Perfil del vehiculo: {{$vehiculo->id}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="card" style="width: 400px;">
                          <img src="/imagen/{{$vehiculo->imagen}}" class="card-img-top" alt="..." width="" height="300px">
                          <div class="card-body">
                            <h5 class="card-title">Perfil</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    {{$vehiculo->NombreVehiculo}}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
