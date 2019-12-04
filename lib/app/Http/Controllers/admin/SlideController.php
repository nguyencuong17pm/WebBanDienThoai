<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProdRequest;
use App\Models\Slide;

class SlideController extends Controller
{
    public function getSlide()
    {
    	$data['slide'] = Slide::all();
    	return view('admin.slide', $data);
    }

    public function getSlideAdd()
    {
    	return view('admin.addslide');
    }

    public function postSlideAdd(AddProdRequest $request)
    {
    	$filename = $request->img->getClientOriginalName();
    	$slide = new Slide;
    	$slide->s_name = $request->name;
    	$slide->s_img = $filename;
    	$slide->s_slug = str_slug($request->name);
    	$slide->s_link = $request->lienket;
    	$slide->s_trangthai = $request->status;
    	$slide->save();
    	$request->img->storeAs('avatar', $filename);	
    	return back();
    }
}
