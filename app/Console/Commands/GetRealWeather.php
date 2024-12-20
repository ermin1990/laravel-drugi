<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mycmd:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->ask("Za koji grad vam je potrebna temperatura");
        $apiKey = "f58dc6c500f2460094c201148242012";

        $url = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$city&aqi=no";
        $res = Http::get($url);
        $res = $res->json();

        $temp = $res['current']['temp_c'];
        $curCity = $res['location']['name'];
        $condition = $res['current']['condition']['text'];

        switch ($condition) {
            case "Heavy snow":
                $condition = "snijeg";
                break;
            case "Clear":
                $condition = "čisto";
                break;
            case "Patchy rain nearby":
                $condition = "prolazna kiša";
                break;
            case "Overcast":
                $condition = "oblačno";
                break;
            default:
                $condition = $condition;
        }

        dd("Trenutna temperatura za $curCity je $temp C, vani je $condition");

    }
}
