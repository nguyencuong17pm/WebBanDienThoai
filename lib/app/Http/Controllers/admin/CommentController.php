<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;

class CommentController extends Controller
{
    public function getCom()
    {
    	$data['comment'] = Comment::leftjoin('db_product', 'db_product.prod_id', 'db_comment.com_prod')->get();
    	return view('admin.comment', $data);
    }
}
