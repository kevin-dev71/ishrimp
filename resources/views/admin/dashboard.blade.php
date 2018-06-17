@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->

    <!-- /top tiles -->


    {{--Carousel--}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Reportes Muy pronto Aqui Dashboard</h2>
            <h2>Mientras Navegue por la barra lateral </h2>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
