<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

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



Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::view('/register', 'login.register')->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [SiteController::class, 'home'])->name('site.home');

    Route::get('/usuarios', [SiteController::class, 'usuarios'])->name('site.usuarios');
    
    Route::get('/usuarios/{usuario}', [SiteController::class, 'show'])->name('usuarios.show');
    
});
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login.form');
})->name('logout');



// Rota da tela que diz "verifique seu e-mail"
Route::get('/email/verify', function () {
    return view('login.verify-email'); // você pode personalizar esse view
})->middleware('auth')->name('verification.notice');

// Rota que o link do email acessa
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/site/home'); // ou redireciona para onde quiser
})->middleware(['auth', 'signed'])->name('verification.verify');

// Rota para reenviar e-mail de verificação
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link de verificação enviado!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');







// Tela do "esqueci minha senha"
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')->name('password.request');

// Enviar o link por e-mail
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')->name('password.email');

// Formulário de nova senha
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')->name('password.reset');

// Enviar nova senha
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')->name('password.update');
