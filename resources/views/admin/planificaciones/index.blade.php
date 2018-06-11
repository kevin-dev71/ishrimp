@extends('admin.layouts.admin')

@section('title', __('Fincas con Planificaciones'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.planificaciones.create') }}" class="btn btn-success">Crear Planificaciones</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  __('Nombre de la Finca'),['page' => $fincas->currentPage()])</th>
                <th>@sortablelink('total_area',__('Total Area'),['page' => $fincas->currentPage()])</th>
                <th>{{ __('Fecha de Creacion') }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fincas as $finca)
                <tr>
                    <td>{{ $finca->name }}</td>
                    <td>{{ $finca->total_area }} Hectareas</td>
                    <td>{{ $finca->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.planificaciones.show', [$finca->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.planificaciones.delete')
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $fincas->links() }}
        </div>
    </div>
@endsection