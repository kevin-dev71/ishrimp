@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{-- config('app.name') --}}
        <img src='http://agroseacom.ec/wp-content/uploads/2018/02/Untitled-3.png'>
    </div>
    <div class="m-b-md">
        Sample users:<br/>
        Admin user: admin.laravel@labs64.com / password: admin<br/>
        Demo user: demo.laravel@labs64.com / password: demo
    </div>
@endsection