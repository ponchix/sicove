@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard </h3>
    </div>
    <div class="section-body">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div id="contenedor" >
                            <div id="caja">
                                <label id="hora"></label>
                            </div>
                            <div id="caja2">
                                <label id="minuto"></label>
                            </div>
                            <div id="caja3">
                                <label id="segundo"></label>
                            </div>
                        </div>
                              <div class="titulo">Agenda</div>

                              @include('Calendario.index')                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

