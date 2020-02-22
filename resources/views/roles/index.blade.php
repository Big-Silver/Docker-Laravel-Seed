@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-nav">
            <div class="pull-left mt-5">
                <h2>Role Management</h2>
            </div>
            <div class="d-flex justify-content-between my-3">
                @can('role-create')
                <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>
                <a class="btn btn-light" href="{{ route('home') }}">Back</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}
</div>
@endsection