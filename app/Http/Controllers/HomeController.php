<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $randomWeather = Weather::inRandomOrder();

        $weather = $randomWeather->first();
        return view("home", compact("weather"));
    }
}
