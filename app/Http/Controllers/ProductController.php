<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ProductController extends Controller
{


   public function index()
   {

      $products = Product::with('category')->paginate(5);

      $total = $products->total();
      $currentPage = $products->currentPage();
      $perPage = $products->perPage();

      $from = ($currentPage - 1) * $perPage + 1;
      $to = min($currentPage * $perPage, $total);
      return view('admin.products.index', compact('products', 'from', 'to', 'total'));
   }



   public function show_create()
   {
      $category = DB::table('categories')->get();
      return view('admin.products.add_product', compact('category'));
   }

   public function post_product(Request $request)
   {
      $slug = Str::slug($request->add_product, '-');

      $request->validate([
         'add_product' => 'required|max:255',
         'add_image' => 'required|mimes:jpeg,jpg,png',
         'add_price' => 'required',
         'description' => 'required',
         'Business_Type' => 'required'
      ]);



      $uploadfile = $request->file('add_image');
      $new_image = rand() . '.' . $uploadfile->getClientOriginalExtension();
      $uploadfile->move(public_path('/admin/images/admin/'), $new_image);


      $category = Product::query()->create([
         'name' => $request->add_product,
         'slug' => $slug,
         'price' => $request->add_price,
         'image' => $new_image,
         'category_id' => $request->Business_Type,
         'description' => $request->description
      ]);


      return redirect(route('admin.product.index'))->with('Added successfully');
   }

   public function show_edit(Request $request)
   {

      $category = DB::table('categories')->get();
      $id = $request->id;
      $value = DB::table('products')->where('id',  $id)->get()->first();

      return view('admin.products.edit_product', compact('category', 'value'));
   }
   public function post_edit(Request $request)
   {
      $id = $request->id;
      $value = DB::table('products')->where('id',  $id)->get()->first();
      $slug = Str::slug($request->add_product, '-');

      $uploadfile = $request->file('add_image');
      if($uploadfile==null) {

         $new_image = $value->image;
         $request->validate([
            'add_product' => 'required|max:255',
            'add_price' => 'required',
            'description' => 'required',
            'Business_Type' => 'required'
         ]);


      } else {
         $new_image = rand() . '.' . $uploadfile->getClientOriginalExtension();
         $uploadfile->move(public_path('/admin/images/admin/'), $new_image);   
         dd($new_image);

         $request->validate([
            'add_product' => 'required|max:255',
            'add_image' => 'required|mimes:jpeg,jpg,png',
            'add_price' => 'required',
            'description' => 'required',
            'Business_Type' => 'required'
         ]);

         
      }

    
      $affected = DB::table('products')
         ->where('id', $id)
         ->update([
            'name' => $request->add_product,
            'image' => $new_image,
            'slug'=>$slug,
            'price' => $request->add_price,
            'category_id' => $request->Business_Type,
            'description' => $request->description
         ]);


         return redirect(route('admin.product.index'))->with('Success', 'Updated success!!!');
   }

   public function view_single(Request $request) {
      $id = $request->id;

      $category = DB::table('categories')->get();
      $id = $request->id;
      $value = DB::table('products')->where('id',  $id)->get()->first();

      return view('admin.products.view_one', compact('category', 'value'));
   }

   public function delete_product(Request $request) {
      $id = $request->id;

      $table = DB::table('products')->where('id', $id)->delete();
      // session()->flash('success', 'Category  deleted successfully !');
      return back()->with('success', 'Deleted successfully');

   }
}
