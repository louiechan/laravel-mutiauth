<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Task extends Model
{
  /**
  *使name支持批量赋值
  *@var array
  */
    protected $fillable = ['name'];

  /**
  *关联user模型
  *
  *
  */
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
