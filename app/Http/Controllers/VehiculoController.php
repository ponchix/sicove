<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\incidente;
use Illuminate\Http\Request;
use App\Models\VehiculoModel;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Status;
use App\Models\Conductor;
use App\Models\TipoVehiculo;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{

    function _construct()
    {
        $this->middleware('permission:ver-vehiculo | crear-vehiculo|editar-vehiculo|borrar-vehiculo', ['only' => ['index']]);
        $this->middleware('permission:crear-vehiculo', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-vehiculo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-vehiculo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $vehiculos = VehiculoModel::all();
        $estados = Status::all();
        Cache::flush();
        return view('vehiculos.index', compact('vehiculos', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipos = TipoVehiculo::all();
        $estados = Status::all();
        return view('vehiculos.crear', compact('tipos', 'estados'));
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

        request()->validate(
            [
                'NombreVehiculo' => 'required',
                'TipoVehiculo' => 'required',
                'Marca' => 'required',
                //'StatusInicial'=>'required',    
                'fecha_compra' => 'required',
                'Modelo' => 'required',
                'MedidaUso' => 'required',
                'MedidaCombustible' => 'required',
                'anio' => 'required',
                'CompaniaSeguros' => 'required',
                'NoSerie' => 'required',
                'PolizaSeguro' => 'required',
                'Placa' => 'required',
                'Color' => 'required',
                'imagen' => 'required',
                'combustible' => 'required',
                'motor' => 'required',
                'cilindraje' => 'required',
                'cilindrada' => 'required',
                'fecha_poliza' => 'required',
                'factura' => 'required',

            ],
            [
                'NombreVehiculo.required' => 'El Campo Nombre del Vehiculo es obligatorio',
                'TipoVehiculo.required' => 'El campo Tipo de Vehiculo obligatorio',
                'Marca.required' => 'El campo Marca es obligatorio',
                'fecha_compra.required' => 'El campo Fecha de compra es obligatorio',
                'Modelo.required' => 'El campo Modelo es obligatorio',
                'MedidaUso.required' => 'El campo Medida de Uso es obligatorio',
                'MedidaCombustible.required' => 'El campo Medida de Combustble es obligatorio',
                'anio.required' => 'El campo Año es obligatorio',
                'CompaniaSeguros.required' => 'El campo Compañia de Seguros es obligatorio',
                'NoSerie.required' => 'El campo Numero de Serie es obligatorio',
                'PolizaSeguro.required' => 'El campo Poliza es obligatorio',
                'Placa.required' => 'El campo Placa es obligatorio',
                'Color.required' => 'El campo Color es obligatorio',
                'imagen.required' => 'La imagen es Obligatoria',
                'combustible.required' => 'El campo Combustible es obligatorio',
                'motor.required' => 'El campo Motor es obligatorio',
                'cilindraje.required' => 'El campo Cilindraje es obligatorio',
                'cilindrada.required' => 'El campo Cilindrada es obligatorio',
                'fecha_poliza.required' => 'El campo Vigencia Poliza es obligatrio ',
                'factura.required' => 'El campo Factura es obligatorio',
            ]
        );
        $vehiculo = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'imagen/';
            $imagenVehiculo = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenVehiculo);
            $vehiculo['imagen'] = "$imagenVehiculo";
        }
        if ($factura = $request->file('factura')) {
            $rutaFac = 'factura/';
            $facturaVehiculo = date('YmdHis') . "." . $factura->getClientOriginalExtension();
            $factura->move($rutaFac, $facturaVehiculo);
            $vehiculo['factura'] = "$facturaVehiculo";
        }
        VehiculoModel::create($vehiculo);
        Cache::flush();
        return redirect()->route('vehiculos.index')->with('add','agregar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vehiculo = VehiculoModel::findorFail($id);
        $modelo = DB::table('vehiculos')
            ->join('marcas', 'vehiculos.Marca', '=', 'marcas.id')
            ->join('modelos', 'marcas.id', '=', 'modelos.id_marca')
            ->select('modelos.modelo')
            ->where('vehiculos.id', '=', $id)
            ->get();


        $datas = Incidente::select(DB::raw("COUNT(*) as count"))
            ->where('vehiculo', '=', $id)
            ->groupBy(DB::raw("Month(Fecha_reporte)"))
            ->pluck('count');

        $servicios = DB::table('vehiculos')
            ->join('mantenimientos', 'vehiculos.id', '=', 'mantenimientos.vehiculo')
            ->join('mantenimiento_service', 'mantenimientos.id', '=', 'mantenimiento_service.mantenimiento_id')
            ->join('services', 'mantenimiento_service.service_id', '=', 'services.id')
            ->join('mecanicos', 'mantenimientos.mecanico', '=', 'mecanicos.id')
            ->select('services.nombre', 'mantenimientos.*', 'mecanicos.NombreMecanico')
            ->where('vehiculos.id', '=', $id)
            ->get();

        $gastos = DB::table('gastos')
            ->where('vehiculo', $id)
            ->sum('monto');

        $mantenimientos = DB::table('mantenimientos')
            ->where('vehiculo', $id)
            ->sum('total');

        return view('vehiculos.perfil', compact(
            'vehiculo',
            'modelo',
            'datas',
            'servicios',
            'gastos',
            'mantenimientos'
        ));
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
        $marcas = Marca::all();
        $modelos = Modelo::all();

        $tipos = TipoVehiculo::all();
        //return view('vehiculos.editar',compact('vehiculoModel'));
        $vehiculos = VehiculoModel::find($id);
        $estados = Status::all();

        return view('vehiculos.editar', compact(
            'vehiculos',
            'marcas',
            'modelos',
            'tipos',
            'estados'
        ));
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
            'NombreVehiculo' => 'required',
            'TipoVehiculo' => 'required',
            'Marca',
            'StatusInicial' => 'required',
            'fecha_compra' => 'required',
            'Modelo',
            'MedidaUso' => 'required',
            'MedidaCombustible' => 'required',
            'anio' => 'required',
            'CompaniaSeguros' => 'required',
            'NoSerie' => 'required',
            'PolizaSeguro' => 'required',
            'Placa' => 'required',
            'Color' => 'required',
            'imagen',
            'combustible' => 'required',
            'motor' => 'required',
            'cilindraje' => 'required',
            'cilindrada' => 'required',
            'fecha_poliza' => 'required',
            'factura',

        ]);
        $input = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'imagen/';
            $imagenVehiculo = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenVehiculo);
            $input['imagen'] = "$imagenVehiculo";
        } else {
            unset($input['imagen']);
        }
        if ($factura = $request->file('factura')) {
            $rutaFac = 'factura/';
            $facturaVehiculo = date('YmdHis') . "." . $factura->getClientOriginalExtension();
            $factura->move($rutaFac, $facturaVehiculo);
            $input['factura'] = "$facturaVehiculo";
        } else {
            unset($input['factura']);
        }
        $vehiculos = VehiculoModel::find($id);
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
    public function vehiculos_update(Request $request, $id)
    {
        $vehiculo = VehiculoModel::find($id);
        $vehiculo->update([
            'StatusInicial' => $request->value,
        ]);
        $edit_status = $request->value;
        return $edit_status;
    }

    // public function vehiculos_asignacion(Request $request,$id){
    //     $vehiculo=VehiculoModel::find($id);
    //     $conductores=Conductor::where('status',2)->get();
    //     return view('vehiculos/asignaciones.asignacion',compact(
    //         'conductores',
    //         'vehiculo'
    //     ));

    // }



}
