<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mecanicos=Mecanico::all();
        Cache::flush();
        return view('mecanicos.index',compact('mecanicos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuarios=User::all();
        $mecanicos=DB::table('users')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->select('users.name','users.id')
        ->where('roles.name','=','Mecanico')
        ->get();
        return view('mecanicos.crear',compact('usuarios','mecanicos'));
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
            'imagen'=>'required',
            'NombreMecanico'=>'required',
            'APaterno'=>'required',    
            'AMaterno'=>'required',    
            'edad'=>'required',    
            'direccion'=>'required',    
            'telefono'=>'required',    
           
        ]);
        $mecanicos=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='mecanicos/';
            $imagenMecanico=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenMecanico);
            $mecanicos['imagen']="$imagenMecanico";
        }
       Mecanico::create($mecanicos);
        Cache::flush();
        return redirect()->route('mecanico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function show(Mecanico $mecanico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mecanicos=Mecanico::find($id);
     
        return view('mecanicos.editar',compact('mecanicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        request()->validate([
            'imagen',
            'NombreMecanico'=>'required',
            'APaterno'=>'required',    
            'AMaterno'=>'required',    
            'edad'=>'required',    
            'direccion'=>'required',    
            'telefono'=>'required',    
           
        ]);
        $input=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='mecanicos/';
            $imagenMecanico=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenMecanico);
            $input['imagen']="$imagenMecanico";
        }else{
            unset($input['imagen']);
        }
        $mecanicos=Mecanico::find($id);
        $mecanicos->update($input);
        Cache::flush();
        return redirect()->route('mecanico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Mecanico::find($id)->delete();
        Cache::flush();
        return redirect()->route('mecanico.index');
    }
}
