<?php

namespace App\Http\Controllers;

use App\Models\mantenimiento;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class mantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mantenimientos=mantenimiento::all();
        return view('mantenimiento.index',compact('mantenimientos'));
    
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
        return view('mantenimiento.crear',compact('vehiculos'));
        
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
            'fecha_inicio'=>'required',
            'hora_entrada'=>'required',
            'vehiculo'=>'required',
            'odometro'=>'required',
            'servicios'=>'required',
            'costo_partes'=>'required',
            'mano_obra'=>'required',
            'total'=>'required',
            'referencia_man'=>'required',
            'tipo_man'=>'required',
            'proveedor'=>'required',
            'comentario',
            'imagen_man'=>'required',
        ]);
        $mantenimiento=$request->all();
        if ($imagen=$request->file('imagen_man')) {
            $rutaImg='mantenimiento/';
            $imagenMantenimiento=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenMantenimiento);
            $mantenimiento['imagen_man']="$imagenMantenimiento";
        }
        mantenimiento::create($mantenimiento);
        Cache::flush();
        return redirect()->route('servicios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
