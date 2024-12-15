<?php

namespace App\Http\Controllers;

use App\Models\Weather;

class HomeController extends Controller
{
    public function index()
    {

        $randomWeather = Weather::inRandomOrder();

        $weather = $randomWeather->first();
        return view("home", compact("weather"));
    }
}
