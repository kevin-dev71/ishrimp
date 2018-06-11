<?php

namespace App\Http\Controllers\Admin;


use App\Finca;
use App\Planificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

class PlanificacionController extends Controller
{
    public function index(){
        $fincas = Finca::has('planificaciones')
            ->sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.planificaciones.index' , compact('fincas'));
    }

    public function show($finca_id){
        $finca = Finca::findOrFail($finca_id);
        return view('admin.planificaciones.detail' , compact('finca'));
    }

    public function create () {
        $planificacion = new Planificacion;
        $btnText = __("Registrar");
        return view('admin.planificaciones.form', ['planificacion' => $planificacion , 'btnText' => $btnText]);
    }

    public function store (Request $request) {
        $ciclo = $request->ciclo;
        $ano = $request->ano;
        $dt = Carbon::create( $ano-1, 12, 31);
        $periodo = (365 + $dt->format('L')) / $ciclo;
        //$interval = new DateInterval("P".(int)$periodo."D");
        //$dates = new DatePeriod($dt, $interval, DateTime());
        for($i = 1 ; $i <= $ciclo ; $i++){
            $dt->addDays(1);
            Planificacion::create([
                'finca_id'      => $request->finca_id,
                'ano'           => $ano,
                'ciclo'         => $i,
                'fecha_inicial' => $dt->toDateString(),
                'fecha_final'   => $dt->addDays((int)$periodo)->toDateString()
            ]);
        }

        return back()->with('message', ['success', __('Planificaciones Creado satisfactoriamente')]);
    }

    public function destroy ($finca_id) {
        try {
            Finca::findOrFail($finca_id)->planificaciones()->delete();
            return back()->with('message', ['success', __("Planificaciones eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando las Planificaciones, no se pudo eliminar")]);
        }
    }
}
