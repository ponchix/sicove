<title>Tipos Combustibles</title>
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
                        <form method="POST" action="{{ route('tipos-combustibles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('tipo_combustible') }}
                                        {{ Form::text('tipo_combustible', $typeFuel->tipo_combustible, ['class' => 'form-control' . ($errors->has('tipo_combustible') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Combustible']) }}
                                        {!! $errors->first('tipo_combustible', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection