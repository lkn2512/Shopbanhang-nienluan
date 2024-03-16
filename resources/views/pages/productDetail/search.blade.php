@extends('layout')
@section('content')
<!-- <div class="features_items"> -->
<h3 class="text-center" style="padding-bottom: 10px;">Kết quả tìm kiếm cho: {{$keywords}} </h3>
@foreach($search_product as $key =>$searh_pro)
<div class="col-sm-4">
    <div class="product-image-wrapper photo">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 18em;">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$searh_pro->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$searh_pro->product_image)}}" alt="" /></a>
                    <p>{{$searh_pro->product_name}}</p>
                    <h2>{{number_format($searh_pro->product_price)}}<span>₫</span></h2>
                    <?php
                    if ($searh_pro->product_condition == "0") {
                    ?>
                        <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$searh_pro->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                    <?php
                    } else {
                    ?>
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{csrf_field()}}
                            <input name="quantity" type="hidden" min="1" value="1" />
                            <input name="product_id_hidden" type="hidden" min="1" value="{{$searh_pro->product_id}}" />
                            <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$searh_pro->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                            <button type="submit" class="btn add-to-cart"><i class="fa-solid fa-cart-plus"></i>Đặt hàng</button>
                        </form>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection