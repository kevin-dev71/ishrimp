@extends('admin.layouts.admin')

@section('title', __('Metricas'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('admin.metrics.create') }}" class="btn btn-success">Crear Nueva Unidad de Medicion</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  __('Unidad de Medicion'),['page' => $metrics->currentPage()])</th>
                <th>@sortablelink('equivalente',  __('Unidad Equivalente'),['page' => $metrics->currentPage()])</th>
                <th>@sortablelink('valor',__('Valor equivalente'),['page' => $metrics->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($metrics as $metric)
                <tr>
                    <td>{{ $metric->name }}</td>
                    <td>{{ $metric->equivalente }}</td>
                    <td>{{ $metric->valor . " ". $metric->equivalente }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.metrics.show', [$metric->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.metrics.edit', [$metric->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.metrics.delete')
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $metrics->links() }}
        </div>
    </div>
@endsection