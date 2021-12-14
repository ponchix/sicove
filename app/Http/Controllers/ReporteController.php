<?php

namespace App\Http\Controllers;

use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReporteController extends Controller
{
    //
    public function index(){
        return view('pdfs.reportes');
    }
    public function pdf_incidentes()
    {
        $vehiculos=VehiculoModel::all();
        $disponible=VehiculoModel::where('StatusInicial','=',2)->count();
        $asignado=VehiculoModel::where('StatusInicial','=',1)->count();
        $taller=VehiculoModel::where('StatusInicial','=',4)->count();
        $fuera=VehiculoModel::where('StatusInicial','=',3)->count();
        $total=VehiculoModel::where('StatusInicial','!=',5)->count();
        $seguros=DB::select('select  count(companiaseguros) as seguros, NombreVehiculo,CompaniaSeguros FROM vehiculos group by companiaseguros, Nombrevehiculo');
        $polizas=VehiculoModel::selectRaw('id, NombreVehiculo,CompaniaSeguros,DATE(fecha_poliza) as vencimiento')
        ->orderBy('vencimiento','asc')
        ->get()
        ->groupBy('vencimiento');
        
        $pdf =PDF::loadView('pdfs.vehiculosPDF',['vehiculos'=>$vehiculos,
        'disponible'=>$disponible,
        'asignado'=>$asignado,
        'taller'=>$taller,
        'fuera'=>$fuera,
        'total'=>$total,
        'seguros'=>$seguros,
        'polizas'=>$polizas
    ])->setPaper('letter','portrait')->setWarnings(true);

        return $pdf->stream();
         }
}
