<title>Conductor | {{$conductor->NombreConductor}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Información Conductor</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                     <a href="{{route('conductores.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-chevron-left"></i> Atrás</a>
                     <img src="/imagen/{{$conductor->imagen}}">
                    {{$conductor->NombreConductor}}
                    {{$conductor->APaterno}}
                    {{$conductor->AMaterno}}
                    {{$conductor->edad}}
                    {{$conductor->direccion}}
                    {{$conductor->telefono}}
                    {{$conductor->NoLicencia}}
                    {{$conductor->fecha_exp}}
                    {{$conductor->tipoLicencia}}
                    {{$conductor->estado->status}}
                
                    
             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection