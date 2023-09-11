<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


    public function scopeIntersectPosts()
    {
        if(auth()->user()->can('view',$this) || auth()->user()->hasRole('Admin')){
            return $this->posts()->published()->get();
        }

       return $this->posts->intersect(Post::published()->publishInfrontPage()->get());
    }
}
