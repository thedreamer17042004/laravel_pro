<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{


    public function index()
    {


        $users = User::with('roles')->paginate(5);


        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = DB::table('roles')->get();

        return view('admin.users.add', compact('roles'));
    }
    public function  store(Request $request)
    {


        $validate = $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'ddpassword' => 'required',
                'status' => 'required',
                'avarta' => 'required',
                'roles' => 'required'

            ],
            [
                'name.required' => "Vui lòng nhập tên của bạn",
                'email.required' => "Vui lòng nhập email",
                'email.unique' => "Email đã tồn tại",
                'email.email' => "Email không đúng định dạng",
                'ddpassword.required' => "Password chưa nhập",
                'status.required' => "Vui lòng chọn trạng thái",
                'avarta.required' => "Avatar Chưa nhập",
                'roles.required' => "Vui lòng chọn role"
            ]

        );


        $uploadfile = $request->file('avarta');

        $anh_user_avatar = rand() . '.' . $uploadfile->getClientOriginalName();
        $uploadfile->move(public_path('/admin/images/admin/'), $anh_user_avatar);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->ddpassword),
            'status' => $request->status,
            'avartar' => $anh_user_avatar,
        ]);



        foreach ($request->roles as $rout) {
            $rol = DB::table('role_user')->insert([
                'role_id' => $rout,
                'user_id' => $user->id
            ]);
        }



        return redirect()->route('admin.user.index');
    }
    public function edit($id)
    {

        $roles = DB::table('roles')->get();
        $users = User::with('roles')->find($id);
        $role_user = [];
        foreach ($users->roles as $key) {
            array_push($role_user, $key->pivot->role_id);
        }


        return view('admin.users.edit', compact('users', 'roles', 'role_user'));
    }

    public function update(Request $request, $id)
    {

        $user = DB::table('users')->find($id);

        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'roles' => 'required'
        ], [
            'name.required' => "Vui lòng nhập tên của bạn",
            'email.required' => "Vui lòng nhập email",
            'email.email' => "Email không đúng định dạng",
            'status.required' => "Vui lòng chọn trạng thái",
            'roles.required' => "Vui lòng chọn role"
        ]);

        $name_file = $request->file('avartar');
        if ($name_file == null) {
            $image_name = $user->avartar;
        } else {
            $image_name = rand() . '.' . $name_file->getClientOriginalName();
            $name_file->move(public_path('/admin/images/admin/'), $image_name);
        }

        $data_id = DB::table('role_user')->where('user_id', $user->id)->get();


        $affected = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'avartar' => $image_name,
        ]);


        

        $delete_ = DB::table('role_user')->where('user_id', $user->id)->delete();
        foreach ($request->roles as $rout) {
            $rol = DB::table('role_user')->insert([
                'role_id' => $rout,
                'user_id' => $user->id
            ]);
        }




        return redirect()->route('admin.user.index');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $table = DB::table('users')->where('id', $id)->delete();
        // session()->flash('success', 'Category  deleted successfully !');
        return redirect()->route('admin.user.index');
    }
}
