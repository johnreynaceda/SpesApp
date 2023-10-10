<?php

use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin == true) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('student.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

////////////////////////////////////////////////////////////////
//Admin routes
Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/applicants', function () {
        return view('admin.applicants');
    })->name('admin.applicants');
    Route::get('/documents', function () {
        return view('admin.documents');
    })->name('admin.documents');
});


////////////////////////////////////////////////////////////////
//Student routes
Route::prefix('student')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('student.index');
    })->name('student.dashboard');
    Route::get('/documents', function () {
        return view('student.documents');
    })->name('student.documents');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';