<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KhuyenMai;
use App\Http\Requests\AddProdRequest;

class KhuyenMaiController extends Controller
{
    public function getKhuyenMai()
    {
    	$data['khuyenmai'] = KhuyenMai::all();
    	return view('admin.khuyenmai', $data);
    }

    public function getAddKhuyenMai()
    {
    	$data['khuyenmai'] = KhuyenMai::all();
    	return view('admin.addkhuyenmai', $data);
    }

    public function postAddKhuyenMai(AddProdRequest $request)
    {
    	$filename = $request->img->getClientOriginalName();
    	$khuyenmai = new KhuyenMai;
    	$khuyenmai->km_name = $request->name;
    	$khuyenmai->km_slug = str_slug($request->name);
    	$khuyenmai->km_trangthai = $request->status;
    	$khuyenmai->km_link = $request->lienket;
    	$khuyenmai->km_img = $filename;
    	$khuyenmai->save();
    	$request->img->storeAs('avatar', $filename);
    	return back();
    }

    public function getEditKhuyenMai($id)
    {
    	$data['khuyenmai'] = KhuyenMai::find($id);
    	return view('admin.editkhuyenmai', $data);
    }

    public function postEditKhuyenMai(Request $request,$id)
    {
        // dd($request->toArray());
    	$khuyenmai = new KhuyenMai;
        $arr['km_name'] = $request->name;
        $arr['km_slug'] = str_slug($request->name);
        $arr['km_trangthai'] = $request->status;
        $arr['km_link'] = $request->lienket;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['km_img'] = $img;
            $request->img->storeAs('avatar'.$img, $request->user()->id);
        }
        $khuyenmai::where('km_id', $id)->update($arr);
        return redirect('admin/khuyenmai');
    }

    public function getDeleteKhuyenMai($id)
    {
    	KhuyenMai::destroy($id);
    	return back();
    }
}
