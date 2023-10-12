<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ProfileController extends Controller
{


   public function index()
   {
    $user = Auth::user();
    $data = User::find($user)->first();



      return view('admin.profile.index', compact('data'));
   }



 

  

 
}
