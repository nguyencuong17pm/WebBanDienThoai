<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProdRequest;

class ProductController extends Controller
{
    public function getProd()
    {
    	$data['prodlist'] = Product::all();
    	return view('admin.product', $data);
    }

    public function getProdAdd()
    {
    	$data['catelist'] = Category::all();
    	return view('admin.addproduct', $data);
    }

    public function getProdAddKhuyenmai()
    {
        $data['catelist'] = Category::all();
        return view('admin.addproductkhuyenmai', $data);
    }

    public function postProdAdd(AddProdRequest $request)
    {
    	$filename = $request->img->getClientOriginalName();
    	$product = new Product;
    	$product->prod_name = $request->name;
    	$product->prod_slug = str_slug($request->name);
        $product->prod_gia = $request->price;
    	$product->prod_img = $filename;
    	$product->prod_phukien = $request->accessories;
    	$product->prod_baohanh = $request->warranty;
    	$product->prod_quatang = $request->promotion;
    	$product->prod_tinhtrang = $request->condition;
    	$product->prod_trangthai = $request->status;
    	$product->prod_mieuta = $request->description;
        $product->prod_spdatbiet = $request->featured;
    	$product->prod_khuyenmai = $request->khuyenmai;
    	$product->prod_cate = $request->cate;
    	$product->save();
    	$request->img->storeAs('avatar', $filename);
    	return back();
    }

    public function postProdAddKhuyenmai(AddProdRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_gia = $request->giakhuyenmai;
        $product->prod_giakhuyenmai = $request->price;
        $product->prod_img = $filename;
        $product->prod_phukien = $request->accessories;
        $product->prod_baohanh = $request->warranty;
        $product->prod_quatang = $request->promotion;
        $product->prod_tinhtrang = $request->condition;
        $product->prod_trangthai = $request->status;
        $product->prod_mieuta = $request->description;
        $product->prod_spdatbiet = $request->featured;
        $product->prod_khuyenmai = $request->khuyenmai;
        $product->prod_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avatar', $filename);
        return back();
    }


    public function getProdEdit($id)
    {
    	$data['prodlist'] = Product::find($id);
        $cate['catelist'] = Category::all();
    	return view('admin.editproduct', $data, $cate);
    }

    public function getProdEditKhuyenmai($id)
    {
        $data['prodlist'] = Product::find($id);
        $cate['catelist'] = Category::all();
        return view('admin.editproductkhuyenmai', $data, $cate);
    }

    public function postProdEdit(Request $request,$id)
    {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['prod_gia'] = $request->price;
        $arr['prod_phukien'] = $request->accessories;
        $arr['prod_baohanh'] = $request->warranty;
        $arr['prod_quatang'] = $request->promotion;
        $arr['prod_tinhtrang'] = $request->condition;
        $arr['prod_trangthai'] = $request->status;
        $arr['prod_mieuta'] = $request->description;
        $arr['prod_spdatbiet'] = $request->featured;
        $arr['prod_khuyenmai'] = $request->khuyenmai;
        $arr['prod_cate'] = $request->cate;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function postProdEditKhuyenmai(Request $request,$id)
    {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['prod_gia'] = $request->giakhuyenmai;
        $arr['prod_giakhuyenmai'] = $request->price;
        $arr['prod_phukien'] = $request->accessories;
        $arr['prod_baohanh'] = $request->warranty;
        $arr['prod_quatang'] = $request->promotion;
        $arr['prod_tinhtrang'] = $request->condition;
        $arr['prod_trangthai'] = $request->status;
        $arr['prod_mieuta'] = $request->description;
        $arr['prod_spdatbiet'] = $request->featured;
        $arr['prod_khuyenmai'] = $request->khuyenmai;
        $arr['prod_cate'] = $request->cate;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function getProdDelete($id)
    {
    	Product::destroy($id);
    	return back();
    }
}
