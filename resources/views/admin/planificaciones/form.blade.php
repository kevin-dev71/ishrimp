@extends('admin.layouts.admin')

@section('title', __('Planificaciones'))

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
                            action="{{ ! $planificacion->id ? route('admin.planificaciones.store') : route('admin.planificaciones.update', ['planificacion_id' => $planificacion->id])}}"
                    >
                        @if($planificacion->id)
                            {!! method_field('PUT') !!}
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="finca">
                                Finca:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required name="finca_id" id="finca_id" class="form-control col-md-3 col-xs-12">
                                    @foreach(\App\Finca::doesntHave('planificaciones')->pluck('name', 'id') as $id => $finca)
                                        <option {{ (int) old('finca_id') === $id || $planificacion->finca_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $finca }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Año: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="ano"
                                        name="ano"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ date("Y") }}"
                                >
                            </div>
                            @if ($errors->has('ano'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ano') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="finca">
                                Numero de Ciclos:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ciclo" id="ciclo" class="form-control col-md-3 col-xs-12">
                                    @for ($i = 1 ; $i <= 5; $i++)
                                        <option value="{{ (int) $i}}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.planificaciones.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection