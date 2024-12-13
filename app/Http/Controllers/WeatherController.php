<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;


class WeatherController extends Controller
{

    public function search(Request $request)
    {

        if (!$weather = Weather::where('city', $request->city)->first()) {
            $error = $request->city . " ne postoji u bazu";
            return redirect()->back()->with($error);
        }

        return view('home', compact('weather'));
    }

    public function addCity(Request $request)
    {

        $request->validate([
            'city' => 'required|string|max:255|unique:weather,city',
            'temperature' => 'required|numeric|min:0|max:50',
        ]);

        try {
            Weather::create([
                'city' => $request->city,
                'temperature' => $request->temperature
            ]);
            return redirect()->route('index')->with('success', 'Grad je uspjesno dodan');
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with($error);
        }

    }

    public function deleteCity(Weather $city)
    {
        $city->delete();
        return redirect()->back()->with('success', 'Grad je uspjesno obrisan');
    }

    public function editCity(Weather $city)
    {
        return view('admin.edit', compact('city'));
    }

    public function updateCity(Request $request, Weather $city)
    {

        $request->validate([
            'city' => 'required|string|max:255',
            'temperature' => 'required|numeric|min:0|max:50',
        ]);

        try {
            $city->update([
                "city" => $request->city,
                "temperature" => $request->temperature,
            ]);
            return redirect()->route('index')->with('success', 'Grad je uspjesno azuriran');
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with($error);
        }

    }


}
