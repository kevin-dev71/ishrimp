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
@endsection