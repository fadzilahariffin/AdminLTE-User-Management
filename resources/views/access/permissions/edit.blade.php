@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
        <br>
        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PATCH')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
    
        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
    
        {{ Form::close() }}
    
    </div>
</div>


@endsection