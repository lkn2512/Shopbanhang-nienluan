<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home | E-Shopper</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/frontend/carousel-12/fonts/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/carousel-12/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/carousel-12/css/style.css')}}">
	<style>
		html {
			height: 100%;
		}

		body {
			height: 100%;
			margin: 0;
		}

		.menu {
			font-family: 'Roboto', sans-serif;
			height: 23%;
			background-image: url("{{URL::to('public/frontend/images/home/bgBlue.jpg')}}");
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="menu">
		<header id="header">
			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="mainmenu">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="{{URL::to('/')}}" class="active"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
									<li class="dropdown"><a href="#" class="active">Sản phẩm<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="{{URL::to('/')}}">Mới nhất</a></li>
											<li><a href="{{URL::to('/all-productss')}}">Tất cả</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#" class="active">Blog<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="#">Blog List</a></li>
											<li><a href="#">Blog Single</a></li>
										</ul>
									</li>
									<li><a href="#" class="active"><i class="fa-solid fa-info"></i> Giới thiệu</a></li>
									<li><a href="contact-us" class="active"><i class="fa-solid fa-file-signature"></i> Liên hệ</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mainmenu" style="float: right;">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="#" class="active"><i class="fa-solid fa-bell "></i> Thông báo</a></li>
									<li><a href="#" class="active"><i class="fa-solid fa-circle-question"></i> Hỗ trợ</a></li>
									<?php

									use Illuminate\Support\Facades\Session;

									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									// echo $customer_id;
									// echo $shipping_id;
									if ($customer_id != NULL) {
									?>
										<li class="dropdown"><a href="#" class="active">
												<?php
												$name = Session::get('customer_name');
												if ($name) {
													echo  $name;
												}
												?>
												<i class="fa fa-angle-down"></i></a>
											<ul role="menu" class="sub-menu">
												<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
												<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
												<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
												<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
											</ul>
										</li>
									<?php
									} else {
									?>
										<li><a href="{{URL::to('/register-checkout')}}"> Đăng ký</a></li>
										<li><a href="{{URL::to('/login-checkout')}}"> Đăng nhập</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container">
					<div class="row">
						<div class="col-sm-1 offset-sm-2">
							<a href="{{URL::to('/')}}"><img src="{{URL::to('public/frontend/images/home/logoKN.png')}}" alt="" style="width: auto; height:100px; margin-top: -18px; margin-left: -20px;" /></a>
						</div>
						<div class="col-sm-8">
							<div class="pull-right search_box">
								<form action="{{URL::to('/search-items')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="keywords_submit" placeholder="Tìm kiếm" />
									<button type="submit" class="btn-search-info"><i class="fa-solid fa-magnifying-glass"></i></button>
									&ensp;<a href="{{URL::to('/show-cart')}}"><img src="{{URL::to('public/frontend/images/cart/cart.png')}}" class="cart-icon"></img></a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div><br><br>
	<section id="slider">
		<div class="container">
			@yield('slider')
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products scroll-category" id="accordian">
							@foreach($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div>
						<h2>Thương hiệu</h2>
						<div class="panel-group category-products scroll-brand " id="accordian">
							@foreach($brand as $key =>$brand)
							<div class="panel panel-default ">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="shipping text-center">
						<img src="{{URL::to('public/frontend/images/home/ts.jpg')}}" alt="" />
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="row">
						@yield('content')
					</div>
					<div class="row">
						@yield('content-related')
					</div>
				</div>
			</div>
			<div class="row">
				@yield('content-popular')
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<a href="{{URL::to('/')}}"><img src="{{URL::to('public/frontend/images/home/logoKN_blue.png')}}" alt="" style="width: auto; height:100px; margin-top: -px; margin-left: -20px;" /></a>
						</div>
					</div>
					<div class="col-sm-7">
						<section class="mb-4 text-center" style="padding-top: 30px;">
							<!-- Facebook -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

							<!-- Twitter -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

							<!-- Google -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

							<!-- Instagram -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

							<!-- Linkedin -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

							<!-- Github -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
						</section>

						<section class="">
							<form action="">
								<div class="row d-flex justify-content-center">
									<strong class="text-center" style="padding-bottom: 20px;">Đăng ký để xem tin tức mới nhất của chúng tôi</strong>
									<div class="col-md-5 col-12">
										<div data-mdb-input-init class="form-outline mb-4">
											<input type="email" id="form5Example24" class="form-control" placeholder="Email" />
										</div>
									</div>
									<div class="col-auto">
										<button data-mdb-ripple-init type="submit" class="btn btn-success mb-4">
											Đăng ký
										</button>
									</div>
								</div>
							</form>
						</section>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{URL::to('public/frontend/images/home/map2.webp')}}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href=""><i class="fas fa-home me-3"></i>Cần thơ, 2024</li></a>
								<li><a href=""><i class="fas fa-phone me-3"></i>+ 01 234 567 88</li></a>
								<li><a href=""><i class="fas fa-print me-3"></i>+ 01 234 567 89</li></a>
								<li><a href=""><i class="fas fa-envelope me-3"></i>kn@gmail.com</li></a>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giúp đỡ trực tuyến</a></li>
								<li><a href="#">Thay đổi địa điểm</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
								<li><a href="#">Chính sách giao hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hữu ích</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Đơn đặt hàng</a></li>
								<li><a href="#">Định giá</a></li><br>
								<li><a href="#">Tuyển dụng</a></li>
								<li><a href="#">Tin tức</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h6 class="text-uppercase fw-bold mb-4">
								<i class="fas fa-gem me-3"></i>KN-MILK
							</h6>
							<p>
								Here you can use rows and columns to organize your footer content. Lorem ipsum
								dolor sit amet, consectetur adipisicing elit.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row text-center">
					<p class="pull-left">Copyright © 2024 - Lê Kim Ngọc - CK22V7K516.</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>

	<!-- Carousel-12 -->
	<script src="{{asset('public/frontend/carousel-12/js/popper.min.js')}}"></script>
	<script src="{{asset('public/frontend/carousel-12/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/frontend/carousel-12/js/main.js')}}"></script>
	<!-- Carousel-12 -->
</body>

</html>