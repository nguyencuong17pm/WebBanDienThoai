@extends('frontend.master')
@section('title', 'Chi Tiết Sản Phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3><b>{{$item->prod_name}}</b></h3>
		<div class="row">
			<div id="product-img" class="col-sm text-center">
				<img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}">
			</div>
			<div id="product-details" class="col-sm">
				<p>Giá: <span class="price">{{number_format($item->prod_gia,0,',','.')}} đ</span></p>
				@if($item->prod_giakhuyenmai > 0) <p style="text-decoration: line-through">Giá gốc: <span class="price">{{number_format($item->prod_giakhuyenmai)}} đ</span></p> @endif
				<p>Bảo hành: {{$item->prod_baohanh}}</p> 
				<p>Phụ kiện: {{$item->prod_phukien}}</p>
				<p>Tình trạng: {{$item->prod_tinhtrang}}</p>
				<p>Khuyến mại: {{$item->prod_quatang}}</p>
				<p>Trạng thái: @if($item->prod_trangthai == 1) Còn hàng @else Hết hàng @endif</p>
				<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->prod_id)}}">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3 style="margin-top: 20px"><b>Chi tiết sản phẩm</b></h3>
		<p class="text-justify">{!!$item->prod_mieuta!!}</p>
	</div>
	<div id="comment">
		<h3><b>Bình luận</b></h3>
		<div class="col-md-9 comment">
			<form method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($comments as $com)
		<ul>
			<li class="com-title">
				{{$com->com_name}}
				<br>
				<span>{{$com->created_at}}</span>	
			</li>
			<li class="com-details">
				{{$com->com_content}}
			</li>
		</ul>
		@endforeach
	</div>
</div>					
@stop