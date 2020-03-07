@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row">
        <div class="col-lg-12 margin-nav">
            <div class="pull-left mt-5">
                <h2> {{__('common.showProduct')}}</h2>
            </div>
            <div class="pull-right my-3">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('common.name')}}:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('common.detail')}}:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
</div>
@endsection