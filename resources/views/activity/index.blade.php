@extends('app')

@Section('title', 'Activity')

@section('content')

	<div class="card mt-3">
		<div class="card-header">
			<h4 class="d-inline">Activity</h4>

			<a class="btn btn-primary btn-sm float-right mr-2" href="{{ route('activity.create') }}">Add activity</a>
		</div>
		<div class="card-body">
			<table class="table mt-4">
				<tr>
					<th>
						<div class="form-check form-check-inline">
							<input class="form-check-input maincheckbox" type="checkbox" value="">
						</div>
					</th>
					<th>Date</th>
					<th>Cycle</th>
					<th>Activity</th>
					<th>Team Code</th>
					<th>Contract</th>
					<th colspan="2">Output</th>
					<th></th>
				</tr>

				@forelse($activityrecords as $activity)
					<tr>
						<td>
							<div class="form-check form-check-inline">
								<input class="form-check-input singlecheckbox" type="checkbox" name="activity_id[]" value="{{ $activity->activity_id }}" form="{{ $activitycheckboxformname ?? 'deleteactivityform' }}">
							</div>
						</td>
						<td class="text-nowrap">
							{{ $activity->activity_date->format('jS M Y') }}
						</td>
						<td>
							{{ $activity->activity_date->format('M Y') }}
						</td>
						<td>
							{{ $activity->activity_type }}
						</td>
						<td>{{ $activity->team_code }}</td>
						<td>{{ $activity->contract_code }}</td>
						<td class="text-nowrap">
							@foreach($activity->outputs as $output)
								{{ $output->output_type }}
								<br>
							@endforeach
						</td>
						<td class="text-nowrap">
							@foreach($activity->outputs as $output)
								{{ $output->output_value }}
								<br>
							@endforeach
						</td>
						<td>
							<div class="btn-group float-right" role="group">
								<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Open menu">
									<i class="fa fa-bars"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="{{ route('activity.edit', [$activity->activity_id]) }}">Edit</a>
								</div>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="9">
							There is no activity
						</td>
					</tr>
				@endforelse
			</table>

		</div>
	</div>

@endsection