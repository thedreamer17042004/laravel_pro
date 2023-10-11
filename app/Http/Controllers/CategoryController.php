<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function show_category()
    {
        // $category= Category::query()->orderBy('created_at', 'desc')->get();
        // $category= Category::all();
        $category = DB::table('categories')->paginate(5);
        $stt = 1;

        $total = $category->total();
        $currentPage = $category->currentPage();
        $perPage = $category->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);
        return view('admin.category.show_category', compact('category', 'stt', 'from', 'to', 'total'));
    }


    public function add_category()
    {
        return view('admin.category.add_category');
    }
    public function post_category(Request $request)
    {

        // $slug = Str::slug('Your Awesome Blog Title', '-');/
        $slug = Str::slug($request->add_category, '-');
        // dd($slug);
        $validatedData = $this->validate($request, [
            'add_category' => 'required',
            // 'slug'  => 'required|min:3|max:255|unique:posts',
        ]);

        $category = Category::create([
            'name' => $request->add_category,
            'slug' => $slug
        ]);

        // flash('Article updated')->success();
        return redirect()->route('admin.showCategorySort');
    }



    public function delete_category($id)
    {
        $table = DB::table('categories')->where('id', $id)->delete();
        // session()->flash('success', 'Category  deleted successfully !');
        return back()->with('success', 'Deleted successfully');
    }


    public function edit_category(Request $request,  Category $category)
    {
        $id = $request->route('id');
        $value = DB::table('categories')->where('id', $id)->get();
        $result = $value[0];

        return view('admin.category.edit_category', ['result' => $result, 'id' => $id]);
    }

    public function post_edit_category(Request $request, Category $category, $id)
    {

        $request->validate([
            'update_name' => 'required',
            'slug_' => 'required|min:3|max:20',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $name = $request->update_name;
        $slug = $request->slug_;
        $value = DB::table('categories')->where('id', $id)->update(['name' => $name, 'slug' => $slug]);
        return redirect()->route('admin.showCategorySort');
    }


    public function show($id)
    {
        $user = Category::find($id);
        return response()->json([
            'data' => $user
        ]);
    }




    public function OrderBy(Request $request)
    {
        if ($request->order_by == 1) {
            $data['orderby'] = Category::orderBy('id', 'ASC')->get();
        } elseif ($request->order_by == 2) {
            $data['orderby'] = Category::orderBy('id', 'DESC')->get();
        }

        return response()->json($data);
    }



    public function show_category_sort(Request $request)
    {
        // $content = Category::with('products')->where('id', 1)->count();
        // dd($categories);
        // dd($content);
        $option = [3, 4, 5, 6];
        $search_data = $request->search_data;


        $name = $request->name;
        $id = $request->id;
        // $query = DB::table('categories');
        $query =Category::with('products');
        $myselect = $request->myselect;

        if ($request->has('name', 'id', 'myselect')) {
            $category =Category::with('products')->orderBy($id, $name)->paginate($myselect);
    
            $total = $category->total();
            $currentPage = $category->currentPage();
            $perPage = $category->perPage();

            $from = ($currentPage - 1) * $perPage + 1;
            $to = min($currentPage * $perPage, $total);
            $stt = 1;


            return view('admin.category.show_category', compact('category', 'stt', 'from', 'to', 'total', 'option', 'myselect','name', 'id','search_data'));
        } else {
            if ($request->has('name', 'id')) {
                //  dd('kdksd');
    
                $query->OrderBy($id, $name);
    
                $category = $query->paginate(5);
    
                $total = $category->total();
                $currentPage = $category->currentPage();
                $perPage = $category->perPage();
    
                $from = ($currentPage - 1) * $perPage + 1;
                $to = min($currentPage * $perPage, $total);
                $stt = 1;
    
                return view('admin.category.show_category', compact('category', 'stt','search_data' ,'from', 'to', 'total', 'option', 'myselect','id','name'));
            }
            // else if(0 === count(array_diff(['name', 'id', 'myselect'], array_keys($a)))) {
            else if ($request->has('myselect')) {
    
    
                // $category = DB::table('categories')->orderBy('created_at', 'DESC')->paginate($myselect);
                $category = Category::with('products')->orderBy('created_at', 'DESC')->paginate($myselect);

    
                $total = $category->total();
                $currentPage = $category->currentPage();
                $perPage = $category->perPage();
    
                $from = ($currentPage - 1) * $perPage + 1;
                $to = min($currentPage * $perPage, $total);
                $stt = 1;
    
    
                return view('admin.category.show_category', compact('category','search_data', 'stt', 'from', 'to', 'total', 'option', 'myselect'));
            } else if($request->has('search_data')){
                $category = Category::with('products')->where('name', 'LIKE', '%'.$search_data.'%')->get();

                $stt = 1;
                return view('admin.category.show_category', compact('category','stt', 'search_data','option','myselect'));
            }
            
            else {
                // $category = DB::table('categories')->orderBy('created_at', 'DESC')->paginate(5);
        $category = Category::with('products')->orderBy('created_at', 'DESC')->paginate(5);
    
                $total = $category->total();
                $currentPage = $category->currentPage();
                $perPage = $category->perPage();
    
                $from = ($currentPage - 1) * $perPage + 1;
                $to = min($currentPage * $perPage, $total);
                $stt = 1;
    
                return view('admin.category.show_category', compact('category','search_data', 'stt', 'from', 'to', 'total', 'option', 'myselect'));
            }
        }

        
    }


}
