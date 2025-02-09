@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Employee Add</h3>
		</div>

		<div class="col-md-2">
			<a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-12">
			@include('layouts.check')
			<form action="{{ route('employee.save') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
				</div>

				<div class="form-group text-right">
					<button class="btn btn-sm btn-success" type="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

