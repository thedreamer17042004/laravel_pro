<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\Node\FunctionNode;

class PostController extends Controller
{


   public function index()
   {

   $posts = Posts::Orderby('id', 'desc')->paginate(5);
      return view('admin.posts.index', compact('posts'));
   }



   public function create()
   {
   

    return view('admin.posts.add');
   }

   public function store(Request $request)
   {
      $slug = Str::slug($request->name, '-');

      $request->validate([
         'name' => 'required|max:255',
         'image' => 'required|mimes:jpeg,jpg,png',
         'content' => 'required',
       
      ]);



      $uploadfile = $request->file('image');
      $new_image = rand() . '.' . $uploadfile->getClientOriginalExtension();
      $uploadfile->move(public_path('/admin/images/admin/'), $new_image);


      $post = Posts::query()->create([
         'name' => $request->name,
         'slug' => $slug,
         'content' => $request->content,
         'image' => $new_image,
      ]);


      return redirect()->route('admin.post.index')->with('Added successfully');
   }

   public function edit(Request $request, $id)
   {

      $post = DB::table('posts')->where('id', $id)->get()->first();
    

      return view('admin.posts.edit', compact('post'));
   }
   public function update(Request $request)
   {
      $id = $request->id;
      $value = DB::table('posts')->where('id',  $id)->get()->first();
      $slug = Str::slug($request->name, '-');

      $uploadfile = $request->file('image');

      if($uploadfile==null) {

         $new_image = $value->image;
         $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
         ]);


      } else {

        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'content' => 'required',
         ]);


         $new_image = rand() . '.' . $uploadfile->getClientOriginalExtension();
         $uploadfile->move(public_path('/admin/images/admin/'), $new_image);   


        

         
      }

    
      $affected = DB::table('posts')
         ->where('id', $id)
         ->update([
            'name' => $request->name,
            'image' => $new_image,
            'slug'=>$slug,
            'content' => $request->content,
         
         ]);


         return redirect()->route('admin.post.index')->with('Success', 'Updated success!!!');
   }

 

   public function delete(Request $request) {
      $id = $request->id;

      $table = DB::table('posts')->where('id', $id)->delete();
   
      return back()->with('success', 'Deleted successfully');

   }
}
