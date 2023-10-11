<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avartar', 'status'
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

    // public function hasRole($roleName)
    // {
    //     return $this->where('role_id', $roleName);
    // }

    // public function getId()
    // {
    //     return $this->role_id;
    // }

  
    // public function roles() {
    //     return $this->hasMany(Role::class, 'id', 'role_id');
    // }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasPermission($route) {
        $routes = $this->routes();
     return in_array($route, $routes) ? true :false;
    }
    public function routes() {
        return ['admin.dashboard'];
    }
}
