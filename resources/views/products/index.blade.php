@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-nav">
            <div class="pull-left mt-5">
                <h2>Products</h2>
            </div>
            <div class="d-flex justify-content-between my-3">
                @can('product-create')
                <a class="btn btn-primary" href="{{ route('products.create') }}"> {{__('common.createProduct')}}</a>
                <a class="btn btn-light" href="{{ route('home') }}">{{__('common.back')}}</a>
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
            <th>{{__('common.detail')}}</th>
            <th width="280px">{{__('common.actions')}}</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">{{__('common.show')}}</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">{{__('common.edit')}}</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">{{__('common.delete')}}</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
</div>
@endsection