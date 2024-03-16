@extends('layout')
@section('slider')
<div class="row">
    <div class="col-sm-12">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{{'public/frontend/images/home/b1.jpg'}}}" class="d-block w-100 banner" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{{'public/frontend/images/home/b2.jpg'}}}" class="d-block w-100 banner" alt="...">
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
<h2 class="title text-center">Tất cả sản phẩm</h2>
@foreach($all_product_home as $key =>$all_pro_h)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 18em;">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$all_pro_h->product_image)}}" alt="" /></a>
                    <p>{{$all_pro_h->product_name}}</p>
                    <h2>{{number_format($all_pro_h->product_price)}}<span>₫</span></h2>
                    <?php
                    if ($all_pro_h->product_condition == "0") {
                    ?>
                        <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                    <?php
                    } else {
                    ?>
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{csrf_field()}}
                            <input name="quantity" type="hidden" min="1" value="1" />
                            <input name="product_id_hidden" type="hidden" min="1" value="{{$all_pro_h->product_id}}" />
                            <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                            <button type="submit" class="btn btn-outline-danger add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Đặt hàng
                            </button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="choose">
                <ul class="nav nav-pills ">
                    <li class="like"><a href="#"><i class="fa-solid fa-heart"></i>Yêu thích</a></li>
                    <li class="view"><a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}"><i class="fa-solid fa-eye"></i>Chi tiết</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endforeach
@endsection