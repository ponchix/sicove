<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('conductores')) {
            $conductores=Cache::get('conductores');
        } else {
            $conductores=Conductor::where('status',2)->latest('id');
           
        }
        
        $conductores=Conductor::all();  

         return view ('conductores.index',compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conductores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'imagen'=>'required',
            'NombreConductor'=>'required',
            'APaterno'=>'required',    
            'AMaterno'=>'required',    
            'edad'=>'required',    
            'direccion'=>'required',    
            'telefono'=>'required',    
            'NoLiciencia'=>'required',    
            'fecha_exp'=>'required',
            'tipoLicencia'=>'required',
           
        ]);
        $conductores=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='imagen/';
            $imagenConductor=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenConductor);
            $conductores['imagen']="$imagenConductor";
        }
       Conductor::create($conductores);
        Cache::flush();
        return redirect()->route('conductores.index');
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
       $conductores=Conductor::find($id);
     
        return view('conductores.editar',compact('conductores'));
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
       request()->validate([
            'imagen',
            'NombreConductor'=>'required',
            'APaterno'=>'required',    
            'AMaterno'=>'required',    
            'edad'=>'required',    
            'direccion'=>'required',    
            'telefono'=>'required',    
            'NoLiciencia'=>'required',    
            'fecha_exp'=>'required',
            'tipoLicencia'=>'required',
           
        ]);
        $cond=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='imagen/';
            $imagenConductor=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenConductor);
            $cond['imagen']="$imagenConductor";
        }else{
            unset($conductores['imagen']);
        }
        $conductores=Conductor::find($id);
        $conductores->update($cond);
        Cache::flush();
        return redirect()->route('conductores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conductor::find($id)->delete();
      Cache::flush();
      return redirect()->route('conductores.index');
    }
}
