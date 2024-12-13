<?php

namespace App\Http\Controllers;

use App\Models\Weather;

class AdminController extends Controller
{

    public function index()
    {
        $allCities = Weather::all();
        return view('admin.index', compact('allCities'));
    }
}
