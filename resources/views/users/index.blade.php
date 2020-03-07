@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-nav">
            <div class="pull-left mt-5 mb-3">
                <h2>{{__('common.manageUser')}}</h2>
            </div>
            <div class="d-flex justify-content-between my-3">
                @can('user-create')
                <a class="btn btn-primary" href="{{ route('users.create') }}"> {{__('common.createUser')}}</a>
                <a class="btn btn-light" href="{{ route('home') }}"> {{__('common.back')}}</a>
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
            <th>{{__('common.tableNo')}}</th>
            <th>{{__('common.name')}}</th>
            <th>{{__('common.email')}}</th>
            <th>{{__('common.role')}}</th>
            <th width="280px">{{__('common.actions')}}</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">{{__('common.show')}}</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{__('common.edit')}}</a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>

    {!! $data->render() !!}
</div>
@endsection