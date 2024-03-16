@extends('layout')
@section('content')

<!--features_items-->
<!-- <div class="features_items"> -->
@foreach($category_name as $key =>$name)
<h2 class="title text-center">{{$name->category_name}}</h2>
@endforeach
@foreach($category_by_id as $key =>$product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 18em;">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" /></a>
                    <p>{{$product->product_name}}</p>
                    <h2>{{number_format($product->product_price).' đ'}}</h2>
                    <?php
                    if ($product->product_condition == "0") {
                    ?>
                        <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                    <?php
                    } else {
                    ?>
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{csrf_field()}}
                            <input name="quantity" type="hidden" min="1" value="1" />
                            <input name="product_id_hidden" type="hidden" min="1" value="{{$product->product_id}}" />
                            <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                            <button type="submit" class="btn btn-outline-danger add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt hàng
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
                    <li class="view"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa-solid fa-eye"></i>Chi tiết</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endforeach
@endsection