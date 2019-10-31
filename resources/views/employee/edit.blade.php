@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Employee Edit </h3>
		</div>

		<div class="col-md-2">
			<a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-12">
			@include('layouts.check')
			<form action="{{ route('employee.update') }}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{ $employee->id }}">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $employee->name }}" required autofocus>
				</div>
				{{-- Navbar start --}}
				<nav class="pt-3 pb-3">
					<div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
						@foreach( $competencies as $competency )
						<a class="nav-item nav-link @if( $loop->first ) active @endif" id="nav-{{ $competency->name }}-tab" data-toggle="tab" href="#nav-{{ $competency->name }}" role="tab" aria-controls="nav-{{ $competency->name }}" aria-selected="true">{{ $competency->name }}</a>
						@endforeach
					</div>
				</nav>

				<div class="tab-content pb-5" id="nav-tabContent">
					@foreach( $competencies as $competency )
						<div class="pb-3 tab-pane fade @if( $loop->first ) show active @endif" id="nav-{{ $competency->name }}" role="tabpanel" aria-labelledby="nav-{{ $competency->name }}-tab">
							@foreach( $competency->details as $detail )
							<div class="form-group">
								@php
									$identifier = $competency->name . '-' . $detail->name . '-' . $detail->id;
									$scores = $employee->scores;
									$value = $scores->where('detail_id', $detail->id)->first();
								@endphp
								<label for="{{ $identifier }}">{{ $detail->name }}</label>
								<input type="number" name="{{ $identifier }}" id="{{ $identifier}}" value="{{ $value->score }}" class="form-control" step="0.1" min="0" max="5" required>
							</div>
							@endforeach
						</div>
					@endforeach
				</div>
				{{-- Navbar End --}}
				<div class="form-group text-right">
					<button class="btn btn-sm btn-success" type="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection