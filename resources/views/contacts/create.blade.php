@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 offset-sm-2 margin-nav">
			<h1 class="display-3">{{ __('common.addContact') }}</h1>
			<div>
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
				<form method="post" action="{{ route('contacts.store') }}">
					@csrf
					<div class="form-group">
						<label for="first_name">{{__('common.firstName')}}:</label>
						<input type="text" class="form-control" name="first_name" />
					</div>

					<div class="form-group">
						<label for="last_name">{{__('common.lastName')}}:</label>
						<input type="text" class="form-control" name="last_name" />
					</div>

					<div class="form-group">
						<label for="email">{{__('common.email')}}:</label>
						<input type="text" class="form-control" name="email" />
					</div>
					<div class="form-group">
						<label for="city">{{__('common.city')}}:</label>
						<input type="text" class="form-control" name="city" />
					</div>
					<div class="form-group">
						<label for="country">{{__('common.country')}}:</label>
						<input type="text" class="form-control" name="country" />
					</div>
					<div class="form-group">
						<label for="job_title">{{__('common.jobTitle')}}:</label>
						<input type="text" class="form-control" name="job_title" />
					</div>
					<button type="submit" class="btn btn-primary">{{__('common.addContact')}}</button>
					<a href="{{'/contacts'.'?page=' . $contacts->page}}" class="btn btn-light ml-3">{{__('common.cancel')}}</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection