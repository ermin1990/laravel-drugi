<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCity extends Model
{

    protected $table = 'user_cities';

    protected $fillable = [
        'city_id', 'user_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
