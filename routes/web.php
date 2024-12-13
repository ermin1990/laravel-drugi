<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/search', [WeatherController::class, 'search'])->name("search");


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name("index");
    Route::post('add-city', [WeatherController::class, 'addCity'])->name("add-city");
    Route::get('delete/{city}', [WeatherController::class, 'deleteCity'])->name("delete");

})->name("admin");

require __DIR__.'/auth.php';
