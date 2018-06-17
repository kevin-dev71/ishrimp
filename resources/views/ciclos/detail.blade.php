@extends('admin.layouts.admin')

@section('title', __('Piscinas Activadas de la Finca').': ')

@section('boton')
    <div class="pull-right">
        <a href="{{ route('ciclos.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>{{ __('Nombre de la Piscina') }}</th>
                <th>{{ __('Area') }}</th>
                <th>{{ __('Precio Larva') }}</th>
                <th>{{ __('Densidad') }}</th>
                <th>{{ __('Fecha de Activacion') }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($piscinas as $piscina)
                <tr>
                    <td>{{ $piscina->name }}</td>
                    <td>{{ $piscina->area }} Hectareas</td>
                    <td>{{ $piscina->precio_larva }}</td>
                    <td>{{ $piscina->densidad }}</td>
                    <td>{{ $piscina->ciclo_created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('ciclos.edit', [$piscina->ciclo_id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('ciclos.partials.delete')
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('ciclos.aplicaciones', [$piscina->ciclo_id]) }}">
                            Ver Insumos y Balanceados Aplicados
                        </a>
                        <a class="btn btn-xs btn-warning" href="{{ route('ciclos.create.balanceado', [$piscina->ciclo_id]) }}">
                            Aplicar Balanceado
                        </a>
                        <a class="btn btn-xs btn-warning" href="{{ route('ciclos.create.insumo', [$piscina->ciclo_id]) }}">
                            Aplicar Insumo
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection