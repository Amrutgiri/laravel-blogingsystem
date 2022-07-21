<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
      $category=Category::count();
      $posts=Post::count();
      $users=User::where('role_as','0')->count();
      $admin_user=User::where('role_as','1')->count();
       return view('admin.dashboard',compact('category','posts','users','admin_user'));
    }
}
