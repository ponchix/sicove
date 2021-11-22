<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\Conductor;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\returnSelf;

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

      
        $vehiculos=VehiculoModel::where('StatusInicial',2)->get();
        $conductores=Conductor::where('status',2)->get();
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
        request()->validate([
            'conductor'=>'required',
            'vehiculo'=>'required',
            'fecha_a'=>'required',
            'fecha_e',
            'odometro_a'=>'required',
            'odometro_e',
            'combustible_a'=>'required',
            'combustible_e',
        ]);
        $input=$request->all();
        $conductor=$request->input('conductor');
        Conductor::where('id',$conductor)->update([
            'status'=>1
        ]);
        assignment::create($input);
        Cache::flush();
        return redirect()->route('asignaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $conductor=DB::table('users')
        ->join('conductors','users.id','=','conductors.NombreConductor')
        ->join('assignments','conductors.id','=','assignments.conductor')
        ->select('users.name','conductors.APaterno')
        ->where('assignments.id','=',$id)
        ->get();
        $asignacion=assignment::find($id);
        return view('asignaciones.show',compact('asignacion','conductor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $conductores=Conductor::all();
        $vehiculos=VehiculoModel::all();
        $asignaciones=assignment::find($id);
        return view('asignaciones.editar',compact(
            'asignaciones',
            'conductores',
            'vehiculos'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'conductor'=>'required',
            'vehiculo'=>'required',
            'fecha_a'=>'required',
            'fecha_e'=>'required',
            'odometro_a'=>'required',
            'odometro_e'=>'required',
            'combustible_a'=>'required',
            'combustible_e'=>'required',
        ]);
        $input=$request->all();
        $asignaciones=assignment::find($id);
        $asignaciones->update($input);
        Cache::flush();
        return redirect()->route('asignaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        assignment::find($id)->delete();
      Cache::flush();
      return redirect()->route('asignaciones.index');
    }

    public function entrega_edit($id){
        $conductores=Conductor::all();
        $asignaciones=assignment::find($id);
        return view('asignaciones.entrega',compact(
            'asignaciones',
            'conductores'
        ));

    }
    public function entrega_update(Request $request,$id)
    {
        request()->validate([
            'conductor',
            'fecha_e'=>'required',
            'odometro_e'=>'required',
            'combustible_e'=>'required',
            ]);
            $conductor=$request->input('conductor');
            Conductor::where('id',$conductor)->update([
                'status'=>2
            ]);
        $input=$request->all();
        $asignaciones=assignment::find($id);
        $asignaciones->update($input);
        Cache::flush();
        return redirect()->route('asignaciones.index');
}
}
