@extends('admin.layouts.admin')

@section('title', __('Unidades de Medicion'))

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
                            action="{{ ! $metric->id ? route('admin.metrics.store') : route('admin.metrics.update', ['metric_id' => $metric->id])}}"
                    >
                        @if($metric->id)
                            {!! method_field('PUT') !!}
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Etiqueta de la Unidad de Medicion: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('name') ?: $metric->name }}"
                                >
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Valor Equivalente de la Unidad de Medicion: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="valor"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('valor') ?: $metric->valor }}"
                                >
                            </div>
                            @if ($errors->has('valor'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('valor') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.metrics.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection