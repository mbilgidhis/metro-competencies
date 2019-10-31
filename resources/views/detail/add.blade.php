@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Detail Add</h3>
		</div>

		<div class="col-md-2">
			<a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-8">
			@include('layouts.check')
			<form action="{{ route('detail.save') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
				</div>
				<div class="form-group">
					<label for="competency">Competency</label>
					<select name="competency" id="competency" class="form-control" required>
						<option>-- Select --</option>
						@foreach($competencies as $competency)
						<option value="{{ $competency->id}}">{{ $competency->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="weight">Weight</label>
					<input type="number" name="weight" id="weight" class="form-control" placeholder="Weight" required>
				</div>
				<div class="form-group text-right">
					<button class="btn btn-sm btn-success" type="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection