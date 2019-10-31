@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 table-responsive">
			@include('layouts.check')
			<table class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $employee)
						<tr>
							<td>{{ $employee->id }}</td>
							<td> <a href="{{ route('display.show',['id' => $employee->id]) }}" target="_blank">{{ $employee->name }}</a></td>
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
	})
</script>
@endsection