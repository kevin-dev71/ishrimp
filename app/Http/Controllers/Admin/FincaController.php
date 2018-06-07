<?php

namespace App\Http\Controllers\Admin;

use App\Finca;
use App\Http\Requests\FincaRequest;
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

    public function create () {
        $finca = new Finca;
        $btnText = __("Crear Finca");
        return view('admin.fincas.form', ['finca' => $finca , 'btnText' => $btnText]);
    }

    public function store (FincaRequest $fincaRequest_request) {
        dd($fincaRequest_request->piscinas);
    }
}
