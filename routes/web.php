<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCities;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/search', [WeatherController::class, 'search'])->name("search");
Route::get('/forecast/{city:name}', [ForecastController::class, 'index'])->name("forecast");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name("index");
    //Route::view('add', 'admin.add')->name("add");
    //Route::post('add-city', [WeatherController::class, 'addCity'])->name("add-city");
    Route::get('delete/{city_id}', [WeatherController::class, 'deleteCity'])->name("delete");
    Route::get('edit/{id}', [WeatherController::class, 'editCity'])->name("edit");
    Route::patch('update/{id}', [WeatherController::class, 'updateCity'])->name("update");

    Route::get('forecast', [AdminForecastController::class, 'index'])->name("admin.forecast");

    Route::post('add-forecast', [AdminForecastController::class, 'addForecast'])->name("add-forecast");

    Route::get('add-fav-city/{city}', [UserCities::class,'addcity'])->name('add-fav-city');
    Route::get('delete-fav-city/{city}', [UserCities::class,'deletecity'])->name('delete-fav-city');

})->name("admin");

require __DIR__.'/auth.php';
