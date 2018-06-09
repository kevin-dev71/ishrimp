@extends('admin.layouts.admin')

@section('title', __('Insumos'))

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $btnText }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form
                            id="demo-form2"
                            data-parsley-validate
                            class="form-horizontal form-label-left"
                            method="POST"
                            action="{{ ! $insumo->id ? route('admin.insumos.store') : route('admin.insumos.update', ['insumo_id' => $insumo->id])}}"
                    >
                        @if($insumo->id)
                            {!! method_field('PUT') !!}
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre del Insumo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('name') ?: $insumo->name }}"
                                >
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Proveedor: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="proveedor"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('proveedor') ?: $insumo->proveedor }}"
                                >
                            </div>
                            @if ($errors->has('proveedor'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('proveedor') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Contenido del Insumo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="cantidad"
                                        required="required"
                                        class="form-control col-md-3 col-xs-12"
                                        autofocus
                                        value="{{ old('cantidad') ?: $insumo->cantidad }}"
                                >
                                <select name="metric_id" id="metric_id" class="form-control col-md-3 col-xs-12">
                                    @foreach(\App\Metric::pluck('name', 'id') as $id => $metric)
                                        <option {{ (int) old('metric_id') === $id || $insumo->metric_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $metric }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('cantidad') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio $ <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="precio"
                                        name="precio"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('precio') ?: $insumo->precio }}"
                                >
                            </div>
                            @if ($errors->has('precio'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.insumos.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection