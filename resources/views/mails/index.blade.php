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
            <div class="card">
                <div class="card-header">Send Email</div>
                <div class="card-body">
                    <form method="post" action="{{ route('email.send') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" name="first_name" />
                        </div>
                        <button type="submit" class="btn btn-primary">Send mail</button>
                        <a href="/home" class="btn btn-light ml-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection