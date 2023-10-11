<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function register() {


        return view('website.register');
    }
    public function detail_product() {


        return view('website.detail_food');
    }
    public function cart() {


        return view('website.cart');
    }
}
