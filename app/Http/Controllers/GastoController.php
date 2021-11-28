<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\gasto;
use App\Models\Proveedor;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gastos=gasto::all();
        return view('vehiculos/gastos.index',compact('gastos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehiculos=VehiculoModel::all();
        $conductores=Conductor::all();
        $proveedores=Proveedor::all();
        return view('vehiculos/gastos.crear',compact(
            'vehiculos',
        'conductores',
        'proveedores'));
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
        request()->validate([
            'fecha'=>'required',
            'concepto'=>'required',
            'referencia'=>'required',
            'monto'=>'required',
            'vehiculo'=>'required',
            'conductor'=>'required',
            'proveedor'=>'required',           
        ]);
        $gasto=$request->all();
        gasto::create($gasto);
        Cache::flush();
        return redirect()->route('gastos.index')->with('add','agregar');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vehiculos=VehiculoModel::all();
        $gastos=gasto::find($id);
        return view('vehiculos/gastos.editar',compact('gastos','vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'fecha'=>'required',
            'concepto'=>'required',
            'referencia'=>'required',
            'monto'=>'required',
            'vehiculo'=>'required',
            'conductor'=>'required',
            'proveedor'=>'required',           
        ]);

        $input=$request->all();
        $gasto=gasto::find($id);
        $gasto->update($input);
        Cache::flush();
        return redirect()->route('gastos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(gasto $gasto)
    {
        //
    }
}
