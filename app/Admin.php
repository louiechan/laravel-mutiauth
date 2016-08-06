<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;
class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    *关联task模型
    *
    *@return Task class
    */

    public function tasks( )
    {
      return $this->hasMany(Task::class);
    }
}
