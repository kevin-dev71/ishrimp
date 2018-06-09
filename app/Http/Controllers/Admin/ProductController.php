<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(){
        $products = Product::sortable(['name' => 'asc'])
            ->paginate();

        return view('admin.products.index' , compact('products'));
    }

    public function show(Product $product){
        return view('admin.products.detail' , compact('product'));
    }

    public function create () {
        $product = new Product;
        $btnText = __("Registrar Balanceado");
        return view('admin.products.form', ['product' => $product , 'btnText' => $btnText]);
    }

    public function store (ProductRequest $product_request) {
        Product::create($product_request->input());
        return back()->with('message', ['success', __('Registro de Producto Realizado con Exito')]);
    }

    public function edit (Product $product) {
        $btnText = __("Editar Balanceado");
        return view('admin.products.form', ['product' => $product , 'btnText' => $btnText]);
    }

    public function update (ProductRequest $product_request, Product $product) {
        $product->fill($product_request->input())->save();

        return back()->with('message', ['success', __('Balanceado actualizado correctamente')]);
    }

    public function destroy (Product $product) {
        try {
            $product->delete();
            return back()->with('message', ['success', __("Balanceado eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando el Balanceado, no se pudo eliminar")]);
        }
    }
}
