<?php

namespace App\Http\Controllers\Admin;

use App\Finca;
use App\Http\Requests\FincaRequest;
use App\Piscina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FincaController extends Controller
{
    public function index(){
        $fincas = Finca::with('piscinas')
            ->sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.fincas.index' , compact('fincas'));
    }

    public function show(Finca $finca){
        return view('admin.fincas.detail' , compact('finca'));
    }

    public function create () {
        $finca = new Finca;
        $btnText = __("Crear Finca");
        return view('admin.fincas.form', ['finca' => $finca , 'btnText' => $btnText]);
    }

    public function store (FincaRequest $finca_request) {
        $total_area = 0;
        $i = 0;
        foreach ($finca_request->input("piscinas") as $area){
            $total_area += $area;
        }
        $finca_id = Finca::create([
            'name' => $finca_request->name ,
            'total_area' => $total_area
        ])->id;

        foreach ($finca_request->input("piscinas") as $area){
            Piscina::create([
                'finca_id' => $finca_id,
                'name' => ++$i,
                'area' => $area
            ]);
        }

        return back()->with('message', ['success', __('Finca Creado satisfactoriamente con sus piscinas')]);
    }

    public function edit (Finca $finca) {
        $btnText = __("Actualizar finca");
        return view('admin.fincas.form', ['finca' => $finca , 'btnText' => $btnText]);
    }

    public function update (FincaRequest $finca_request, Finca $finca) {
        $total_area = 0;
        foreach ($finca_request->input("piscinas") as $area){
            $total_area += $area;
        }
        $finca->fill([
            'name' => $finca_request->name ,
            'total_area' => $total_area
        ])->save();

        $total_piscinas = $finca->total_piscinas;
        $total_piscinas_a_modificar = count($finca_request->input("piscinas"));

        if($total_piscinas === $total_piscinas_a_modificar){ // no se adicionaron ni quitaron piscinas
            foreach($finca->piscinas as $key => $piscina){
                $piscina->fill([
                    'area' => $finca_request->input("piscinas.".$key)
                ])->save();
            }
        }
        else
            if($total_piscinas < $total_piscinas_a_modificar){ // Se adicionaron piscinas
                foreach($finca->piscinas as $key => $piscina){
                    $piscina->fill([
                        'area' => $finca_request->input("piscinas.".$key)
                    ])->save();
                }
                foreach ($finca_request->input("piscinas") as $k => $area){
                    if ($k < $total_piscinas) continue;
                    Piscina::create([
                        'finca_id' => $finca->id,
                        'name' => $k+1,
                        'area' => $area
                    ]);
                }
            }
            else{ // se eliminaron piscinas
                
            }


        return back()->with('message', ['success', __('Finca actualizado')]);
    }

    public function destroy (Finca $finca) {
        try {
            foreach ($finca->piscinas as $piscina){
                $piscina->delete();
            }
            $finca->delete();
            return back()->with('message', ['success', __("Finca y piscinas eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando la finca, no se pudo eliminar")]);
        }
    }
}
