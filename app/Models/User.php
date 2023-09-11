<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departments()
    {
        return $this->morphToMany(Department::class,'departmentable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function present()
    {
        return new UserPresenter($this);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view',$this)) {
            return $query;
        }
        return $query->where('id',auth()->id());
    }

    public function getRoleDisplayName()
    {
         return $this->roles->pluck('display_name')->implode(', ');
    }

    public function getDepartmentsName()
    {
         return $this->departments->pluck('name')->implode(', ');
    }

    public function lastFivePublished(){
       return Post::latest('created_at')->published()->publishInfrontPage()
       ->select('title','slug','created_at','user_id')
       ->take(5)->get();

      // return $posts->sortByDesc('created_at');
    }

    public function lastTenUpdated(){
        return Post::latest('updated_at')->published()->publishInfrontPage()
        ->select('title','slug','updated_at','user_id')
        ->limit(10)->get();


     }
}
