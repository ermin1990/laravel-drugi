<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Exception;
use Illuminate\Http\Request;

class AdminForecastController extends Controller
{
    public function index()
    {

        $cities = City::all();
        return view('admin.forecast', compact('cities'));

    }

    public function addForecast(Request $request)
    {

        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|integer|min:-70|max:70',
            'weather_type' => 'required',
            'probability' => 'integer|min:0|max:100|nullable',
            'date' => 'required|unique:forecasts,date',
        ]);

        $forecast = new Forecast();

        try {
            $forecast->city_id = $request->city_id;
            $forecast->temperature = $request->temperature;
            $forecast->weather_type = $request->weather_type;
            $forecast->probability = $request->probability;
            $forecast->date = $request->date;

            $forecast->save();

            return redirect()->route('admin.forecast')->with('success', 'Forecast je uspješno dodan');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }


    }
}
