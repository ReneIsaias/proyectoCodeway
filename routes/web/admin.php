<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PreuserController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacantController;

/*
| ------------------------------------------------- - ------------------------
| Administrative web routes
| ------------------------------------------------- - ------------------------
|
| This is where the web administration paths for the codeway system are registered.
|
| These RouteServiceProvider loads the management routes within a group that
| Contains the middleware group "web".
|
| These routes are very important
|
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('absence', AbsenceController::class)->names('absence');

    Route::resource('category', CategoryController::class)->names('category');

    Route::resource('class', ClassController::class)->names('class');

    Route::resource('departament', DepartamentController::class)->names('departament');

    Route::resource('event', EventController::class)->names('event');

    Route::resource('group', GroupController::class)->names('group');

    Route::resource('holiday', HolidayController::class)->names('holiday');

    Route::resource('period', PeriodController::class)->names('period');

    Route::resource('permission', PermissionController::class)->names('permission');

    Route::resource('preuser', PreuserController::class)->names('preuser');

    Route::resource('priority', PriorityController::class)->names('priority');

    Route::resource('project', ProjectController::class)->names('project');

    Route::resource('role', RoleController::class)->names('role');

    Route::resource('status', StatusController::class)->names('status');

    Route::resource('task', TaskController::class)->names('task');

    Route::resource('type', TypeController::class)->names('type');

    Route::resource('user', UserController::class)->names('user');

    Route::resource('vacant', VacantController::class)->names('vacant');

});
