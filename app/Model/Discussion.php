<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Discussion extends Model
{
    //protected $guarded = [];
    protected $fillable = [
        'title', 'slug', 'body', 'user_id','category_id', 'hut_id'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function($discussion){
            $discussion->slug = str_slug($discussion->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

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
        return "/discussion/$this->slug";
    }
}
