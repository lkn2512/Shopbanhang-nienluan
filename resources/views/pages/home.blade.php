@extends('layout')
@section('slider')
<div class="row">
    <div class="col-sm-12">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{{'public/frontend/images/home/b2.jpg'}}}" class="d-block w-100 banner" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{{'public/frontend/images/home/b1.jpg'}}}" class="d-block w-100 banner" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{{'public/frontend/images/home/b3.png'}}}" class="d-block w-100 banner" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>
@endsection

@section('content')
<!-- <div class="features_items"> -->
<h2 class="title text-center">Mới nhất</h2>
@foreach($all_product as $key =>$all_pro)
<div class="col-sm-4">
    <div class="product-image-wrapper photo">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded " style="width: 18em;">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$all_pro->product_image)}}" alt="" /></a>
                    <p>{{$all_pro->product_name}}</p>
                    <h2>{{number_format($all_pro->product_price)}}<span>₫</span></h2>
                    <?php
                    if ($all_pro->product_condition == "0") {
                    ?>
                        <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                    <?php
                    } else {
                    ?>
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{csrf_field()}}
                            <input name="quantity" type="hidden" min="1" value="1" />
                            <input name="product_id_hidden" type="hidden" min="1" value="{{$all_pro->product_id}}" />
                            <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                            <button type="submit" class="btn add-to-cart"><i class="fa-solid fa-cart-plus"></i>Đặt hàng</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="choose">
                <ul class="nav nav-pills ">
                    <li class="like"><a href="#"><i class="fa-solid fa-heart"></i>Yêu thích</a></li>
                    <li class="view"><a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"><i class="fa-solid fa-eye"></i>Chi tiết</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endforeach
@endsection

@section('content-popular')
<div class="container">
    <h2 class="title text-center">Về Chúng tôi</h2>
    <img style="margin-left: 385px;" src="{{URL::to('/public/frontend/images/home/gc.png')}}" alt="Image" class="img-fluid">
</div>
<div class="site-section bg-left-half mb-5">
    <div class="container owl-2-style">
        <div class="owl-carousel owl-2">
            <div class="media-29101">
                <a href="#"><img src="{{URL::to('/public/frontend/images/home/taste.png')}}" alt="Image" class="img-fluid"></a>
                <h3 class="text-center">KN-MILK Hương vị tuyệt hảo</h3>
                <p class="text-center">Niềm đam mê của chúng tôi là mang lại cho bạn một sản phẩm với hương vị hoàn hảo nhất</p>
            </div>
            <div class="media-29101">
                <a href="#"><img src="{{URL::to('/public/frontend/images/home/pro.jpg')}}" alt="Image" class="img-fluid"></a>
                <h3 class="text-center">An toàn là trên hết</h3>
                <p class="text-center">KN-MILK sử dụng những nguyên liệu không chỉ ngon, an toàn, mà còn tốt cho sức khoẻ cho bạn</p>
            </div>
            <div class="media-29101">
                <a href="#"><img src="{{URL::to('/public/frontend/images/home/dd.jpg')}}" alt="Image" class="img-fluid"></a>
                <h3 class="text-center">Sản phẩm đa dạng</h3>
                <p class="text-center">Chúng tôi cung cấp cho bạn nhiều loại sữa khác nhau, đa dạng, đủ thể loại cho bạn lựa chọn</p>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- </div> -->
<!--features_items-->

<!--category-tab-->
<!-- <div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{{'public/frontend/images/home/gallery1.jpg'}}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--/category-tab-->

<!--recommended_items-->
<!-- <div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{{'public/frontend/images/home/recommend1.jpg'}}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{{'public/frontend/images/home/recommend2.jpg'}}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{{'public/frontend/images/home/recommend3.jpg'}}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{{'public/frontend/images/home/recommend1.jpg'}}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>			
    </div>
</div> -->
<!--/recommended_items-->