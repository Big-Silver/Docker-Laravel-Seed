@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 margin-nav">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        </div>
        <div class="col-sm-12">
            <h1 class="display-3">Contacts</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>
                <a style="margin: 19px;" href="{{ route('home')}}" class="btn btn-light">Home page</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Job Title</td>
                        <td>City</td>
                        <td>Country</td>
                        <td colspan=2>Actions</td>
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
                                    <a href="{{ route('contacts.edit', $contact->id).'?page=' . $contacts->currentPage()}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('contacts.destroy', $contact->id).'?page=' . $contacts->currentPage()}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">There are no data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {!! $contacts->links() !!}
        </div>
    </div>
</div>
@endsection