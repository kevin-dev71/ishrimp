<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>@sortablelink('name',  __('Nombre de la Finca'),['page' => $fincas->currentPage()])</th>
            <th>@sortablelink('total_area',__('Total Area'),['page' => $fincas->currentPage()])</th>
            <th>{{ __('Fecha de Creacion') }}</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fincas as $finca)
            <tr>
                <td>{{ $finca->name }}</td>
                <td>{{ $finca->total_area }} Hectareas</td>
                <td>{{ $finca->created_at }}</td>
                <td>
                    @if(\Request::is('admin/planificaciones'))
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.planificaciones.show', [$finca->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs" href="#">
                            @include('admin.partials.planificaciones.delete')
                        </a>
                    @elseif(\Request::is('ciclos'))
                        <button type="button" class="btn btn-success"><a style="color:white; !important" href="{{ route('ciclos.create' , $finca->id) }}">Sembrar Piscina</a></button>
                        <button type="button" class="btn btn-warning"><a style="color:white; !important" href="{{ route('ciclos.show', [$finca->id]) }}">Ver Piscinas Activadas</a></button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ $fincas->links() }}
    </div>
</div>