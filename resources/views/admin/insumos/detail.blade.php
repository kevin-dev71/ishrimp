@extends('admin.layouts.admin')

@section('title', __('Detalle del Insumo').': ')

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.insumos.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">{{ __("Insumo: "). $insumo->name }}</div>
                <h3>{{ __("Capacidad: "). $insumo->cantidad . " " . $insumo->metric->name}}</h3>
                <h3>{{ __("Precio: $"). $insumo->precio }}</h3>
                <h3>{{ __("Proveedor: "). $insumo->proveedor }}</h3>
                <h3>{{ __("Fecha: "). $insumo->created_at }}</h3>
            </div>
        </div>
    </div>
@endsection