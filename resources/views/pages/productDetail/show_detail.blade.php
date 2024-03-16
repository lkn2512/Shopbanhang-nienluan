@extends('layout')
@section('content')

@foreach($detail_product as $key =>$value)
<div class="product-details">
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p><b>Mã sản phẩm:</b> {{$value->product_code}}</p>

            @if($value->product_condition == "0")
            <p><b>Tình trạng:</b> Hết hàng</p>
            @else
            <p><b>Điều kiện:</b> Mới</p>
            <p><b>Tình trạng:</b> Còn hàng</p>
            @endif

            <p><b>Loại sản phẩm:</b> {{$value->category_name}}</p>
            <p><b>Thương hiệu: </b><a style="text-transform: capitalize;">{{$value->brand_name}}</a></p>
            <span><span>{{number_format($value->product_price).'₫'}}</span></span>

            @if($value->product_condition == "0")
            <br><br>
            <img class="img-condition" src="{{URL::to('public/frontend/images/product-details/sold_out.png')}}" alt="">
            @else
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{csrf_field()}}
                <span>
                    <label>Số lượng:</label>
                    <input name="quantity" type="number" min="1" value="1" />
                    <input name="product_id_hidden" type="hidden" min="1" value="{{$value->product_id}}" />
                    <button type="submit" class="btn add-to-cart">
                        <i class="fa-solid fa-cart-plus"></i>Đặt hàng
                    </button>
                </span>
            </form>
            @endif

            <!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a> -->
        </div>
    </div>

    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li>
                    <a class="btn" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Mô tả thêm</a>
                </li>
                <li>
                    <a class="btn" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Đánh giá</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" style="margin: 15px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="desc-product">
                            <?php
                            $contentt = $value->product_content;
                            if ($contentt == NULL) {
                            ?>
                                <p>Không có gì</p>
                            <?php
                            } else {
                            ?>
                                <p>{!!$value->product_content!!}</p>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            <b>Cảm nhận của bạn về sản phẩm</b></p>
                            <form action="#">
                                <div class="row" style="padding: 8px;">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example18" class="form-control form-control-lg" placeholder="Họ và tên" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example18" class="form-control form-control-lg" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Nội dung" id="floatingTextarea2" style="height: 100px"></textarea>
                                </div><br>
                                <button type="button" class="btn btn-default pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('content-related')
<h2 class="title text-center">Sản phẩm liên quan</h2>
@foreach($related as $key =>$relate)
<div class="col-sm-3">
    <div class="product-image-wrapper" style="padding-bottom: 30px; padding-left:20px;">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="{{URL::to('/chi-tiet-san-pham/'.$relate->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$relate->product_image)}}" alt="" style="padding-top: 10px;" /></a>
                <p>{{$relate->product_name}}</p>
                <h2>{{number_format($relate->product_price)}}<span>₫</span></h2>
                <?php
                if ($relate->product_condition == "0") {
                ?>
                    <a class="btn view-details-product" href="{{URL::to('/chi-tiet-san-pham/'.$relate->product_id)}}"><i class="fa-solid fa-eye"></i> Xem</a>
                <?php
                } else {
                ?>
                    <form action="{{URL::to('/save-cart')}}" method="POST">
                        {{csrf_field()}}
                        <input name="quantity" type="hidden" min="1" value="1" />
                        <input name="product_id_hidden" type="hidden" min="1" value="{{$relate->product_id}}" />
                        <button type="submit" class="btn add-to-cart">
                            <i class="fa-solid fa-cart-plus"></i>Đặt hàng
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection