<?php

namespace App\Http\Controllers;

use App\Models\mantenimiento;
use App\Models\Service;
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
        if (Cache::has('vehiculos')) {
            $vehiculos=Cache::get('mantenimientos');
        } else {
            $vehiculos=VehiculoModel::where('status',2)->latest('id');
           
        }
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
        $servicios=Service::all();
        return view('mantenimiento.crear',compact('vehiculos','servicios'));
        
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
        // request()->validate([
        //     'fecha_inicio'=>'required',
        //     'hora_entrada'=>'required',
        //     'vehiculo'=>'required',
        //     'odometro'=>'required',
        //     'servicios'=>'required',
        //     'costo_partes'=>'required',
        //     'mano_obra'=>'required',
        //     'total'=>'required',
        //     'referencia_man'=>'required',
        //     'tipo_man'=>'required',
        //     'proveedor'=>'required',
        //     'comentario',
        //     'imagen_man'=>'required',
        // ]);
        // $mantenimiento=$request->all();
        // if ($imagen=$request->file('imagen_man')) {
        //     $rutaImg='mantenimiento/';
        //     $imagenMantenimiento=date('YmdHis').".".$imagen->getClientOriginalExtension();
        //     $imagen->move($rutaImg,$imagenMantenimiento);
        //     $mantenimiento['imagen_man']="$imagenMantenimiento";
        // }

        $imagen_man="";
        if($request->file('imagen_man')){
            $imagen_man=$request->file('imagen_man')->store('mantenimiento','public');
        }
        $mantenimiento=mantenimiento::create([
            'fecha_inicio'=>$request->fecha_inicio,
            'hora_entrada'=>$request->hora_entrada,
            'vehiculo'=>$request->vehiculo,
            'odometro'=>$request->odometro,
            //'servicios'=>$request->servicios,
            'costo_partes'=>$request->costo_partes,
            'mano_obra'=>$request->mano_obra,
            'total'=>$request->total,
            'referencia_man'=>$request->referencia_man,
            'tipo_man'=>$request->tipo_man,
            'proveedor'=>$request->proveedor,
            'comentario'=>$request->comentario,
            'imagen_man'=>$imagen_man,
        ]);
       
        // mantenimiento::create($mantenimiento);
        $mantenimiento->servicios()->attach($request->servicios);
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
