<title>Catalogo de Servicios</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Catalogo de Servicios</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        
                        <div class="btn-group " role="group" aria-label="Button group with nested dropdown">
                            <a class="btn btn-outline-primary btn-lg" href="{{route('catalogo.create')}}"><i class="fas fa-plus"></i> Nuevo</a>
                            <a class="btn btn-outline-primary btn-lg ml-2" href="{{route('servicios.index')}}"><i class="fas fa-exclamation-circle"></i> Bitacora</a>
                            <div class="btn-group" role="group">

                            </div>
                        </div>
<div class="titulo">Servicios Vigentes</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No.</th>
                                        
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->id}}</td>
                                            
											<td>{{ $service->nombre }}</td>

                                            <td>
                                                <form action="{{ route('catalogo.destroy',$service->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('catalogo.edit',$service->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection