<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaLengkapController;
use App\Http\Controllers\GuruLengkapController;
use App\Http\Controllers\PrestasiLengkapController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\VisidanMisiController;
use App\Http\Controllers\SaranaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
        ->name('home');

Route::get('/berita-selengkapnya', [BeritaLengkapController::class, 'index'])
        ->name('berita-lengkap');
Route::get('/berita-selengkapnya/detail/{slug}', [BeritaLengkapController::class, 'show'])
        ->name('berita-detail');
Route::get('/guru', [GuruLengkapController::class, 'index'])
        ->name('guru-lengkap');
Route::get('/prestasi-selengkapnya', [PrestasiLengkapController::class, 'index'])
        ->name('prestasi-lengkap');
Route::get('/sejarah', [SejarahController::class, 'index'])
        ->name('sejarah');
Route::get('/visi-dan-misi', [VisidanMisiController::class, 'index'])
        ->name('visidanmisi');
Route::get('/sarana-prasarana', [SaranaController::class, 'index'])
        ->name('sarana-prasarana');




Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth', 'admin')
        ->group(function () {
                Route::get('/', [AdminController::class, 'index'])
                        ->name('admin');
                Route::get('/dashboard', [DashboardController::class, 'index'])
                        ->name('dashboard');

                Route::resource('/category', '\App\Http\Controllers\Admin\CategoryController');
                Route::get('/berita/berita_tampil_hapus', [BeritaController::class, 'tampil_hapus'])
                        ->name('tampil_hapus');
                // Route::get('/berita/berita_restore/{id}', [BeritaController::class, 'restore'])
                // ->name('berita_restore');
                // Route::delete('/berita/berita_restore/hapus{id}', [BeritaController::class, 'kill'])
                // ->name('berita_restore_hapus');
                Route::resource('/berita', '\App\Http\Controllers\Admin\BeritaController');
                Route::resource('/user', '\App\Http\Controllers\Admin\UserController');
                Route::resource('/guru', '\App\Http\Controllers\Admin\GuruController');
                // Route::resource('/alumni', '\App\Http\Controllers\Admin\AlumniController');
                Route::resource('/prestasi', '\App\Http\Controllers\Admin\PrestasiController');
        });
        
Auth::routes(['register' => false, 'reset' => false]);