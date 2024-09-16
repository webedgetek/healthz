<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SearchPatientController;
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

Route::get('/', function (){
    return view('login');
});

 Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/add-patient', [EmployeeController::class, 'index']); //fetch employee
    // Route::get('/patients', \App\Http\Livewire\PatientRegister::class);
    // Route::get('/patients', \App\Http\Livewire\Patient::class);
    Route::resource('patients', PatientController::class)
        ->missing(function (Request $request){
          return Redirect::route('patient.create');
    });

    Route::resource('search-patient', SearchPatientController::class);
    Route::get('/view-patient', [PatientController::class, 'view_patient']); //add  employee
    // Route::resource('view-patient', SearchPatientController::class);
    Route::resource('service', ServiceRequestController::class);
    Route::resource('users', ProfileController::class);
    Route::resource('sponsors', SponsorController::class); 
});

require __DIR__.'/auth.php';
