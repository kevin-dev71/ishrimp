<?php

namespace App\Http\Controllers;

use App\Ciclo;
use App\Cosecha;
use App\Piscina;
use Illuminate\Http\Request;

class CosechaController extends Controller
{
    public function create ($ciclo_id , $piscina_id) {
        $cosecha = new Cosecha;
        $ciclo = Ciclo::findOrFail($ciclo_id);
        $piscina = Piscina::findOrFail($piscina_id);
        $cosechas = Cosecha::where('ciclo_id' , '=' , $ciclo_id)->get();
        $btnText = __("Cosechar");
        return view('cosechas.form', [
            'cosecha' => $cosecha ,
            'btnText' => $btnText ,
            'ciclo' => $ciclo ,
            'piscina' => $piscina ,
            'cosechas' => $cosechas
        ]);
    }

    public function store (Request $request) {
        Cosecha::create([
            //'created_at' => $request->fecha ,
            'talla_id' => $request->talla ,
            'ciclo_id' => $request->ciclo_id ,
            'peso' => $request->peso ,
            'precio' => $request->precio ,
        ]);

        return back()->with('message', ['success', __('Cosecha Registrado satisfactoriamente')]);
    }
}
