@extends('admin.layouts.admin')

@section('title', __('Detalle de la Finca').': ')

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.fincas.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
        <div class="row">
            <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{ __("Nombre de La Finca: "). $finca->name }}</div>
                    @foreach($finca->piscinas as $key => $piscina)
                        <h3>{{ __("Piscinas "). ++$key . ": "}}</h3>
                        <p>{{ __("Hectareas: ") . $piscina->area}}</p>
                    @endforeach
                    <p>Superficie total de la finca: {{ $finca->total_area }} Hectareas</p>
                </div>
            </div>
        </div>
@endsection