@extends('admin_layout')
@section('admin_content')
<div class="header-top">
    <div class="row">
        <div class="col-md-3">
            <h3 class="title-content"><i class="fa-solid fa-circle-info"></i> Chi tiết đơn hàng</h3>
        </div>
        <div class="col-md-9 btn-header">
            <a href="{{URL::to('/manage-order')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
            <a href=""> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
        </div>
    </div>
</div><br>
<section class="h-100 gradient-custom">
    <div class="container py-2 h-100">
        <div class="col-lg-12 col-xl-12">
            <div class="card" style="border-radius: 10px; ">
                <div class="card-header px-4 py-3" style="background-color: #008080;">
                    <h5 class="text-light mb-0">Chi tiết đơn hàng của,
                        @foreach($order_shipping as $order_detail2)
                        <span style="color: #FFA500;">{{$order_detail2->shipping_name}}</span>!
                        @endforeach
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0" style="color: #008080; font-size: 20px;">Các sản phẩm đã đặt:</p>
                        @foreach($customer_detail as $de_or_email)
                        <p class="small text-dark mb-0">Tài khoản đăng nhập: {{$de_or_email->customer_email}}</p>
                        @endforeach
                    </div>
                    @foreach($order_detail as $de_or)
                    <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col align-items-center d-flex  align-items-center">
                                    <img src="{{URL::to('public/uploads/product/'.$de_or->product_image)}}" class="img-fluid" alt="">
                                </div>
                                <div class="col align-items-center d-flex  align-items-center">
                                    <p class="text-dark mb-0">{{$de_or->product_name}}</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small">Số lượng: {{$de_or->product_sales_quantity}}</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small">Giá: {{number_format($de_or->product_price)}}đ</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small">Tổng: {{number_format($de_or->product_price*$de_or->product_sales_quantity)}}đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                    <div class="row">
                        @foreach($order_shipping as $de_sh)
                        <div class="col">
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Tên khách hàng:</span>{{$de_sh->shipping_name}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Số điện thoại:</span>{{$de_sh->shipping_phone}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Email:</span>{{$de_sh->shipping_email}}</p>
                            <p class="text-dark mb-2 text-break"><span class="fw-bold me-2">Ghi chú:</span>{{$de_sh->shipping_notes}}</p>
                            <p class="text-dark mb-2 text-break"><span class="fw-bold me-2">Địa chỉ giao hàng:</span>{{$de_sh->shipping_address}}</p>
                        </div>
                        @endforeach
                        @foreach($customer_detail as $de_order)
                        <div class="col float-right">
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Giảm giá:</span>0đ</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Thuế:</span>0đ</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Chi phí vận chuyển:</span>Miễn phí</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Phát sinh thêm:</span>Không có</p>
                            <p class="text-danger mb-2"><span class="fw-bold me-2">Thành tiền:</span>{{number_format($de_order->order_total)}}đ</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-stepper text-black" style="border-radius: 16px;">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div>
                                <h5 class="mb-0">Mã hoá đơn
                                    @foreach($customer_detail as $or_mhd)
                                    <span class="text-primary font-weight-bold">
                                        #{{$or_mhd->order_id}}
                                    </span>
                                </h5>
                                @endforeach
                            </div>
                            <div class="text-end">
                                <p class="mb-0">Dự kiến: <span>01/12/24</span></p>
                                <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                            </div>
                        </div>

                        <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                            <li class="step0 active text-center" id="step1"></li>
                            <li class="step0 active text-center" id="step2"></li>
                            <li class="step0 active text-center" id="step3"></li>
                            <li class="step0 text-muted text-end" id="step4"></li>
                        </ul>

                        <div class="d-flex justify-content-between">
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã xử lý</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã vận chuyển</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đang giao hàng</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã giao hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection