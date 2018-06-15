<?php

namespace App\Http\Controllers;

use App\Ciclo;
use App\Finca;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function index()
    {
        $fincas = Finca::has('planificaciones')
            ->sortable(['name' => 'asc'])
            ->paginate();

        return view('ciclos.index' , compact('fincas'));
    }

    public function show($finca_id)
    {
        $finca = Finca::findOrFail($finca_id);

        $piscinas = $finca->piscinas_sembradas;

        return view('ciclos.detail' , compact('piscinas'));
    }

    public function create ($finca_id) {
        $finca = Finca::findOrFail($finca_id);
        $btnText = __("Activar Piscina");
        return view('ciclos.form' , compact('finca' , 'btnText'));
    }

    public function store (Request $request) {
        Ciclo::create([
            'planificacion_id' => $request->planificacion_id ,
            'piscina_id' => $request->piscina_id ,
            'precio_larva' => $request->precio_larva,
            'densidad' => $request->densidad,
            'activo' => 1
        ]);

        return back()->with('message', ['success', __('Piscina Sembrada Correctamente')]);
    }

    public function edit (Ciclo $ciclo) {
        $btnText = __("Actualizar");
        return view('ciclos.editform', ['ciclo' => $ciclo , 'btnText' => $btnText]);
    }

    public function update (Request $request, Ciclo $ciclo) {
        $ciclo->fill([
            'precio_larva' => $request->precio_larva,
            'densidad' => $request->densidad
        ])->save();

        return back()->with('message', ['success', __('Actualizado')]);
    }

    public function destroy (Ciclo $ciclo) {
        try {
            if($ciclo->delete()){
                $ciclo->update(array('activo' => 0));
            }
            return back()->with('message', ['success', __("Siembra Desactivado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error desactivando la siembra, no se pudo eliminar")]);
        }
    }
}
