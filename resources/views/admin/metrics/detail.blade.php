@extends('admin.layouts.admin')

@section('title', __('Detalle de la Metrica').': ')

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.metrics.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">{{ __("Unidad de medicion: "). $metric->name }}</div>
                <h3>{{ __("Equivalente a: "). $metric->valor . " " . $metric->equivalente}}</h3>
            </div>
        </div>
    </div>
@endsection