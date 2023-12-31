<?php

use App\Http\Controllers\KamusBahasaController;
use App\Http\Controllers\PaketCRUDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard')->with('success', 'Welcome Back');
    }

    return redirect("login");
});

Route::get('/dashboard', [KamusBahasaController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/nilais', [NilaiController::class, 'store'])->name('nilai.store');
    Route::put('/nilais/{nilais}', [NilaiController::class, 'update']);
    Route::delete('/nilais/{nilais}', [NilaiController::class, 'destroy']);
});



// Define a route for generating the PDF
// Route::get('/PaketSoal/generate-pdf', 'PaketCRUDController@generatePDF');
Route::get('/PaketSoal/generate-pdf', [PaketCRUDController::class, 'generatePDF'])->middleware('auth')->name('paketsoal.generate-pdf');;

require __DIR__.'/auth.php';

Route::resource('/KamusBahasa', \App\Http\Controllers\KamusBahasaController::class)->middleware('auth');

Route::resource('/PaketSoal', \App\Http\Controllers\PaketCRUDController::class)->middleware('auth');
Route::post('/PaketSoal/{PaketSoal}/Hasil', [PaketCRUDController::class, 'evaluate'])->middleware('auth')->name('PaketSoal.evaluate');

Route::resource('/Soal', \App\Http\Controllers\SoalCRUDController::class)->middleware('auth');
