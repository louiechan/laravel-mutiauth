<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
      return view('admin.task.index')->withTasks(Task::all());
    }

    public function destroy($id)
    {
      Task::find($id)->delete();
      return redirect()->back();
    }
}
