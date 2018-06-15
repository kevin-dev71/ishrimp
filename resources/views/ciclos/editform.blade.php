@extends('admin.layouts.admin')

@section('title', __('Actualizar Ciclo'))

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
                            action="{{ route('ciclos.update' , ['ciclo_id' => $ciclo->id]) }}"
                    >

                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Densidad/HA: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="densidad"
                                        name="densidad"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ $ciclo->densidad }}"
                                >
                            </div>
                            @if ($errors->has('densidad'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('densidad') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Precio de Larva (millar): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="precio_larva"
                                        name="precio_larva"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        value="{{ $ciclo->precio_larva }}"
                                >
                            </div>
                            @if ($errors->has('precio_larva'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('precio_larva') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('ciclos.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection