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
            'city' => 'required|string|max:255',
            'temperature' => 'required|numeric|min:0|max:50',
        ]);

        try {

            Weather::create([
                'city' => $request->city,
                'temperature' => $request->temperature
            ]);

            return redirect()->back()->with('success', 'Grad je uspjesno dodan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function deleteCity(Weather $city){
        $city->delete();
        return redirect()->back()->with('success', 'Grad je uspjesno obrisan');
    }

}
