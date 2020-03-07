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
                <div class="card-header">{{__('common.fileUpload')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                        @csrf
                        <div class="form-group row ">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('common.fileUpload') }}</label>
                            <div class="col-md-6">
                                <div id="file" class="dropzone"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('common.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('common.overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('overview') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('common.price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('common.upload') }}
                                </button>
                                <a href="/home" class="btn btn-light ml-3">{{__('common.back')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var drop = new Dropzone('#file', {
        createImageThumbnails: false,
        addRemoveLinks: true,
        url: "{{ route('upload') }}",
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    });
</script>
@endsection