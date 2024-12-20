<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\UserCity;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $svigradovi = City::with('oneforecast')->get();

        $favourites = [];
        if (Auth::check()) {
            $favourites = UserCity::where(['user_id'=> Auth::user()->id])->with('city')->get();
//            die($favourites);
        }

        return view("home", compact("svigradovi","favourites"));
    }
}
