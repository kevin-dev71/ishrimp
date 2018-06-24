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
        $btnText = __("Cosechar");
        return view('cosechas.form', [
            'cosecha' => $cosecha ,
            'btnText' => $btnText ,
            'ciclo' => $ciclo ,
            'piscina' => $piscina
        ]);
    }
}
