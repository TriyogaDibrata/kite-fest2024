<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'ref'], function () {
    Route::get('category-list', [RefController::class, 'categoryList'])->name('ref.category_list');
    Route::get('flight-list', [RefController::class, 'flightList'])->name('ref.flight_list');
});
Route::middleware('auth')->group(function () {
    Route::prefix('konfigurasi')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });

    Route::prefix('masterdata')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('flights', FlightController::class);
    });

    //peserta lomba
    Route::resource('participants', ParticipantController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::controller(RoleController::class)->group(function() {
//     Route::get('/roles', 'index')->middleware('can:read-role');
// });

require __DIR__.'/auth.php';
