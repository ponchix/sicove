@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                         <a href="{{route('usuarios.create')}}" class="btn btn-warning mt-2 mb-4">Nuevo</a>
                         <div class="table-responsive">
@include('Usuarios/Datatable.DatatableUsuario')
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


