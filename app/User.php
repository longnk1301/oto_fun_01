<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'add',
        'role',
        'avatar',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'user_id', 'roles');
    }

    public function getRole()
    {
        $users = Role::find($this->roles);

        return $users;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
