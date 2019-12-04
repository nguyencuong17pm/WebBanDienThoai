@extends('frontend.master')
@section('title', 'Tiềm Kiếm Sản Phẩm')
@section('main')
<link rel="stylesheet" href="css/search.css">
<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$nameSearch}}</span></h3>
		<div class="product-list row">
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
</div>
@stop