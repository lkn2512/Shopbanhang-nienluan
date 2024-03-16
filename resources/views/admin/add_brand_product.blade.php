@extends('admin_layout')
@section('admin_content')

<form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm thương hiệu</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-brand-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="{{URL::to('/add-brand-product')}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <?php

        use Illuminate\Support\Facades\Session;

        $message_success = Session::get('message_success');
        echo '<p class="text-success" >', $message_success, '</p>';
        Session::put('message_success', null);
        echo '<br>';

        ?>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Nhập vào thông tin cơ bản để thêm thương hiệu</p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input type="text" name="brand_product_name" required class="form-control" id="name_brand">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize:none" rows="4" name="brand_product_desc" class="form-control" id="desc_brand"></textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <ul class="list-group" name="brand_product_status">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="brand_product_status" value="1" id="firstRadio" checked>
                                <label class="form-check-label" for="secondRadio">Hiển thị</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="brand_product_status" value="0" id="secondRadio">
                                <label class="form-check-label" for="firstRadio">Ẩn</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
</form>
@endsection