<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;

class ActivityController extends Controller
{

	public function index(Request $request) {
		$activityrecords = Activity::all();

		return view('activity.index', compact('activityrecords'));
	}

	public function create(Request $request) {
		return view('activity.create');
	}

	public function store(Request $request) {

		$request->validate([
			'task_code' => 'required',
			'activity_date' => 'required',
			'team_code' => 'required',
			'activity_type' => 'required',
			'contract_code' => 'required',
			'outputs.*' => 'required|numeric',
		]);

		$activity = Activity::create([
			'task_code' => $request->task_code,
			'activity_date' => $request->activity_date,
			'team_code' => $request->team_code,
			'activity_type' => $request->activity_type,
			'contract_code' => $request->contract_code,
			'outputs' => $request->outputs,
		]);

		foreach ($request->outputs as $key => $value) {
			$activity->outputs()->create([
				'output_type' => $key,
				'output_value' => $value,
			]);
		}

		return redirect()->route('activity.index')->with('status', 'New activity record created');
	}

	public function edit(Request $request, $activityId) {
		$activity = Activity::findOrFail($activityId);

		return view('activity.edit', compact('activity'));
	}

	public function editclone(Request $request, $activityId) {
		$activity = Activity::findOrFail($activityId);

		return view('activity.editclone', compact('activity'));
	}

	public function update(Request $request, $activityId) {

		$activity = Activity::findOrFail($activityId);

		$request->validate([
			'task_code' => 'required',
			'activity_date' => 'required',
			'team_code' => 'required',
			'activity_type' => 'required',
			'contract_code' => 'required',
			'outputs.*' => 'required|numeric',
		]);

		$activity->task_code = $request->task_code;
		$activity->activity_date = $request->activity_date;
		$activity->team_code = $request->team_code;
		$activity->activity_type = $request->activity_type;
		$activity->contract_code = $request->contract_code;
		$activity->save();

		foreach ($request->outputs as $key => $value) {
			$activity->outputs()->updateOrCreate([
				'output_type' => $key,
			], [
				'output_value' => $value,
			]);
		}

		return redirect()->route('activity.index')->with('status', 'New activity record updated');
	}

    public function clone(Request $request)
    {
        // Create a new model instance
        $clonedRecord = new Activity();

        // Set the attributes of the new model instance
		$clonedRecord->task_code = $request->task_code;
		$clonedRecord->activity_date = $request->activity_date;
		$clonedRecord->team_code = $request->team_code;
		$clonedRecord->activity_type = $request->activity_type;
		$clonedRecord->contract_code = $request->contract_code;
        // You can add additional logic here to allow the user to modify the values of the cloned record's fields before saving it

        // Save the new model instance to the database
        $clonedRecord->save();

		
		foreach ($request->outputs as $key => $value) {
			$clonedRecord->outputs()->updateOrCreate([
				'output_type' => $key,
			], [
				'output_value' => $value,
			]);
		}

		return redirect()->route('activity.index')->with('status', 'New activity record updated');
    }

}