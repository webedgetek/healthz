<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\PatientVisitsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SponsorController;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function (){
//     return view('login');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('patients', PatientController::class)
        ->missing(function (Request $request){
          return Redirect::route('patient.create');
    });

    Route::get('patients/details/{patient_id}', [PatientController::class, 'show'])->name('patient.show');
    // Route::get('patients/add-visit/{patient_id}', [PatientController::class, 'attendance'])->name('patient.show');
    Route::get('search-patient', [ PatientController::class, 'search']);
    Route::resource('service', ServiceRequestController::class);
    Route::resource('users', ProfileController::class);
    Route::resource('sponsors', SponsorController::class); 
    Route::get('patient/visits/{patient_id}', [PatientVisitsController::class, 'index'])->name('attendance.index');
});

require __DIR__.'/auth.php';
