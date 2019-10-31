@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row pb-5">
		<div class="col-md-12 justify-content-center">
			<h3>{{ $employee->name }}</h3>
			<div class="pb-5 mt-3">
				<div style="width:100%">
					<canvas id="canvas"></canvas>
				</div>
			</div>
		</div>
	</div>


</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@foreach($details as $detail)
				<div class="table-responsive pb-5">
					<table class="table">
						<thead>
							<tr>
								<th colspan="{{ $detail->details->count() }}" class="text-center">{{ $detail->name }}</th>
							</tr>
							<tr>
								@foreach($detail->details as $det)
									<th class="text-center">{{ $det->name . ' (' . $det->weight . ')' }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
							@foreach($detail->details as $det)
								@foreach($det->detailsemployee as $d)
									@if( $d->competency_id == $detail->id)
										<td class="text-center">{{ $d->score }}</td>
									@endif
								@endforeach
							@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('styles')

<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1/dist/Chart.min.js"></script>
<script src="{{ asset('js/utils.js') }}"></script>
<script>
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
				text: '{{ $employee->name }} Competencies'
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