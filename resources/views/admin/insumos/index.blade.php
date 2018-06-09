@extends('admin.layouts.admin')

@section('title', __('Insumos'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.insumos.create') }}" class="btn btn-success">Registrar Insumos</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  __('Nombre del Producto'),['page' => $insumos->currentPage()])</th>
                <th>@sortablelink('proveedor',__('Proveedor'),['page' => $insumos->currentPage()])</th>
                <th>@sortablelink('cantidad',__('Capacidad'),['page' => $insumos->currentPage()])</th>
                <th>@sortablelink('precio',__('Precio'),['page' => $insumos->currentPage()])</th>
                <th>Fecha</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->name }}</td>
                    <td>{{ $insumo->proveedor }}</td>
                    <td>{{ $insumo->cantidad . " " . $insumo->metric->name }}</td>
                    <td>{{ $insumo->precio }}</td>
                    <td>{{ $insumo->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.insumos.show', [$insumo->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.insumos.edit', [$insumo->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.insumos.delete')
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $insumos->links() }}
        </div>
    </div>
@endsection