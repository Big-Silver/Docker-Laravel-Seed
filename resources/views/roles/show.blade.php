@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-nav">
            <div class="pull-left mt-5">
                <h2> {{__('common.showRole')}}</h2>
            </div>
            <div class="pull-right my-3">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{__('common.back')}}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('common.name')}}:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('common.permission')}}:</strong>
                @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <label class="label label-success text-dark">{{ $v->name }},</label>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection