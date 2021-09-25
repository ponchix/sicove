
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Vehiculos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                            @can('crear-vehiculo')
                            <a href="{{route('vehiculo.create')}}" class="btn btn-warning">Nuevo</a>
                            @endcan()
                            <table class="table table-hover mt-2">
                            	<thead>
                            		<th>ID</th>
                            		<th>Nombre Vehiculo</th>
                            		<th>Tipo</th>
                            		<th>Marca</th>
                            	</thead>
                            	<tbody>
                            		@foreach($vehiculos as $vehiculo)
                            		<tr>
                            			<td>{{$vehiculo->id}}</td>
                            			<td>{{$vehiculo->NombreVehiculo}}</td>
                            			<td>{{$vehiculo->TipoVehiculo}}</td>
                            			<td>{{$vehiculo->Marca}}</td>
                            			<td>
                                        <form action="{{route('vehiculo.destroy',$vehiculo->id)}}" method="POST">
                                            @can('editar-vehiculo')
                                            <a href="{{route('vehiculo.edit',$vehiculo->id)}}">Editar</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-vehiculo')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan
                                        </form>         
                                        </td>
                            		</tr>
                                    @endforeach
                            	</tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $vehiculos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection