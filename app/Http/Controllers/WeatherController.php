<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use App\Models\Weather;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class WeatherController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->get('city');

        $cities = City::with('forecast')->where("name", "LIKE", "%$search%")->get();

        if (count($cities) == 0) {
            return Redirect::route('home')->with(['error'=>'Nismo pronašli grad!']);
        }
        return view('home', compact('cities'));
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

    public function editCity($id)
    {
        $forecast = Forecast::where('id',$id)->first();
        //dd($forecast);
        return view('admin.edit', compact('forecast'));
    }

    public function updateCity(Request $request,$id)
    {
        $forecast = Forecast::where('id',$id)->first();

        $request->validate([
            'temperature' => 'required|numeric|min:-50|max:50',
        ]);
        try {
            $forecast->update($request->all());
            return redirect()->route('index')->with('success', 'Temperatura je uspjesno ažurirana');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with($error);
        }

    }


}
