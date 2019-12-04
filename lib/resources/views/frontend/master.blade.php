<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Bảo Khiêm Shop - @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img src="img/home/bks.png" width="100%"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<form class="navbar-form" role="search" action="{{asset('search/')}}" method="get">
				<div id="search" class="col-md-7 col-sm-12 col-xs-12" act>
					<div class="input-group" style="width: 500px; margin-right: 135px">
						<input type="text" name="result" placeholder="Nhập từ khóa ...">
						<input type="submit" name="submit" value="Tìm Kiếm">
					</div>
				</div>
				</form>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::getTotalQuantity()}}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item" style="background: #FF9900; color: white"><b>danh mục sản phẩm</b></li>
							@foreach($category as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
							@endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						@foreach($quangcao as $item)
						<div class="banner-l-item">
							<a href="{{asset($item->km_link)}}"><img src="{{asset('lib/storage/app/avatar/'.$item->km_img)}}" alt="" class="img-thumbnail"></a>
						</div>
						@endforeach
					</div>
					<div id="map" style="margin-top: 20px;">
						<h4 style="color: #FF9600">Trụ sở công ty</h4>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15696.890899591504!2d105.4180488!3d10.4038773!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6add7e7e258b0ee0!2zQuG6o28gS2hpw6ptIFNvbHV0aW9u!5e0!3m2!1svi!2s!4v1553322612237" width="255" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div id="page" style="margin-top: 20px;">
						<h4 style="color: #FF9600">Facebook</h4>
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBaoKhiemSolutions%2F&tabs=timeline&width=255&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="255" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<a href="{{asset('detail/15/samsung-galaxy-a50.html')}}"><img src="img/home/banner1.jpg"></a>
								</div>
								<div class="carousel-item">
									<a href="{{asset('detail/16/vivo-15.html')}}"><img src="img/home/banner2.jpg" alt="Chicago"></a>
								</div>
								<div class="carousel-item">
									<a href="{{asset('detail/57/dien-thoai-oppo-f9.html')}}"><img src="img/home/banner3.jpg" alt="Chicago"></a>
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
					
					@yield('main')

					


					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="{{asset('/')}}"><img src="img/home/bks.png" width="100%"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Bảo Khiêm Shop là chi nhánh của cty công nghệ Bảo Khiêm Solution, được thành lập từ năm 2017. Với tránh nghiệm và tính chuyên nghiệp cao chúng tôi cam kế đem lại cho quý khách hàng những sản phẩm chất lượng.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0336.687.965</p>
						<p>Email: www.baokhiemshop.com@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: B8A Ung Văn Khiêm - P.Đông Xuyên - TP.Long Xuyên - An Giang</p>
						<p>Address 2: Số 25A Lý Thường Kiệt - Bình Khánh - TP.Long Xuyên - An Giang</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Công Ty Công nghệ Bảo Khiêm Solution - www.baokhiemsolution.com</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2019 Baokhiemshop Academy. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href=""><img src="img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>