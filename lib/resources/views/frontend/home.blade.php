@extends('frontend.master')
@section('title', 'Trang Chủ')
@section('main')
<div id="wrap-inner">

	<div class="products">
		<h3>sản phẩm khuyến mãi <img src="img/home/giamgia.jpg" width="10%"></h3>
		<div class="product-list row">
			@foreach($khuyenmai as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
				<p style="height: 15%"><a href="#">{{$item->prod_name}}</a></p>
				
				@if($item->prod_giakhuyenmai > 0) <p class="price" style="text-decoration: line-through">{{number_format($item->prod_giakhuyenmai)}} đ</p> @endif
				<p class="price">{{number_format($item->prod_gia)}} đ</p>	  
				<div class="marsk">
					<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="products">
		<h3>sản phẩm nổi bật <img src="img/home/noibat.gif" width="10%"></h3>
		<div class="product-list row">
			@foreach($spdatbiet as $item)
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

	<div class="products">
		<h3>sản phẩm mới <img src="img/home/new.gif" width="10%"></h3>
		<div class="product-list row">
			@foreach($news as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
				<p style="height: 15%"><a href="#">{{$item->prod_name}}</a></p>
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