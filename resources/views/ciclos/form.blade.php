@extends('admin.layouts.admin')

@section('title', __('Sembrar Piscina'))

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
                            action="{{ route('ciclos.store') }}"
                    >

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="finca">
                                Piscinas sin sembrar:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required name="piscina_id" id="piscina_id" class="form-control col-md-3 col-xs-12">
                                    @foreach($finca->piscinas_sin_sembrar as $piscina)
                                        <option value="{{ $piscina->id }}">
                                            {{ $piscina->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

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
                                >
                            </div>
                            @if ($errors->has('precio_larva'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('precio_larva') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="planificacion">
                                Ciclo planificado:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required name="planificacion_id" id="planificacion_id" class="form-control col-md-3 col-xs-12">
                                    @foreach($finca->planificaciones as $planificacion)
                                        <option {{ (int) old('planificacion_id') === $planificacion->id ? 'selected' : '' }} value="{{ $planificacion->id }}">
                                            {{ __("Ciclo: ") . $planificacion->ciclo . "  Inicio: " . $planificacion->fecha_inicial . " - Fin: " . $planificacion->fecha_final  }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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