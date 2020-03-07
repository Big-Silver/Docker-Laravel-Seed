@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-nav">
            @if(session()->get('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session()->get('message') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="card">
                <div class="card-header">{{__('common.sendEmail')}}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('email.send') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">{{__('common.firstName')}}:</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required />
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">{{__('common.lastName')}}:</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required />
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>{{__('common.detail')}}:</strong>
                            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" placeholder="Detail" required></textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('common.sendEmail')}}</button>
                        <a href="/home" class="btn btn-light ml-3">{{__('common.cancel')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection