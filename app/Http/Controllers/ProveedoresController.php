<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

use Illuminate\Support\Facades\Cache;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('proveedores')) {
            $proveedores=Cache::get('proveedores');
        } else {
            $proveedores=Proveedor::where('status',2)->latest('id');
           
        }
        
        $proveedores=Proveedor::all();  
       return view('proveedores.index',compact('proveedores')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $proveedores=Proveedor::all();
        return view('proveedores.crear',compact('proveedores'));
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
            'NombreProveedor'=>'required',
            'RFC'=>'required',
            'TelefonoP'=>'required',
            'Domicilio'=>'required',
            'correoP'=>'required',
            'nombreContacto'=>'required',
            'TelefonoC'=>'required', 
             'correo'=>'required',          
        ]);
        $proveedores=$request->all();
        Proveedor::create($proveedores);
        Cache::flush();
        return redirect()->route('proveedores.index')->with('add','agregar');
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
      
        $proveedores=Proveedor::find($id);
        return view('proveedores.editar',compact('proveedores'));
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
            'NombreProveedor'=>'required',
            'RFC'=>'required',
            'TelefonoP'=>'required',
            'Domicilio'=>'required',
            'correoP'=>'required',
            'nombreContacto'=>'required',
            'TelefonoC'=>'required',  
            'correo'=>'required',          
        ]);

        $prov=$request->all();
        $proveedores=Proveedor::find($id);
        $proveedores->update($prov);
        Cache::flush();
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();
      Cache::flush();
      return redirect()->route('proveedores.index');
    }
}
