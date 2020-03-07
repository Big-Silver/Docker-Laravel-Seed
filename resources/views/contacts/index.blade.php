@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 margin-nav">
            @if(session()->get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session()->get('success') }}
            </div>
            @endif
        </div>
        <div class="col-sm-12">
            <h1 class="display-3">{{__('common.contacts')}}</h1>
            <div class="d-flex justify-content-between my-3">
                <a href="{{ route('contacts.create').'?page=' . $contacts->currentPage()}}" class="btn btn-primary">{{__('common.newContact')}}</a>
                <a href="{{ route('home')}}" class="btn btn-light">{{__('common.back')}}</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>{{__('common.tableNo')}}</td>
                        <td>{{__('common.Name')}}</td>
                        <td>{{__('common.email')}}</td>
                        <td>{{__('common.jobTitle')}}</td>
                        <td>{{__('common.city')}}</td>
                        <td>{{__('common.country')}}</td>
                        <td colspan=2>{{__('common.actions')}}</td>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($contacts) && $contacts->count())
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration}}</td>
                        <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->job_title}}</td>
                        <td>{{$contact->city}}</td>
                        <td>{{$contact->country}}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id).'?page=' . $contacts->currentPage()}}" class="btn btn-primary">{{__('common.edit')}}</a>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id).'?page=' . $contacts->currentPage()}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{__('common.delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">{{__('common.noData')}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            {!! $contacts->links() !!}
        </div>
    </div>
</div>
@endsection