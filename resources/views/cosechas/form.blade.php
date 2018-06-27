@extends('admin.layouts.admin')

@section('title', __('Cosecha'))

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        {{ __("Finca: "). $piscina->finca->name . " - " . __("Piscina: ") . $piscina->name }}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form
                            id="demo-form2"
                            data-parsley-validate
                            class="form-horizontal form-label-left"
                            method="POST"
                            action="{{ route('cosechas.store') }}"
                    >
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_cosecha">Fecha de Cosecha: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input name="fecha_cosecha" type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Fecha" aria-describedby="inputSuccess2Status3">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla">
                                Talla:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required name="talla" id="talla" class="form-control col-md-3 col-xs-12">
                                    @foreach(\App\Talla::pluck('name', 'id') as $id => $talla)
                                        <option value="{{ $id }}">
                                            {{ $talla }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Cantidad: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="peso"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                >
                            </div>
                            @if ($errors->has('peso'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('peso') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="valor"
                                        name="precio"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                >
                            </div>
                            @if ($errors->has('precio'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('precio') }}</strong>
                        </span>
                            @endif
                        </div>

                        <input type="hidden" name="ciclo_id" value="{{ $ciclo->id }}">


                            <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                <a href="{{ route('ciclos.show', [$piscina->finca->id]) }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                                <a href="{{ route('cosechas.finalizar', [$ciclo->id]) }}" class="btn btn-danger" type="button">Finalizar Cosecha / Desactivar Piscina</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>{{ __("Tallas") }}</th>
                <th>{{ __("Cantidad") }}</th>
                <th>{{ __("Precio") }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ciclo->tallas as $cosechai)
                <tr>
                    <td>{{ $cosechai->name }}</td>
                    <td>{{ $cosechai->pivot->peso }}</td>
                    <td>{{ $cosechai->pivot->precio }}</td>
                    <td>
                        <a class="btn btn-xs" href="#">
                            <form action="{{ route('cosechas.destroy', [$cosechai->pivot->id]) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <input name="ciclo_id" type="hidden" value="{{ $ciclo->id }}">
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

@endsection

@push('myscripts')
<script type="text/javascript" src="{{ asset('assets/js/vendors/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/vendors/daterangepicker.js') }}"></script>
<script>

</script>
@endpush