@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                            @livewireStyles
                            @livewire('select-dep')
                            @livewireScripts


<!-- Button trigger modal -->



<!-- Modal -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

