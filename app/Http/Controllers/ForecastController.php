<?php

namespace App\Http\Controllers;

use App\Models\City;

class ForecastController extends Controller
{
    public function index(City $city){

        return view('forecast', compact('city'));
    }
}
