@extends('admin.layouts.admin')

@section('title', __('Tallas'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.tallas.create') }}" class="btn btn-success">Nueva Talla</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  __('Talla'),['page' => $tallas->currentPage()])</th>
                <th>@sortablelink('peso',__('Gramos'),['page' => $tallas->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tallas as $talla)
                <tr>
                    <td>{{ $talla->name }}</td>
                    <td>{{ $talla->peso }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tallas.show', [$talla->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.tallas.edit', [$talla->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.tallas.delete')
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $tallas->links() }}
        </div>
    </div>
@endsection