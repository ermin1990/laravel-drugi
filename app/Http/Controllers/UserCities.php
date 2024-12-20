<?php

namespace App\Http\Controllers;

use App\Models\UserCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCities extends Controller
{

    public function addcity($city)
    {

        try {
            UserCity::create([
                'city_id' => $city,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->back()->with('success', 'Grad je dodan u favorite');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    public function deleteCity($city){

        try {
            UserCity::where('city_id', $city)->where('user_id', Auth::user()->id)->delete();
            return redirect()->back()->with('success', 'Grad je obrisan iz favorite');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

}

