<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    protected $fillable = ['name'];

    public function forecast(){
        return $this->hasMany(Forecast::class, 'city_id','id')
            ->orderBy('date', 'asc')
            ->limit(5);
    }
}
