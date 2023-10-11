<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {


        $roles = DB::table('roles')->paginate(6);

        return view('admin.role.create', compact('roles'));
    }
    public function create()
    {

        $routes = Permission::all();



        return view('admin.role.add', compact('routes'));
    }
    public function  store(Request $request)
    {



        $validatedData = $this->validate($request, [
            'name' => 'required|unique:roles',
        ], [
            'name.required' => 'Vui lòng nhập tên role',
            'name.unique' => 'Role da ton tai'
        ]);

        // $routes = json_encode($request->route);
        // dd($routes);
        $role = Role::create([
            'name' => $request->name,
        ]);


        foreach ($request->route as $rout) {
            $role_permission = DB::table('permission_role')->insert([
                'permission_id' => $rout,
                'role_id' => $role->id
            ]);
        }




        return redirect()->route('admin.role.index');
    }

    public function edit($id)
    {

        $role = Role::with('permissions')->find($id);
        $routes = Permission::all();
        $permission_role = [];
        foreach ($role->permissions as $key) {
            array_push($permission_role, $key->pivot->permission_id);
        }

        return view('admin.role.edit', compact('role', 'routes', 'permission_role'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên role',
        ]);

        $affected = DB::table('roles')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
    ]);


    

    $delete_ = DB::table('permission_role')->where('role_id', $id)->delete();
    foreach ($request->route as $rout) {
        $rol = DB::table('permission_role')->insert([
            'role_id' => $id,
            'permission_id' => $rout
        ]);
    }


    return redirect()->route('admin.role.index');

    }
    public function delete($id)
    {
        $table = DB::table('roles')->where('id', $id)->delete();
        // session()->flash('success', 'Category  deleted successfully !');
        return redirect()->route('admin.role.index');
    }
}
