<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Weather;

class HomeController extends Controller
{
    public function index()
    {


        $svigradovi = City::all();
        return view("home", compact( "svigradovi"));
    }
}
