<?php

namespace App\Http;
class ForecastHelper{

    public static function getColorByTemperature($temperature) {
        if($temperature <= 0) {
            return 'bg-blue-200';
        } else if($temperature >= 1 && $temperature <= 15) {
            return 'bg-blue-400';
        } else if ($temperature > 15 && $temperature <= 25) {
            return 'bg-green-500';
        }else{
            return 'bg-orange-500';
        }
    }

    public static function getIconByWeatherType($name) {

        $iconPath = public_path().'/svg/';
        $name = strtolower($name);

        if (!file_exists($iconPath.$name.'.svg')) {
            $name = 'unknown';
        }


        return view('partials.weather-icon', ['name' => $name]);

    }
}
