<?php

use App\Http\Livewire\Penduduk\Create;
use App\Http\Livewire\ScanKartu;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'penduduk'], function () {
        Route::get('catat-keluarga', Create::class)->name('keluarga.create');
    });
    Route::get('scan-kartu', ScanKartu::class)->name('scan-kartu');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
