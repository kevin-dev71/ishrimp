@extends('admin.layouts.admin')

@section('title', __('Fincas'))

@section('content')
    @include('admin.partials.messages.flash')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $btnText }} <small>adiciona las piscinas</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form
                        id="demo-form2"
                        data-parsley-validate
                        class="form-horizontal form-label-left"
                        method="POST"
                        action="{{ ! $finca->id ? route('admin.fincas.store') : route('admin.fincas.update', ['finca_id' => $finca->id])}}"
                    >
                        @if($finca->id)
                            {!! method_field('PUT') !!}
                        @endif

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de la Finca: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        autofocus
                                        value="{{ old('name') ?: $finca->name }}"
                                >
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group">
                                @foreach ($errors->all() as $error)
                                    <span class="invalid-feedback">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @endforeach

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="piscina">Añade piscinas: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-round btn-info" onClick="addPiscina()">+</button>
                            </div>
                        </div>
                        <div class="form-group" id="piscinagroup">
                            @foreach($finca->piscinas as $key => $piscina)
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="piscina">Piscina {{ ++$key }} </label>
                                    <input value="{{ $piscina->area }}" id="piscina{{ $key }}" class="col-md-3 col-sm-3 col-xs-12" name="piscinas[]" />
                                </div>
                            @endforeach
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.fincas.index') }}" class="btn btn-primary" type="button">Regresar</a>
                                <button type="submit" class="btn btn-success">{{ $btnText }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscripts')
<script>
    a = 0;
    @if($finca->id)
        a = {{ $key }}
    @endif
    function addPiscina(){
        a++;
        var div = document.createElement('div');
        div.setAttribute('class', 'form-group');
        div.innerHTML = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="piscina">Piscina ' + a + ' </label>' +
        '<input id="piscina' + a + ' class="form-control col-md-7 col-xs-12" name="piscinas[]" />';
        document.getElementById('piscinagroup').appendChild(div);
    }
</script>
@endpush