<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    })
    ;
    // Route::get('/patients', [PatientController::class, 'index']); //fetch employee
});

require __DIR__.'/auth.php';
