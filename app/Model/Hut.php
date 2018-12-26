<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hut extends Model
{
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug'; 
    }
}
