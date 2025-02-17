@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row pb-3 pt-3">
		<div class="col-md-10">
			<h3>Detail List</h3>
		</div>

		<div class="col-md-2">
			<a href="{{ route('detail.add') }}" class="btn btn-success btn-sm">Add</a>
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
						<th>Competency</th>
						<th>Weight</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $detail)
						<tr>
							<td>{{ $detail->id }}</td>
							<td>{{ $detail->name }}</td>
							<td>{{ $detail->competency ? $detail->competency->name : '' }}</td>
							<td>{{ $detail->weight }}</td>
							<td>
								<a href="{{ route('detail.edit', ['id' => $detail->id]) }}" class="btn btn-sm btn-primary">Edit</a>
								<form action="{{ route('detail.delete') }}" method="post" role="form" style="display: inline" class="delete">
									@csrf
									@method('delete')
									<input type="hidden" value="{{ $detail->id }}" name="id">
									<button type="submit" class="btn btn-sm btn-danger" title="Delete">Delete</button>
								</form>
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
		$('.delete').submit(function() {
		    var c = confirm("Are you sure to delete?");
		    return c; //you can just return c because it will be true or false
		});

		$('.table').DataTable();
	});
</script>
@endsection