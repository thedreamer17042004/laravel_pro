<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = ['name', 'status','display_name' ,'slug'];

    public function roles() {

        return $this->belongsToMany(Role::class,'roles_permissions');
            
     }
     
   //   public function users() {
     
   //      return $this->belongsToMany(User::class,'users_permissions');
            
   //   }
}
