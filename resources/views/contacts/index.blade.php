@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">

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
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Job Title</td>
                <td>City</td>
                <td>Country</td>
                <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->job_title}}</td>
                    <td>{{$contact->city}}</td>
                    <td>{{$contact->country}}</td>
                    <td>
                        <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection