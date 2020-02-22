@extends('layouts.app')

@section('content')
<div class="masthead">
    <div class="container">
        <div class="row margin-nav">
            @if(session()->get('success'))
            <div class="alert alert-success alert-block w-100">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->get('error'))
            <div class="alert alert-danger alert-block w-100">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session()->get('error') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection