<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TallaRequest;
use App\Talla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TallaController extends Controller
{
    public function index(){
        $tallas = Talla::sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.tallas.index' , compact('tallas'));
    }

    public function show(Talla $talla){
        return view('admin.tallas.detail' , compact('talla'));
    }

    public function create () {
        $talla = new Talla;
        $btnText = __("Crear Talla");
        return view('admin.tallas.form', ['talla' => $talla , 'btnText' => $btnText]);
    }

    public function store (TallaRequest $talla_request) {
        Talla::create([
            'name' => $talla_request->name ,
            'peso' => $talla_request->peso
        ]);

        return back()->with('message', ['success', __('Talla Creado satisfactoriamente')]);
    }

    public function edit (Talla $talla) {
        $btnText = __("Actualizar Talla");
        return view('admin.tallas.form', ['talla' => $talla , 'btnText' => $btnText]);
    }

    public function update (TallaRequest $talla_request, Talla $talla) {
        $talla->fill([
            'name' => $talla_request->name ,
            'peso' => $talla_request->peso
        ])->save();

        return back()->with('message', ['success', __('Talla actualizado')]);
    }

    public function destroy (Talla $talla) {
        try {
            $talla->delete();
            return back()->with('message', ['success', __("Talla eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando la talla, no se pudo eliminar")]);
        }
    }
}
