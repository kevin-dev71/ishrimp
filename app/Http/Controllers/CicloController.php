<?php

namespace App\Http\Controllers;

use App\Ciclo;
use App\Finca;
use App\Metric;
use App\Piscina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function aplicacionesIndex(Ciclo $ciclo)
    {
        $metrics = Metric::all();
        return view('ciclos.aplicaciones.index' , compact('ciclo' , 'metrics'));
    }

    public function createBalanceado(Ciclo $ciclo)
    {
        $btnText = __("Guardar");
        return view('ciclos.aplicaciones.balanceadoform' , compact('ciclo' , 'btnText'));
    }

    public function storeBalanceado (Request $request) {
        /*
         * $this->validate($request, [
                'user_id' => 'required|integer'
            ]);
        */
        $ciclo = Ciclo::findOrFail($request->ciclo_id);

        $ciclo->products()->attach( $request->producto , [
            'cantidad_aplicada' => $request->cantidad ,
            'metric_aplicada_id' => $request->metrica
        ]);

        return back()->with('message', ['success', __('Balanceado Registrado Correctamente')]);
    }

    public function createInsumo(Ciclo $ciclo)
    {
        $btnText = __("Guardar");
        return view('ciclos.aplicaciones.insumoform' , compact('ciclo' , 'btnText'));
    }

    public function storeInsumo (Request $request) {
        /*
         * $this->validate($request, [
                'user_id' => 'required|integer'
            ]);
        */
        $ciclo = Ciclo::findOrFail($request->ciclo_id);

        $ciclo->insumos()->attach( $request->insumo , [
            'cantidad_aplicada' => $request->cantidad,
            'metric_aplicada_id' => $request->metrica
        ]);

        return back()->with('message', ['success', __('Insumo Registrado Correctamente')]);
    }

    public function destroyBalanceado (Request $request , $product_id) {
        try {
            DB::delete('delete from ciclo_product where ciclo_id = ? AND product_id = ? AND cantidad_aplicada = ? AND metric_aplicada_id = ? AND created_at = ?', array(
                    $request->ciclo_id,
                    $product_id,
                    $request->cantidad_aplicada,
                    $request->metric_aplicada_id,
                    $request->created_at
                )
            );
            return back()->with('message', ['success', __("Eliminado Producto Correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error Eliminando el Producto, no se pudo eliminar")]);
        }
    }

    public function destroyInsumo (Request $request , $insumo_id) {
        try {
            DB::delete('delete from ciclo_insumo where ciclo_id = ? AND insumo_id = ? AND cantidad_aplicada = ? AND metric_aplicada_id = ? AND created_at = ?', array(
                    $request->ciclo_id,
                    $insumo_id,
                    $request->cantidad_aplicada,
                    $request->metric_aplicada_id,
                    $request->created_at
                )
            );
            return back()->with('message', ['success', __("Eliminado Insumo Correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error Eliminando el Insumo, no se pudo eliminar")]);
        }
    }

    public function createTalla ($ciclo_id , $piscina_id) {
        $ciclo = Ciclo::findOrFail($ciclo_id);
        $piscina = Piscina::findOrFail($piscina_id);
        $btnText = __("Cosechar");
        return view('cosechas.form', [
            'btnText' => $btnText ,
            'ciclo' => $ciclo ,
            'piscina' => $piscina
        ]);
    }

    public function storeTalla (Request $request) {

        $ciclo = Ciclo::findOrFail($request->ciclo_id);

        $ciclo->tallas()->attach( $request->talla , [
            'peso' => $request->peso,
            'precio' => $request->precio
        ]);

        return back()->with('message', ['success', __('Cosecha Registrado satisfactoriamente')]);
    }

    public function destroyTalla (Request $request , $ciclo_talla_id) {
        try {
            DB::delete('delete from ciclo_talla where id = ?', array(
                    $ciclo_talla_id
                )
            );
            return back()->with('message', ['success', __("Eliminado Cosecha Correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error Eliminando Cosecha, no se pudo eliminar")]);
        }
    }

    public function finalizarCosecha (Ciclo $ciclo) {
        return back()->with('message', ['danger', __("En Desarrollo")]);
        /*try {
            if($ciclo->delete()){
                $ciclo->update(array('activo' => 0));
            }
            return back()->with('message', ['success', __("Siembra Desactivado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error desactivando la siembra, no se pudo eliminar")]);
        }*/
    }
}
