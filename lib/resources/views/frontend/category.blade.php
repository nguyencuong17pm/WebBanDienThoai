@extends('frontend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner" class="col-md-9">
	<div class="products">
		<h3>{{$cateName->cate_name}}</h3>
		<div class="product-list row" style="width: 810px">
			@foreach($items as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
				<p style="height: 20%"><a href="#">{{$item->prod_name}}</a></p>
				<p class="price">{{number_format($item->prod_gia,0,',','.')}} đ</p>	  
				<div class="marsk">
					<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>                                  
			</div>
			@endforeach
		</div>                	                	
	</div>
	<div class="row text-center">
		<div class="col-md-12" style="margin-top: 30px">
			{{$items->links()}}
		</div>
	</div>
</div>
@stop