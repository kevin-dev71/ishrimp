@extends('admin.layouts.admin')

@section('title', __('Aplicar Balanceado'))

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
                            action="{{ route('ciclos.store.balanceado') }}"
                    >

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="producto">
                                Seleccion el Producto:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required name="producto" id="producto" class="form-control col-md-3 col-xs-12">
                                    @foreach(\App\Product::pluck('name', 'id') as $id => $product)
                                        <option value="{{ $id }}">
                                            {{ $product }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="cantidad"
                                        name="cantidad"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                >
                            </div>
                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('ciclos.aplicaciones', [$ciclo->id]) }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>
                        <input name="ciclo_id" type="hidden" value="{{ $ciclo->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection