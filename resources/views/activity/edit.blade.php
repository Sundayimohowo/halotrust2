@extends('app')

@Section('title', 'Edit Activity')

@section('content')

	<div class="container mt-3">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<form method="post" action="{{ route('activity.update', [$activity->activity_id]) }}" id="activityform">

			@csrf

			<div class="form-row">
				<div class="form-group">
					<label>Task code</label>
					<input type="text" name="task_code" class="form-control" placeholder="e.g. HT-001" value="{{ $activity->task_code }}">
				</div>
			</div>

			<div class="form-row">
				<div class="col-6">
					<label>The date of the activity</label>
					<input type="date" name="activity_date" class="form-control" form="activityform" value="{{ $activity->activity_date->format('Y-m-d') }}">
				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>The team that did the activity</label>
					<select class="form-control" name="team_code" form="activityform">
						<option></option>
						<option @if($activity->team_code == 'MT-01') selected @endif>MT-01</option>
						<option @if($activity->team_code == 'MT-02') selected @endif>MT-02</option>
						<option @if($activity->team_code == 'MT-03') selected @endif>MT-03</option>
						<option @if($activity->team_code == 'MT-04') selected @endif>MT-04</option>
					</select>
				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>Contract</label>
					<select class="form-control" name="contract_code" form="activityform">
						<option @if($activity->contract_code == 'ABC123') selected @endif>ABC123</option>
						<option @if($activity->contract_code == 'ABC456') selected @endif>ABC456</option>
						<option @if($activity->contract_code == 'DEF123') selected @endif>DEF123</option>
						<option @if($activity->contract_code == 'DEF456') selected @endif>DEF456</option>
					</select>
				</div>

			</div>

			<div class="form-row mt-2">

				<label>The type of activity</label><br>

				<select class="form-control" name="activity_type">
					<option @if($activity->activity_type == 'ODOL') selected @endif>ODOL</option>
					<option @if($activity->activity_type == 'Linear') selected @endif>Linear</option>
					<option @if($activity->activity_type == 'Full Excavation') selected @endif>Full Excavation</option>
				</select>
			</div>

			<div class="form-row mt-2">
				<div class="form-group">
					<label>Area Cleared (SQM)</label>
					<input class="form-control" type="number" name="outputs[Area Cleared (SQM)]" value="{{ $activity->outputs?->where('output_type', 'Area Cleared (SQM)')?->first()?->output_value ?? null }}">
				</div>
				<div class="form-group">
					<label>No. Deminers</label>
					<input class="form-control" type="number" name="outputs[Num Deminers]" value="{{ $activity->outputs?->where('output_type', 'Num Deminers')?->first()?->output_value ?? null }}">
				</div>
				<div class="form-group">
					<label>Minutes worked</label>
					<input class="form-control" type="number" name="outputs[Minutes Worked]" value="{{ $activity->outputs?->where('output_type', 'Minutes Worked')?->first()?->output_value ?? null }}">
				</div>

			</div>

			<div class="form-row mt-2">

				<button type="submit" class="btn btn-primary">Save</button>

			</div>

		</form>


	</div>

@endsection