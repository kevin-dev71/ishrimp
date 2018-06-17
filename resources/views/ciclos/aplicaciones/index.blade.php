@extends('admin.layouts.admin')

@section('title', __('Balanceados e Insumos'))

@section('boton')
    <div class="pull-right">
        <a href="{{ route('ciclos.index') }}" class="btn btn-success">Regresar</a>
    </div>
@endsection

@section('content')
    @include('admin.partials.messages.flash')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Balanceados Aplicados</h2>
                    <a href="{{ route('ciclos.create.balanceado', [$ciclo->id]) }}" class="btn btn-success pull-right">Aplicar Balanceado</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>{{  __('Producto') }}</th>
                                <th>{{  __('Cantidad') }}</th>
                                <th>{{ __('Fecha de Aplicacion') }}</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ciclo->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->cantidad_aplicada . " " . $product->metric->name }} </td>
                                    <td>{{ $product->pivot->created_at }}</td>
                                    <td>
                                        <a class="btn btn-xs" href="#">
                                            <form action="{{ route('ciclos.destroy.balanceado', [$product->id]) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input name="ciclo_id" type="hidden" value="{{ $ciclo->id }}">
                                                <input name="cantidad_aplicada" type="hidden" value="{{ $product->pivot->cantidad_aplicada }}">
                                                <input name="created_at" type="hidden" value="{{ $product->pivot->created_at }}">
                                                <button class="btn btn-xs btn-danger user_destroy"
                                                        data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Insumos Aplicados</h2>
                    <a href="{{ route('ciclos.create.insumo', [$ciclo->id]) }}" class="btn btn-success pull-right">Aplicar Insumo</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>{{  __('Insumo') }}</th>
                                <th>{{  __('Cantidad') }}</th>
                                <th>{{ __('Fecha de Aplicacion') }}</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ciclo->insumos as $insumo)
                                <tr>
                                    <td>{{ $insumo->name }}</td>
                                    <td>{{ $insumo->pivot->cantidad_aplicada . " " . $insumo->metric->name }} </td>
                                    <td>{{ $insumo->pivot->created_at }}</td>
                                    <td>
                                        <a class="btn btn-xs" href="#">
                                            <form action="{{ route('ciclos.destroy.insumo', [$insumo->id]) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input name="ciclo_id" type="hidden" value="{{ $ciclo->id }}">
                                                <input name="cantidad_aplicada" type="hidden" value="{{ $insumo->pivot->cantidad_aplicada }}">
                                                <input name="created_at" type="hidden" value="{{ $insumo->pivot->created_at }}">
                                                <button class="btn btn-xs btn-danger user_destroy"
                                                        data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection