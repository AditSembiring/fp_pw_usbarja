<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KenapaController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimoniController;
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

Route::get('/', [FrontendController::class, 'index']);
// Login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// About
Route::get('/about', [AboutController::class, 'index'])->name('about')->middleware('auth');
Route::get('/about/create', [AboutController::class, 'create'])->name('about.create')->middleware('auth');
Route::post('/about/store', [AboutController::class, 'store'])->name('about.store')->middleware('auth');
Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit')->middleware('auth');
Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update')->middleware('auth');
Route::post('/about/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy')->middleware('auth');
Route::post('/about/delete/{id}', [AboutController::class, 'delete'])->name('about.delete')->middleware('auth');
// produk
Route::get('/produk', [produkController::class, 'index'])->name('produk')->middleware('auth');
Route::get('/produk/create', [produkController::class, 'create'])->name('produk.create')->middleware('auth');
Route::post('/produk/store', [produkController::class, 'store'])->name('produk.store')->middleware('auth');
Route::get('/produk/edit/{id}', [produkController::class, 'edit'])->name('produk.edit')->middleware('auth');
Route::post('/produk/update/{id}', [produkController::class, 'update'])->name('produk.update')->middleware('auth');
Route::post('/produk/destroy/{id}', [produkController::class, 'destroy'])->name('produk.destroy')->middleware('auth');

// team
Route::get('/team', [TeamController::class, 'index'])->name('team')->middleware('auth');
Route::get('/team/create', [TeamController::class, 'create'])->name('team.create')->middleware('auth');
Route::post('/team/store', [TeamController::class, 'store'])->name('team.store')->middleware('auth');
Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit')->middleware('auth');
Route::post('/team/update/{id}', [TeamController::class, 'update'])->name('team.update')->middleware('auth');
Route::post('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy')->middleware('auth');
// kenapa
Route::get('/kenapa', [KenapaController::class, 'index'])->name('kenapa')->middleware('auth');
Route::get('/kenapa/create', [KenapaController::class, 'create'])->name('kenapa.create')->middleware('auth');
Route::post('/kenapa/store', [KenapaController::class, 'store'])->name('kenapa.store')->middleware('auth');
Route::get('/kenapa/edit/{id}', [KenapaController::class, 'edit'])->name('kenapa.edit')->middleware('auth');
Route::post('/kenapa/update/{id}', [KenapaController::class, 'update'])->name('kenapa.update')->middleware('auth');
Route::post('/kenapa/destroy/{id}', [KenapaController::class, 'destroy'])->name('kenapa.destroy')->middleware('auth');
// testimoni
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni')->middleware('auth');
Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create')->middleware('auth');
Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store')->middleware('auth');
Route::get('/testimoni/edit/{id}', [TestimoniController::class, 'edit'])->name('testimoni.edit')->middleware('auth');
Route::post('/testimoni/update/{id}', [TestimoniController::class, 'update'])->name('testimoni.update')->middleware('auth');
Route::post('/testimoni/destroy/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy')->middleware('auth');

Route::get('/tentang', [FrontendController::class, 'tentang']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/service', [FrontendController::class, 'service']);
Route::get('/feedback', [FrontendController::class, 'feedback']);
Route::get('/tim', [FrontendController::class, 'tim']);
