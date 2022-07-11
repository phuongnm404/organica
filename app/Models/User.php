<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\StaticFeature;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function static_feature() {
        return $this -> belongsToMany(StaticFeature::class, 'user_static_feature', 'user_id', 'static_id');
    }

    public function checkPermissionAccess($permissionCheck) {
        
        // Bước 1: Lấy được các quyền của user đang login hệ thống
        $roles = auth()->user()->roles;
        // Bước 2: So sánh giá trị đưa vào của router hiện tại xem có tồn tại trong các quyền đã lấy được
        foreach( $roles as $role) {
           $permissions = $role->permissions;
           if( $permissions->contains('key_code',$permissionCheck)) {
               return true;
           }
          
        }
        return false;

    }

    public function setPasswordAttribute($password) {
        if(trim($password) === '') {
            return;
        }
        $this->attributes['password'] = Hash::make($password);
    }
    
}
