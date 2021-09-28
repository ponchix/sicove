<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiculoModel;


class VehiculoController extends Controller
{

        function _construct(){
        $this->middleware('permission:ver-vehiculo | crear-vehiculo|editar-vehiculo|borrar-vehiculo',['only'=>['index']]);
        $this->middleware('permission:crear-vehiculo',['only'=>['create','store']]);
        $this->middleware('permission:editar-vehiculo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-vehiculo',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehiculos=VehiculoModel::all();
        return view ('vehiculos.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehiculos.crear');
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
            'NombreVehiculo'=>'required',
            'TipoVehiculo'=>'required',
            'Marca'=>'required',    
            'StatusInicial'=>'required',    
            'Estadisticas'=>'required',    
            'Modelo'=>'required',    
            'MedidaUso'=>'required',    
            'MedidaCombustible'=>'required',    
            'anio'=>'required',    
            'Grupo'=>'required',
            'CompaniaSeguros'=>'required',
            'NoSerie'=>'required',
            'PolizaSeguro'=>'required',
            'Placa'=>'required',
            'Color'=>'required',
            
        ]);
        VehiculoModel::create($request->all());
        return redirect()->route('vehiculos.index')->with('agregar','ok');
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
        $vehiculo=VehiculoModel::find($id);
          return view('vehiculos.perfil',compact('vehiculo'));

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
//return view('vehiculos.editar',compact('vehiculoModel'));
        $vehiculos=VehiculoModel::find($id);
        return view('vehiculos.editar',compact('vehiculos'));
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
        request()->validate([
            'NombreVehiculo'=>'required',
            'TipoVehiculo'=>'required',
            'Marca'=>'required',    
            'StatusInicial'=>'required',    
            'Estadisticas'=>'required',    
            'Modelo'=>'required',    
            'MedidaUso'=>'required',    
            'MedidaCombustible'=>'required',    
            'anio'=>'required',    
            'Grupo'=>'required',
            'CompaniaSeguros'=>'required',
            'NoSerie'=>'required',
            'PolizaSeguro'=>'required',
            'Placa'=>'required',
            'Color'=>'required',
            
        ]);
        $input=$request->all();
        $vehiculos=VehiculoModel::find($id);
        $vehiculos->update($input);
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      VehiculoModel::find($id)->delete();
        return redirect()->route('vehiculos.index');

    }
}
