@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content')
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-key"></i>Available Permissions
    
        <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
    
                <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td> 
                        <td>
                        <a href="{{ URL::to('access/permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
    
                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.delete', $permission->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <a href="{{ URL::to('access/permissions/create') }}" class="btn btn-success">Add Permission</a>
    
    </div>
    
</div>

@endsection