@extends('admin.layouts.admin')

@section('title', __('Planificaciones'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.planificaciones.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $finca->name }} <small>Ciclos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            @foreach($finca->planificaciones as $planificacion)
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>{{__("Ciclo "). $planificacion->ciclo }}</a>
                                        </h2>
                                        <div class="byline">
                                            <span>{{ __("Año "). $planificacion->ano }}
                                        </div>
                                        <p class="excerpt">
                                            {{ __("Fecha Inicial: ") . $planificacion->fecha_inicial }}
                                        </p>
                                        <p class="excerpt">
                                            {{ __("Fecha Final: ") . $planificacion->fecha_final }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection