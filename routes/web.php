<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [ActivityController::class, 'index'])->name('activity.index');
Route::get('create/{task}', ['as' => 'activity.create', 'uses' => 'ActivityController@create']);

Route::get('create', [ActivityController::class, 'create'])->name('activity.create');
Route::post('create', [ActivityController::class, 'store'])->name('activity.store');

Route::get('{activity}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
Route::post('{activity}/edit', [ActivityController::class, 'update'])->name('activity.update');