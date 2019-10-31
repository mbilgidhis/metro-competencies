@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Competency Edit </h3>
		</div>

		<div class="col-md-2">
			<a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-8">
			@include('layouts.check')
			<form action="{{ route('competency.update') }}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{ $competency->id }}" required>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $competency->name }}" required autofocus>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" rows="3" class="form-control" placeholder="Description">{{ $competency->description }}</textarea>
				</div>
				<div class="form-group text-right">
					<button class="btn btn-sm btn-success" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection