@extends('admin.layouts.admin')

@section('title', __('Balanceado de Productos'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Registrar Balanceado</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  __('Nombre del Producto'),['page' => $products->currentPage()])</th>
                <th>@sortablelink('proveedor',__('Proveedor'),['page' => $products->currentPage()])</th>
                <th>@sortablelink('cantidad',__('Capacidad'),['page' => $products->currentPage()])</th>
                <th>@sortablelink('precio',__('Precio'),['page' => $products->currentPage()])</th>
                <th>Fecha</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->proveedor }}</td>
                    <td>{{ $product->cantidad . " " . $product->metric->name }}</td>
                    <td>{{ $product->precio }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', [$product->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', [$product->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.products.delete')
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $products->links() }}
        </div>
    </div>
@endsection