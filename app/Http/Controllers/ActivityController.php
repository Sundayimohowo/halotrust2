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

}