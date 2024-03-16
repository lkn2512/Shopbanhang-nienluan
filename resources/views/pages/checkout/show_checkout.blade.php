@extends('layout')
@section('content')
<?php

use Gloudemans\Shoppingcart\Facades\Cart;

$content = Cart::content();
?>
<div class="col-md-12 order-md-1">
    <p class="title-shipping"><i class="fa-solid fa-truck"></i> Thông tin giao hàng</p>
    <form class="needs-validation" action="{{URL::to('/save-checkout-customer')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="username">Họ và tên</label>
                <div class="input-group">
                    <input name="shipping_name" type="text" class="form-control" id="username" placeholder="Họ và tên" required />
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address">Số điện thoại</label>
                <input name="shipping_phone" type="number" min="1" class="form-control" id="address" placeholder="Số điện thoại" required />
            </div>
        </div>
        <div class="mb-3">
            <label for="address">Địa chỉ</label>
            <input name="shipping_address" type="text" class="form-control" id="address" placeholder="Địa chỉ giao hàng" required />
        </div>
        <div class=" mb-3">
            <label for="address">Ghi chú</label>
            <textarea style="resize:none" rows="4" type="text" name="shipping_message" class="form-control" id="exampleInputPassword1"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email <span class="text-muted">(Không bắt buộc)</span></label>
                <input name="shipping_email" type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>
            <div class="col-md-6 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="">
            </div>
        </div>
        <hr class="mb-4">
        <div class="d-block my-3 ">
            <div class="row">
                <h4 class="" style="padding-left: 15px;">Hình thức thanh toán</h4>
                <div class="col">
                    <div class="custom-control custom-radio">
                        <img class="img-payment" src="{{URL::to('/public/frontend/images/payment/m2.png')}}" alt="">
                        <input id="credit" name="payment_option" type="radio" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="credit">Nhận tiền mặt</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-radio">
                        <img class="img-payment" src="{{URL::to('/public/frontend/images/payment/ttd.png')}}" alt="">
                        <input id="debit" name="payment_option" type="radio" class="custom-control-input" value="2">
                        <label class="custom-control-label" for="debit">Thẻ tín dụng</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-radio">
                        <img class="img-payment" src="{{URL::to('/public/frontend/images/payment/pp.png')}}" alt="">
                        <input id="paypal" name="payment_option" type="radio" class="custom-control-input" value="3">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" role="alert">
            Lưu ý: Nếu chọn NHẬN TIỀN MẶT, vui lòng bỏ trống các trường dưới đây!
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Tên trên thẻ</label>
                <input type="text" class="form-control" id="cc-name" placeholder="">
                <small class="text-muted">Tên đầy đủ như hiển thị trên thẻ</small>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-number">Số thẻ tín dụng</label>
                <input type="text" class="form-control" id="cc-number" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-expiration">Hết hạn</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-cvv">Mã CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="">
            </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Địa chỉ giao hàng giống với địa chỉ thanh toán của tôi</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Lưu thông tin này cho lần sau</label>
        </div>
        <hr class="mb-4">
        <button data-action="add" type="submit" class="btn bg-primary text-white btn-lg btn-block">Thanh toán</button>
    </form>
</div>
@endsection