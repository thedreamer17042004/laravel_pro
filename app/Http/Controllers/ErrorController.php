<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ErrorController extends Controller
{

    public function index()
    {
      

        $code = request()->code;
        $config = config('error.403');

        return view('admin.errors.403', compact('config'));
    }


   


}
