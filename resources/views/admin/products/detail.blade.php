@extends('admin.layouts.admin')

@section('title', __('Detalle del Balanceado').': ')

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.products.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">{{ __("Producto: "). $product->name }}</div>
                <h3>{{ __("Capacidad: "). $product->cantidad . " " . $product->metric->name}}</h3>
                <h3>{{ __("Precio: $"). $product->precio }}</h3>
                <h3>{{ __("Proveedor: "). $product->proveedor }}</h3>
                <h3>{{ __("Fecha: "). $product->created_at }}</h3>
            </div>
        </div>
    </div>
@endsection