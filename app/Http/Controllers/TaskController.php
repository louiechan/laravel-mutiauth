<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TaskRepository;
use App\Task;

class TaskController extends Controller
{
    protected $tasks;
  // 要求登录
    public function __construct(TaskRepository $tasks)
    {
      $this->middleware('auth');

      $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
      return view('tasks.index', [
        'tasks'=>$this->tasks->allTasks($request->user()),
      ]);
    }//todo依赖注入有问题,已解决

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required|max:255',
      ]);

      $request->user()->tasks()->create([
        'name'=>$request->name,
      ]);

      return redirect()->back();

    }

    // 删除操作
    public function destroy($id)
    {
      // $this->authorize('destroy',$task);
      Task::find($id)->delete();
      return redirect()->back();
    }

}
