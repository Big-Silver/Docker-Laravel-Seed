@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2 margin-nav">
        <h1 class="display-3">{{__('common.updateContact')}}</h1>

        @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id).'?page=' . $contact->page }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">{{__('common.firstName')}}:</label>
                <input type="text" class="form-control" name="first_name" value={{ $contact->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">{{__('common.LastName')}}:</label>
                <input type="text" class="form-control" name="last_name" value={{ $contact->last_name }} />
            </div>

            <div class="form-group">
                <label for="email">{{__('common.email')}}:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} />
            </div>
            <div class="form-group">
                <label for="city">{{__('common.city')}}:</label>
                <input type="text" class="form-control" name="city" value={{ $contact->city }} />
            </div>
            <div class="form-group">
                <label for="country">{{__('common.country')}}:</label>
                <input type="text" class="form-control" name="country" value={{ $contact->country }} />
            </div>
            <div class="form-group">
                <label for="job_title">{{__('common.jobTitle')}}:</label>
                <input type="text" class="form-control" name="job_title" value={{ $contact->job_title }} />
            </div>
            <button type="submit" class="btn btn-primary">{{__('common.updateContact')}}</button>
            <a href="{{'/contacts'.'?page=' . $contact->page}}" class="btn btn-light ml-3">{{__('common.cancel')}}</a>
        </form>
    </div>
</div>
@endsection