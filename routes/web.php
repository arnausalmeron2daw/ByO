<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\TallerEditConfigController;
use App\Http\Controllers\TallerSuscriptionController;
use App\Http\Controllers\TallerMainController;
use App\Http\Controllers\TallerConfigController;
use App\Http\Controllers\TallerRegisterController;
use App\Http\Controllers\TallerRegister2Controller;
use App\Http\Controllers\TallerRegister3Controller;

use App\Http\Controllers\TallerLoginController;




use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registerUser', [RegisterUserController::class, 'index'])->name('registerUser.index');
Route::post('/registerUser', [RegisterUserController::class, 'store'])->name('registerUser.store');
Route::get('/loginUser', [LoginUserController::class, 'index'])->name('loginUser.index');
Route::post('/loginUser', [LoginUserController::class, 'store'])->name('loginUser.store');

Route::get('/tallerRegister', [TallerRegisterController::class, 'index'])->name('tallerRegister.index');
Route::post('/tallerRegister', [TallerRegisterController::class, 'store'])->name('tallerRegister.store');

Route::get('/tallerRegister2', [TallerRegister2Controller::class, 'index'])->name('tallerRegister2.index');
Route::post('/tallerRegister2', [TallerRegister2Controller::class, 'store'])->name('tallerRegister2.store');

Route::get('/tallerRegister3', [TallerRegister3Controller::class, 'index'])->name('tallerRegister3.index');



Route::get('/tallerLogin', [TallerLoginController::class, 'index'])->name('tallerLogin.index');
Route::post('/tallerLogin', [TallerLoginController::class, 'store'])->name('tallerLogin.store');


Route::get('/tallerSuscription', [TallerSuscriptionController::class, 'index'])->name('tallerSuscription.index');
Route::post('/tallerSuscription', [TallerSuscriptionController::class, 'store'])->name('tallerSuscription.store');

Route::get('/tallerMain', [TallerMainController::class, 'index'])->name('tallerMain.index');
Route::get('/tallerConfig', [TallerConfigController::class, 'index'])->name('tallerConfig.index');

Route::get('/tallerEditConfig', [TallerEditConfigController::class, 'index'])->name('tallerEditConfig.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
