<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Weather;

class HomeController extends Controller
{
    public function index()
    {

        $randomWeather = Weather::inRandomOrder();
        $svigradovi = City::all();

        $weather = $randomWeather->first();
        return view("home", compact("weather", "svigradovi"));
    }
}
