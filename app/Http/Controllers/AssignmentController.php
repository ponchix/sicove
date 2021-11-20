<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\Conductor;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignaciones=assignment::all();
        return view('asignaciones.index',compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $conductores=Conductor::all();
        $vehiculos=VehiculoModel::where('StatusInicial',2)->get();
        return view('asignaciones.crear',compact(
            'conductores',
            'vehiculos'
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(assignment $assignment)
    {
        //
    }
}
