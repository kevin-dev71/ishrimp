@extends('admin.layouts.admin')

@section('title', __('Panel de Ciclos'))

@section('content')
    @include('admin.partials.messages.flash')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Fincas con planificaciones</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('partials.list_fincas_con_planificaciones')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Mis Cosechas (En Desarrollo)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Registrar Cosecha</a>
                                </li>
                                <li><a href="#">Editar Cosecha</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <button type="button" class="btn btn-success">Registrar Cosecha</button>
                    <button type="button" class="btn btn-warning">Editar Cosecha</button>

                </div>
            </div>
        </div>
    </div>
@endsection