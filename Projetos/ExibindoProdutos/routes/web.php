<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
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

/*
Route::get('/', function () {
return view('site.home');
});
*/

Route::get('/',[SiteController::class, 'index'])->name('site.index');

Route::get('/detalhesProduto/{slug}', [SiteController::class, 'detalhes'])->name('site.detalhes');

Route::get('/categoria/{nome}',[SiteController::class, 'categoria'])->name('site.categoria');