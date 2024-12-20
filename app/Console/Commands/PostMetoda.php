<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\json;

class PostMetoda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:post-metoda';

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
        $url = "https://reqres.in/api/cerate";
        $data = [
            "name"=>"Ermin",
            "job" => "QA"
        ];

        $res = Http::post($url,$data);
        dd($res->body());

    }
}
