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

<!---Cards---->



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
                        <div class="titulo">Resumen</div>
                        <div class="row text-center">
                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Total de Vehiculos</h5>
                                        @php
                                            use App\Models\VehiculoModel;
                                            $cant_vehiculos=VehiculoModel::count();
                                        @endphp
                                        <h2 class="text-right"> <i class=" fas fa-car-side f-left"></i> <span>{{$cant_vehiculos}}</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Conductores</h5>
                                        @php
                                        use App\Models\Conductor;
                                        $cant_conductores=Conductor::count();
                                    @endphp
                                        <h2 class="text-right"> <i class="fas fa-user f-left"></i><span>{{$cant_conductores}}</span></h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Incidentes</h5>
                                        @php
                                        use App\Models\Incidente;
                                        $cant_users=Incidente::count();
                                    @endphp
                                        <h2 class="text-right"> <i class="fas fa-car-crash f-left"></i></i><span>{{$cant_users}}</span></h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                          <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-green order-card">
                                  <div class="card-block">
                                      <h5>Gastos Totales</h5>
                                      <h2 class="text-right"> <i class="fas fa-hand-holding-usd f-left"></i> <span>{{$total}} MXN</span></h2>
                                  </div>
                              </div>
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

