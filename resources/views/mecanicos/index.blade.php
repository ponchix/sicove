<title>Mecanicos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mecánicos</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('mecanico.create')}}" class="btn btn-outline-primary mb-0 mt-1"><i class="fas fa-plus"></i> Mecánico</a>
                       
                        <div class="titulo mt-3 mb-1">Lista de Mecánicos</div>

                        <div class="table-responsive">  
                           @include('mecanicos.DatatableMecanicos')
                       </div>

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection