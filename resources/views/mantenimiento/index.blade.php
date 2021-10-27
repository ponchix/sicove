<title>Mantenimiento</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mantenimiento</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('servicios.create')}}" class="btn btn-primary mb-0 mt-1"><i class="fas fa-plus"></i> Mantenimiento</a>
                        <div class="titulo mt-3 mb-1">Bitácora</div>

                        <div class="table-responsive">  
                           @include('mantenimiento.DatatableMantenimiento')
                       </div>


             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection