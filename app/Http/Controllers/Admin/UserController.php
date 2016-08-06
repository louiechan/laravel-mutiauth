<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\user;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function index()
  {
    return view('admin.user.index')->withUsers(User::all());
  }

  public function destroy($id)
  {
    User::find($id)->delete();
    return redirect()->back();
  }
}
