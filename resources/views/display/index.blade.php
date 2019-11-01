@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row pb-5">
		<div class="col-md-12 justify-content-center">
			<div class="pb-5 mt-3">
				<div style="width:100%">
					<canvas id="canvas"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 table-responsive">
			@include('layouts.check')
			<table class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Average</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $employee)
						@php
							if( $employee->average >= 70 )
								$class = 'table-danger';
							else if( $employee->average >= 40 )
								$class = 'table-warning';
							else
								$class = 'table-light';
						@endphp
						<tr class="{{ $class }}">
							<td>{{ $employee->id }}</td>
							<td> <a href="{{ route('display.show',['id' => $employee->id]) }}" target="_blank">{{ $employee->name }}</a></td>
							<td>{{ $employee->average }}</td>
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
<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1/dist/Chart.min.js"></script>
<script src="{{ asset('js/utils.js') }}"></script>
<script>
	$('.table').DataTable();
	var color = Chart.helpers.color;

	var config = {
		type: 'radar',
		data:  {
		    labels: <?php echo json_encode($competencies); ?>,
		    datasets: [
			    {
			    	label: 'Competencies',
			    	backgroundColor: color(window.chartColors.red).alpha(0.6).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
			        data: <?php echo json_encode($scores); ?>
			    }
		    ]
		},
		options: {
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Software Competencies'
			},
			scale: {
				ticks: {
					beginAtZero: true,
					suggestedMin: 0,
					suggestedMax: 100,
					minor: {
						fontSize: 14
					}
				},
				gridLines: {
	            	lineWidth: 1,
	            	color: 'rgba(0, 0, 0, 0.8)',
	        	},
	        	angleLines: {
	        		color: 'rgba(0, 0, 0, 0.8)',
	        	},
	        	pointLabels: {
	        		fontSize: 14,
	        		lineHeight: 1.8
	        	}
			}
		}
	};
	window.onload = function() {
		window.myRadar = new Chart(document.getElementById('canvas'), config);
	};
</script>
@endsection