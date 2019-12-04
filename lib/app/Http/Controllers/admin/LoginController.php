<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	$arr = ['name'=>$request->name, 'password'=>$request->password];
    	if(Auth::attempt($arr)){
    		return redirect()->intended('admin/home');
    	}else{
    		return back()->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác');
    	}
    }

    public function getdoimatkhau()
    {
        return view('admin.doimatkhau');
    }

    public function postdoimatkhau(Request $request,$id)
    {
        if(Hash::check($request->password, get_data_user('web', 'password'))){
            $user = Users::find($id);
            $user->password = bcrypt($request->password_new);
            $user->save();

            return redirect()->with('error', 'Cập nhật thành công');
        }
        else {
            return redirect()->with('error', 'Mật khẩu cũ không đúng');
        }
    }
}
