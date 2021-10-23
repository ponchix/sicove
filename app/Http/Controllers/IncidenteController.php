<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incidentes=incidente::all();
        $Datas = Incidente::select(DB::raw("COUNT(*) as count"))
        ->whereYear('Fecha_reporte', date('Y'))
        ->groupBy(DB::raw("Month(Fecha_reporte)"))
        ->pluck('count');
        $months = Incidente::select(DB::raw("Month(Fecha_reporte) as month"))
        ->whereYear('Fecha_reporte', date('Y'))
        ->groupBy(DB::raw("Month(Fecha_reporte)"))
        ->pluck('month');

        $datas=array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index=>$month){
            $month=$month-1;
            $datas[$month]=$Datas[$index];
        }
         return view('vehiculos/Incidentes.index',compact('incidentes','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehiculos/Incidentes.crear');
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
            'vehiculo'=>'required',
            'conductor'=>'required',
            'Fecha_reporte'=>'required',
            'descripcion'=>'required',
            'importancia'=>'required',
            'detallada'=>'required',
            'foto'=>'required',           
        ]);
        $incidente=$request->all();
        if ($imagen=$request->file('foto')) {
            $rutaImg='incidente/';
            $imagenIncidente=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenIncidente);
            $incidente['foto']="$imagenIncidente";
        }
        Incidente::create($incidente);
        Cache::flush();
        return redirect()->route('incidentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function show(incidente $incidente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $incidentes=Incidente::find($id);
        return view('vehiculos/Incidentes.editar',compact('incidentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'vehiculo'=>'required',
            'conductor'=>'required',
            'Fecha_reporte'=>'required',
            'descripcion'=>'required',
            'importancia'=>'required',
            'detallada'=>'required',
            'foto'=>'required',           
        ]);
        $incidente=$request->all();
        if ($imagen=$request->file('foto')) {
            $rutaImg='incidente/';
            $imagenIncidente=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenIncidente);
            $incidente['foto']="$imagenIncidente";
        }else{
            unset($incidente['imagen']);
        }

        $incidentes=Incidente::find($id);
        $incidentes->update($incidente);
        Cache::flush();
        return redirect()->route('incidentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Incidente::find($id)->delete();
        Cache::flush();
        return redirect()->route('incidentes.index');
  
    }


}
