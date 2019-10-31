@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Employee List</h3>
		</div>

		<div class="col-md-2">
			<a href="{{ route('employee.add') }}" class="btn btn-success btn-sm">Add</a>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12 table-responsive">
			@include('layouts.check')
			<table class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $employee)
						<tr>
							<td>{{ $employee->id }}</td>
							<td>{{ $employee->name }}</td>
							<td>
								<a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-sm btn-primary">Edit</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('.table').DataTable();
	});
</script>
@endsection