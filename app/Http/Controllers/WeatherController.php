<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Exception;
use Illuminate\Http\Request;


class WeatherController extends Controller
{

    public function search(Request $request)
    {

        if (!$weather = Weather::where('city', $request->city_id)->first()) {
            $error = $request->city_id . " ne postoji u bazu";
            return redirect()->back()->with($error);
        }

        return view('home', compact('weather'));
    }

    public function addCity(Request $request)
    {

        $request->validate([
            'city_id' => 'required|string|max:255|unique:weather,city',
            'temperature' => 'required|numeric|min:0|max:50',
        ]);

        try {
            Weather::create([
                'city_id' => $request->city_id,
                'temperature' => $request->temperature
            ]);
            return redirect()->route('index')->with('success', 'Grad je uspjesno dodan');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with($error);
        }

    }

    public function deleteCity(Weather $city_id)
    {
        $city_id->delete();
        return redirect()->back()->with('success', 'Grad je uspjesno obrisan');
    }

    public function editCity(Weather $city_id)
    {
        return view('admin.edit', compact('city_id'));
    }

    public function updateCity(Request $request, Weather $city_id)
    {

        $request->validate([
            'city_id' => 'required|string|max:255',
            'temperature' => 'required|numeric|min:0|max:50',
        ]);

        try {
            $city_id->update([
                "city_id" => $request->city_id,
                "temperature" => $request->temperature,
            ]);
            return redirect()->route('index')->with('success', 'Grad je uspjesno azuriran');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with($error);
        }

    }


}
