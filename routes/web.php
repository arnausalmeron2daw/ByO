<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ShowTallerController;
use App\Http\Controllers\TallerMainController;
use App\Http\Controllers\MisReservasController;
use App\Http\Controllers\TallerLoginController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TallerConfigController;
use App\Http\Controllers\TallerHorariosController;
use App\Http\Controllers\TallerRegisterController;
use App\Http\Controllers\TallerEditConfigController;
use App\Http\Controllers\TallerSuscriptionController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.log');


Route::get('/registerUser', [RegisterUserController::class, 'index'])->name('registerUser.index');
Route::post('/registerUser', [RegisterUserController::class, 'store'])->name('registerUser.store');
Route::get('/loginUser', [LoginUserController::class, 'index'])->name('loginUser.index');
Route::post('/loginUser', [LoginUserController::class, 'store'])->name('loginUser.store');

Route::get('/tallerRegister', [TallerRegisterController::class, 'index'])->name('tallerRegister.index');
Route::post('/tallerRegister', [TallerRegisterController::class, 'store'])->name('tallerRegister.store');
Route::post('/tallerRegister/horario', [TallerRegisterController::class, 'horariosTaller'])->name('tallerRegister.horariosTaller');

Route::get('/tallerHorarios', [TallerHorariosController::class, 'index'])->name('tallerHorarios.index');
Route::post('/tallerHorarios', [TallerHorariosController::class, 'store'])->name('tallerHorarios.store');



Route::get('/tallerLogin', [TallerLoginController::class, 'index'])->name('tallerLogin.index');
Route::post('/tallerLogin', [TallerLoginController::class, 'store'])->name('tallerLogin.store');


Route::get('/tallerSuscription', [TallerSuscriptionController::class, 'index'])->name('tallerSuscription.index');
Route::post('/tallerSuscription', [TallerSuscriptionController::class, 'store'])->name('tallerSuscription.store');

Route::get('/tallerMain', [TallerMainController::class, 'index'])->name('tallerMain.index');
Route::get('/tallerConfig', [TallerConfigController::class, 'index'])->name('tallerConfig.index');


Route::get('/tallerEditConfig', [TallerEditConfigController::class, 'index'])->name('tallerEditConfig.index');
Route::get('/dashboard', [LoginUserController::class, 'showTalleres'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/showTaller/{id}', [ShowTallerController::class, 'show'])->name('showTaller.show');
Route::post('/showTallerCita', [ShowTallerController::class, 'store'])->name("reserva.cli.store");

Route::get('/misReservas', [MisReservasController::class, 'index'])->name("misReservas.index");
Route::delete('/reservas/{id}', [MisReservasController::class, 'destroy'])->name('reservas.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/reservas', [ReservaController::class, 'store'])->name("reserva.store");
Route::get('/reservas', [ReservaController::class, 'index'])->name("reserva.index");
Route::delete('/reservas', [ReservaController::class, 'destroy'])->name("reserva.delete");




require __DIR__.'/auth.php';
