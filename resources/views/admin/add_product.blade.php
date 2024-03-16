@extends('admin_layout')
@section('admin_content')
<form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm sản phẩm</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="{{URL::to('/add-product')}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Nhập vào thông tin cơ bản để thêm sản phẩm</p>
                </div>
                <div class="col contend-right">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="product_name" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="product_image" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea style="resize:none" rows="4" name="product_content" class="form-control"></textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại sản phẩm</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_cate" id="inputGroupSelect02">
                                @foreach($cate_product as $key =>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <select class="form-select" name="product_condition">
                            <option value="1" selected>Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </div><br>
                </div>
                <div class="col contend-right">
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input type="text" name="product_code" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" name="product_price" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize:none" rows="4" name="product_desc" class="form-control"></textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_brand" id="inputGroupSelect02">
                                @foreach($brand_product as $key =>$brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <ul class="list-group" name="product_status">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="product_status" value="1" id="firstRadio" checked>
                                <label class="form-check-label" for="secondRadio">Hiển thị</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="product_status" value="0" id="secondRadio">
                                <label class="form-check-label" for="firstRadio">Ẩn</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection