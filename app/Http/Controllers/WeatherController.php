<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Weather;
use Exception;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;


class WeatherController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->city;
        $name = strtolower($request->city);
        $svigradovi = City::all();
        $city = City::selectRaw("lower(name) as name, id")
            ->whereRaw("lower(name) = ?", [$name])
            ->first();

        if (!$city) {

                return view('home', compact('search'));


        } else {
            $weather = Weather::where('city_id', $city->id)->first();
        }

        return view('home', compact('weather', 'svigradovi'));

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

    private function strlower(mixed $city)
    {

        return strtolower($city);
    }


}
