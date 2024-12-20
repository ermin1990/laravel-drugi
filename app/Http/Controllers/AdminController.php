<?php

namespace App\Http\Controllers;

use App\Models\City;

class AdminController extends Controller
{

    public function index()
    {
        $allCities = City::with('forecast')->get();
        return view('admin.index', compact('allCities'));
    }
}
