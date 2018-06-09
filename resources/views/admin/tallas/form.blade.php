@extends('admin.layouts.admin')

@section('title', __('Tallas'))

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
                            action="{{ ! $talla->id ? route('admin.tallas.store') : route('admin.tallas.update', ['talla_id' => $talla->id])}}"
                    >
                        @if($talla->id)
                            {!! method_field('PUT') !!}
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Talla: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('name') ?: $talla->name }}"
                                >
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Gramos: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="peso"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('peso') ?: $talla->peso }}"
                                >
                            </div>
                            @if ($errors->has('peso'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('peso') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.tallas.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection