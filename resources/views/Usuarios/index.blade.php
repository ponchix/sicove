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
                         <a href="{{route('usuarios.create')}}" class="btn btn-warning">Nuevo</a>
                         <table class="table table-hover mt-2">
                             <thead>
                                 <th>ID</th>
                                 <th>Nombre</th>
                                 <th>E-mail</th>
                                 <th>Rol</th>
                                 <th>Acciones</th>
                              </thead>
                              <tbody>
                                  @foreach($usuarios as $usuario)
                                  <tr>
                                      <td>{{$usuario->id}}</td>
                                      <td>{{$usuario->name}}</td>
                                      <td>{{$usuario->email}}</td>
                                      <td>
                                          @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                            @endforeach
                                          @endif
                                      </td>
                                      <td>
                                          <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-info">Editar</a>
                                          {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy',$usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
                                          {!! Form::close() !!}

                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                         </table>
                         <div class="pagination justify-content-end">
                             {!! $usuarios->links() !!}
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection