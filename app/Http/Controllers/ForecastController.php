<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(City $city){

        $allForecast = Forecast::where(['city_id' =>$city->id])->get();

        return view('forecast', compact(['city', 'allForecast']));
    }
}
