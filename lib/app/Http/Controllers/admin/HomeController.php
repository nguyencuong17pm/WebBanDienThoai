<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Users;
use App\Models\Bills;
use App\Models\KhuyenMai;

class HomeController extends Controller
{
    public function getHome()
    {
    	$data['thongke_prod'] = Product::count();
    	$data['thongke_cate'] = Category::count();
    	$data['thongke_km'] = KhuyenMai::count();
    	$data['thongke_bill'] = Bills::count();
    	return view('admin.index', $data);
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->intended('login');
    }
}
