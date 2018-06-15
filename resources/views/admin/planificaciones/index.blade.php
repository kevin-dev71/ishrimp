@extends('admin.layouts.admin')

@section('title', __('Fincas con Planificaciones'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.planificaciones.create') }}" class="btn btn-success">Crear Planificaciones</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    @include('partials.list_fincas_con_planificaciones')
@endsection