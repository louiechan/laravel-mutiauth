<?php
namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository{
  //获取已知用户的所有任务
  public function allTasks(User $user)
  {
    return Task::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
  }
}
 ?>
