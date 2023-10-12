<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        $products = DB::table('products')->take( 6 )->get();
        $produ = DB::table('products')->take( 3 )->get();
        $product_drinks = DB::table('products')->get()->where('category_id', '2');
        $product_burger = DB::table('products')->get()->where('category_id', '3');
        $product_pasta = DB::table('products')->get()->where('category_id', '4');
        $posts = DB::table('posts')->take(3)->get();
        return view('website.index', compact('products','posts', 'produ', 'product_drinks', 'product_burger', 'product_pasta'));
    }

    public function index_menu() {

        $status= '1';
        $products = DB::table('products')->take( 6 )->get();
        $produ = DB::table('products')->take( 3 )->get();
        $product_drinks = DB::table('products')->get()->where('category_id', '2');
        $product_burger = DB::table('products')->get()->where('category_id', '3');
        $product_pasta = DB::table('products')->get()->where('category_id', '4');
        return view('website.menu', compact('status', 'products', 'produ', 'product_drinks', 'product_burger', 'product_pasta'));
    }
    public function index_service() {
        $status= '2';

        $produ = DB::table('products')->take( 4 )->get();

        return view('website.service', compact('status', 'produ'));
    }
    public function index_about() {

        $status= '4';

        return view('website.about', compact('status'));
    }
    public function index_contact() {
        $status= '5';


        return view('website.contact', compact('status'));
    }
    public function index_blog() {

        $status= '3';
        $posts = DB::table('posts')->get();
        return view('website.blog', compact('status', 'posts'));
    }
    public function index_blog_detail() {

        $status= '6';

        return view('website.blog_detail', compact('status'));
    }
    public function login() {


        return view('website.login');
    }
    public function post_login(Request $request) {


       $value = $request->validate([
            'email'=>'required',
            'password' => 'required'
        ], [
            'email.required' => "Vui lòng nhập email",
            'password.required' => "Vui lòng nhập password"
        ]);



        if (Auth::guard('cus')->attempt($value)) {
         
                return redirect()->route('home.index')->with('message', 'login success');
          
        }else {
            return redirect()->back()->with('faile_login', 'Email or password error');
        }

        
    }
    public function logout() {
        Auth::guard('cus')->logout();
        return redirect()->route('home.index');
    }
    public function register() {


        return view('website.register');
    }
    public function post_register(Request $request) {

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:customers',
            'password'=>'required'

        ], [
            'name.required' => 'Vui long nhap ten',
            'email.required'=> "vui long nhap email",
            'email.unique'=> 'Email da ton tai',
            'password.required' => "Password nhap vao "
        ]);


       $cus = Customer::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password)
        
        ]);
      $user_id =  User::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password)
        
        ]);

        $role = Role::where('id', 2)->get()->first();

     
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id'=>$user_id->id
        ]);

        return redirect()->route('loginPage')->with('message_register', 'Register successfully');


       
    }
    public function detail_product() {


        return view('website.detail_food');
    }
    // public function cart() {


    //     return view('website.cart');
    // }
}
