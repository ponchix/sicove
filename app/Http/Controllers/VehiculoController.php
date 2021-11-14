<?php

namespace App\Http\Controllers;

use App\Models\incidente;
use Illuminate\Http\Request;
use App\Models\VehiculoModel;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\TipoVehiculo;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        if (Cache::has('vehiculos')) {
            $vehiculos=Cache::get('vehiculos');
        } else {
            $vehiculos=VehiculoModel::where('status',2)->latest('id');
           
        }
        
        $vehiculos=VehiculoModel::all();


        // $relaciones = DB::table('vehiculos')
        //     ->join('marcas', 'vehiculos.id', '=', 'marcas.id_marca')
        //     ->select('marca')
        //     ->get();
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
        $tipos=TipoVehiculo::all();
        return view('vehiculos.crear',compact('tipos'));
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
            'fecha_compra'=>'required',    
            'Modelo'=>'required',    
            'MedidaUso'=>'required',    
            'MedidaCombustible'=>'required',    
            'anio'=>'required',    
            'CompaniaSeguros'=>'required',
            'NoSerie'=>'required',
            'PolizaSeguro'=>'required',
            'Placa'=>'required',
            'Color'=>'required',
            'imagen'=>'required',
            'combustible'=>'required',
            'motor'=>'required',
            'cilindraje'=>'required',
            'cilindrada'=>'required',
            'fecha_poliza'=>'required',
            'factura'=>'required',
            
        ]);
        $vehiculo=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='imagen/';
            $imagenVehiculo=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenVehiculo);
            $vehiculo['imagen']="$imagenVehiculo";
        }
        if ($factura=$request->file('factura')) {
            $rutaFac='factura/';
            $facturaVehiculo=date('YmdHis').".".$factura->getClientOriginalExtension();
            $factura->move($rutaFac,$facturaVehiculo);
            $vehiculo['factura']="$facturaVehiculo";
        }
        VehiculoModel::create($vehiculo);
        Cache::flush();
        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $vehiculo=VehiculoModel::find($id);
        $modelo=DB::table('vehiculos')
        ->join('marcas','vehiculos.Marca','=','marcas.id')
        ->join('modelos','marcas.id','=','modelos.id_marca')
        ->select('modelos.modelo')
        ->where('vehiculos.id','=',$id)
        ->get();
        
      
        $datas = Incidente::select(DB::raw("COUNT(*) as count"))
        ->where('vehiculo','=',$id)
        ->groupBy(DB::raw("Month(Fecha_reporte)"))
        ->pluck('count');
         return view('vehiculos.perfil',compact('vehiculo','modelo','datas'));

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
        $marcas=Marca::all();
        $modelos=Modelo::all();

        $tipos=TipoVehiculo::all();
//return view('vehiculos.editar',compact('vehiculoModel'));
        $vehiculos=VehiculoModel::find($id);
     
        return view('vehiculos.editar',compact('vehiculos','marcas','modelos','tipos'));
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
            'Marca',    
            'StatusInicial'=>'required',    
            'fecha_compra'=>'required',    
            'Modelo',    
            'MedidaUso'=>'required',    
            'MedidaCombustible'=>'required',    
            'anio'=>'required',    
            'CompaniaSeguros'=>'required',
            'NoSerie'=>'required',
            'PolizaSeguro'=>'required',
            'Placa'=>'required',
            'Color'=>'required',
            'imagen',
            'combustible'=>'required',
            'motor'=>'required',
            'cilindraje'=>'required',
            'cilindrada'=>'required',
            'fecha_poliza'=>'required',
            'factura',
            
        ]);
        $input=$request->all();
        if ($imagen=$request->file('imagen')) {
            $rutaImg='imagen/';
            $imagenVehiculo=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaImg,$imagenVehiculo);
            $input['imagen']="$imagenVehiculo";
        }else{
            unset($input['imagen']);
        }
        if ($factura=$request->file('factura')) {
            $rutaFac='factura/';
            $facturaVehiculo=date('YmdHis').".".$factura->getClientOriginalExtension();
            $factura->move($rutaFac,$facturaVehiculo);
            $input['factura']="$facturaVehiculo";
        }else{
            unset($input['factura']);
        }
        $vehiculos=VehiculoModel::find($id);
        $vehiculos->update($input);
        Cache::flush();
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
      Cache::flush();
      return redirect()->route('vehiculos.index');

  }
}