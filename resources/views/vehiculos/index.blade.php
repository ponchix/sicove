
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
                            <a href="{{route('vehiculos.create')}}" class="btn btn-warning">Nuevo</a>
                            @endcan()
                            <table id="example" class="table table-striped" style="width:100%">
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
                            </table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
     $(document).ready(function() {
    $('#example').DataTable();
} ); 
</script>
                           
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
