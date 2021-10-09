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
                        @can('crear-vehiculo')
                        <a href="{{route('vehiculos.create')}}" class="btn btn-warning mb-0 mt-1">Nuevo</a>
                        @endcan()
                        @can('crear-vehiculo')
                        <a class="btn btn-dark mb-0 mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar nuevo modelo" href="{{route('modelos.create')}}"> Nuevo Modelo </a> 
                        @endcan()
                        <div class="titulo mt-3 mb-1">Inventario de vehiculos</div>
                        


                        <div class="table-responsive">  
                           @include('vehiculos.DatatableVehiculo')
                       </div>
                       <!-- Button trigger modal -->

                             {{--                             <table id="example" class="table table-striped" style="width:100%">
                            	<thead>
                            		<th>ID</th>
                            		<th>Nombre Vehiculo</th>
                            		<th>Tipo</th>
                            		<th>Marca</th>
                                    <th>Acciones</th>
                            	</thead>
                            	<tbody>
                            		@foreach($vehiculos as $vehiculo)
                            		<tr>
                            			<td>{{$vehiculo->id}}</td>
                            			<td>{{$vehiculo->NombreVehiculo}}</td>
                            			<td>{{$vehiculo->TipoVehiculo}}</td>
                            			<td>{{$vehiculo->Marca}}</td>
                            			<td>
                                        <form action="{{route('vehiculos.destroy',$vehiculo->id)}}" method="POST">
                                            @can('ver-vehiculo')
                                            <a class="btn btn-primary" href="{{route('vehiculos.edit',$vehiculo->id)}}"><i class="fas fa-eye"></i></a>
                                            @endcan
                                            @can('editar-vehiculo')
                                            <a class="btn btn-info" href="{{route('vehiculos.edit',$vehiculo->id)}}"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-vehiculo')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            @endcan
                                        </form>         
                                        </td>
                            		</tr>
                                    @endforeach
                            	</tbody>
                            </table> --}}
{{--                             <div class="pagination justify-content-end">
                                {!! $vehiculos->links() !!}
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>