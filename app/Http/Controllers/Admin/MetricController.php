<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MetricRequest;
use App\Metric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetricController extends Controller
{
    public function index(){
        $metrics = Metric::sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.metrics.index' , compact('metrics'));
    }

    public function show(Metric $metric){
        return view('admin.metrics.detail' , compact('metric'));

    }

    public function create () {
        $metric = new Metric;
        $btnText = __("Crear Unidad de Medicion");
        return view('admin.metrics.form', ['metric' => $metric , 'btnText' => $btnText]);
    }

    public function store (MetricRequest $metric_request) {
        Metric::create([
            'name' => $metric_request->name ,
            'equivalente' => $metric_request->equivalente ,
            'valor' => $metric_request->valor
        ]);

        return back()->with('message', ['success', __('Metrica Creado satisfactoriamente')]);
    }

    public function edit (Metric $metric) {
        $btnText = __("Actualizar Unidad de Medicion");
        return view('admin.metrics.form', ['metric' => $metric , 'btnText' => $btnText]);
    }

    public function update (MetricRequest $metric_request, Metric $metric) {
        $metric->fill([
            'name' => $metric_request->name ,
            'equivalente' => $metric_request->equivalente ,
            'valor' => $metric_request->valor
        ])->save();

        return back()->with('message', ['success', __('Metrica actualizado')]);
    }

    public function destroy (Metric $metric) {
        try {
            $metric->delete();
            return back()->with('message', ['success', __("Metrica eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando la metrica, no se pudo eliminar")]);
        }
    }
}
