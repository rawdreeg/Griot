<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Discussion extends Model
{
    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function hut()
    {
        return $this->belongsTo(Hut::class);
    }

    public function getPathAttribute()
    {
        return asset("api/discussion/$this->slug");
    }
}
