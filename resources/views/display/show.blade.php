@extends('layouts.app')

@section('content')
<div class="container">
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
@endsection

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" /> --}}
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
			    	backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
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
					suggestedMax: 100
				}
			}
		}
	};
	window.onload = function() {
		window.myRadar = new Chart(document.getElementById('canvas'), config);
	};
	
</script>
@endsection