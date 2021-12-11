@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos! </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span> </button>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="etiqueta">Permisos para este rol:</label>
                                        <br />

                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    @foreach ($permission as $value)
                                                        <label class="roles">{!! Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input']) !!}
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </div>
                                                <div class="col">
                                                    @foreach ($permission2 as $value)
                                                        <label class="roles">{!! Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input']) !!}
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </div>
                                                <div class="col">
                                                    @foreach ($permission3 as $value)
                                                        <label class="roles">{!! Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input']) !!}
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </div>
                                                <div class="col">
                                                    @foreach ($permission4 as $value)
                                                        <label class="roles">{!! Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input']) !!}
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                  

                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
