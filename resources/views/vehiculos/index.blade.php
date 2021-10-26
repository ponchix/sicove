<title>Vehiculos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Vehiculos</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >

                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a class="btn btn-outline-primary btn-lg" href="{{route('vehiculos.create')}}"><i class="fas fa-plus"></i> Nuevo</a>
                            <a  class="btn btn-outline-primary btn-lg ml-2" href="{{route('incidentes.index')}}"><i class="fas fa-car-crash"></i> Incidentes</a>
                            <a  class="btn btn-outline-primary btn-lg ml-2" href="{{route('gastos.index')}}"><i class="fas fa-dollar-sign"></i> Gastos</a>
                            <div class="btn-group" role="group">
                                <div class="dropdown  dropend ">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-lg btn-outline-primary dropdown-toggle ml-2" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-universal-access"></i> Adicionales</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                     <li>
                                      @can('crear-vehiculo')
                                      <a data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar nuevo modelo" href="{{route('modelos.create')}}"class="dropdown-item"> Agregar Modelo </a> 
                                      @endcan()
                                  </li>
                                  <li>
                                      <a href="{{route('tipos.index')}}" class="dropdown-item">Tipo de Vehiculo</a>
                                  </li>
                                <li>
                                    <a href="{{route('marcas.index')}}" class="dropdown-item">Marcas</a>
                                </li>
                              </ul>
                                </div>
                            </div>
                        </div>

                  <div class="titulo mt-3 mb-1">Inventario de vehiculos</div>

                  <div class="table-responsive">  
                     @include('vehiculos.DatatableVehiculo')
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>