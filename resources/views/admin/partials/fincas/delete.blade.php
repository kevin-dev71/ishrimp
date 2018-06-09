<form action="{{ route('admin.fincas.destroy', [$finca->id]) }}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <button class="btn btn-xs btn-danger user_destroy"
            data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">
        <i class="fa fa-trash"></i>
    </button>
</form>