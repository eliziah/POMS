<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectManagerController;
use App\Http\Controllers\CRScheduleController;
use App\Http\Controllers\CRBudgetController;
use App\Http\Controllers\CRController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\WeeklyController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\MOMController;
use App\Http\Controllers\PresentationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/changepassword', [AuthController::class, 'changepassword']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//project
Route::resource('/project', ProjectController::class)->middleware('auth');
Route::get('/project/create/internal', [ProjectController::class, 'create_in'])->middleware('auth');
Route::get('/project/create/external', [ProjectController::class, 'create_ex'])->middleware('auth');
Route::post('/ledger/negative/{id}', [ProjectController::class, 'add_negative_ledger'])->middleware('auth');

//artifact
Route::post('/artifact/batchupdate', [ArtifactController::class, 'update_batch'])->middleware('auth');
Route::get('/artifact/initialize/{id}', [ArtifactController::class, 'initialize'])->middleware('auth');

//change request
Route::resource('/crbudget', CRBudgetController::class)->middleware('auth');
Route::resource('/crsched', CRScheduleController::class)->middleware('auth');
Route::get('/crsched/create/{id}', [CRScheduleController::class, 'create_project_cr'])->middleware('auth');
Route::get('/crbudget/create/{id}', [CRBudgetController::class, 'create_project_cr'])->middleware('auth');
Route::post('/crbudget/create/{id}', [CRBudgetController::class, 'store'])->middleware('auth');
Route::post('/crsched/create/{id}', [CRScheduleController::class, 'store'])->middleware('auth');
Route::get('/crbudget/approve/{id}/{status}', [CRBudgetController::class, 'approve'])->middleware('auth');
Route::post('/crbudget/reject/{id}', [CRBudgetController::class, 'reject'])->middleware('auth');
Route::get('/crsched/approve/{id}/{status}', [CRScheduleController::class, 'approve'])->middleware('auth');
Route::post('/crsched/reject/{id}', [CRScheduleController::class, 'reject'])->middleware('auth');
Route::get('/changerequests', [CRController::class, 'show_crs'])->middleware('auth');

//weekly reports
Route::get('/weeklyreport', [WeeklyController::class, 'index'])->middleware('auth');
Route::get('/weeklyreport/{id}', [WeeklyController::class, 'show'])->middleware('auth');
Route::get('/weeklyreport/create/{id}', [WeeklyController::class, 'create'])->middleware('auth');
Route::post('/weeklyreport/create/{id}', [WeeklyController::class, 'store'])->middleware('auth');


//project
Route::get('/guest/dashboard/{type}', [DashboardController::class, 'guest_specific']);
Route::get('/guest/project/{id}', [ProjectController::class, 'guest_show_project']);
Route::get('/guest/dashboard', [DashboardController::class, 'guest']);

//project managers
Route::get('/pm/dashboard', [ProjectManagerController::class, 'pmdashboard'])->middleware('auth');
Route::resource('/pm', ProjectManagerController::class)->middleware('auth');


//kpi calculators (batch)
Route::get('/kpi/users', [KPIController::class, 'kpi_users'])->middleware('auth');
Route::get('/kpi/projects', [KPIController::class, 'kpi_projects'])->middleware('auth');

Route::resource('/profile', UserController::class)->middleware('auth');

Route::resource('/mom', MOMController::class)->middleware('auth');

Route::resource('/present', PresentationController::class)->middleware('auth');