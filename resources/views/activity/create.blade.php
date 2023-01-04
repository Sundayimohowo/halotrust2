@extends('app')

@Section('title', 'Create Activity')

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

		<form method="post" action="{{ route('activity.store') }}" id="activityform">

			@csrf

			<div class="form-row">
				<div class="form-group">
					<label>Task code</label>
					<input type="text" name="task_code" class="form-control" placeholder="e.g. HT-001" value="{{ old('task_code') }}">
				</div>
			</div>

			<div class="form-row">
				<div class="col-6">
					<label>The date of the activity</label>
					<input type="date" name="activity_date" class="form-control" form="activityform" value="{{ old('activity_date') }}">
				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>The team that did the activity</label>
					<select class="form-control" name="team_code" form="activityform">
						<option></option>
						<option @if(old('team_code') == 'MT-01') selected @endif>MT-01</option>
						<option @if(old('team_code') == 'MT-02') selected @endif>MT-02</option>
						<option @if(old('team_code') == 'MT-03') selected @endif>MT-03</option>
						<option @if(old('team_code') == 'MT-04') selected @endif>MT-04</option>
					</select>
				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>Contract</label>
					<select class="form-control" name="contract_code" form="activityform">
						<option @if(old('contract_code') == 'ABC123') selected @endif>ABC123</option>
						<option @if(old('contract_code') == 'ABC456') selected @endif>ABC456</option>
						<option @if(old('contract_code') == 'DEF123') selected @endif>DEF123</option>
						<option @if(old('contract_code') == 'DEF456') selected @endif>DEF456</option>
					</select>
				</div>

			</div>

			<div class="form-row mt-2">

				<label>The type of activity</label><br>

				<select class="form-control" name="activity_type">
					<option @if(old('activity_type') == 'ODOL') selected @endif>ODOL</option>
					<option @if(old('activity_type') == 'Linear') selected @endif>Linear</option>
					<option @if(old('activity_type') == 'Full Excavation') selected @endif>Full Excavation</option>
				</select>
			</div>

			<div class="form-row mt-2">
				<div class="form-group">
					<label>Area Cleared (SQM)</label>
					<input class="form-control" type="number" name="outputs[Area Cleared (SQM)]" value="{{ old('outputs')['Area Cleared (SQM)'] ?? null }}">
				</div>
				<div class="form-group">
					<label>No. Deminers</label>
					<input class="form-control" type="number" name="outputs[Num Deminers]" value="{{ old('outputs')['Num Deminers'] ?? null }}">
				</div>
				<div class="form-group">
					<label>Minutes worked</label>
					<input class="form-control" type="number" name="outputs[Minutes Worked]" value="{{ old('outputs')['Minutes Worked'] ?? null }}">
				</div>

			</div>

			<div class="form-row mt-2">

				<button type="submit" class="btn btn-primary">Create</button>

			</div>

		</form>


	</div>

@endsection