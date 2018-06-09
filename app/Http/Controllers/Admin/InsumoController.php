<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InsumoRequest;
use App\Insumo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InsumoController extends Controller
{
    public function index(){
        $insumos = Insumo::sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.insumos.index' , compact('insumos'));
    }

    public function show(Insumo $insumo){
        return view('admin.insumos.detail' , compact('insumo'));
    }

    public function create () {
        $insumo = new Insumo;
        $btnText = __("Registrar Insumo");
        return view('admin.insumos.form', ['insumo' => $insumo , 'btnText' => $btnText]);
    }

    public function store (InsumoRequest $insumo_request) {
        Insumo::create($insumo_request->input());
        return back()->with('message', ['success', __('Registro de Insumo Realizado con Exito')]);
    }

    public function edit (Insumo $insumo) {
        $btnText = __("Editar Insumo");
        return view('admin.insumos.form', ['insumo' => $insumo, 'btnText' => $btnText]);
    }

    public function update (InsumoRequest $insumo_request, Insumo $insumo) {
        $insumo->fill($insumo_request->input())->save();

        return back()->with('message', ['success', __('Insumo actualizado correctamente')]);
    }

    public function destroy (Insumo $insumo) {
        try {
            $insumo->delete();
            return back()->with('message', ['success', __("Insumo eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando el Insumo, no se pudo eliminar")]);
        }
    }
}
