@extends('admin_layout')
@section('admin_content')
@foreach($edit_product as $key=>$pro)
<form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa sản phẩm</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-check"></i> Lưu</button></a>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col title-left">
                    <h4>Chi tiết thay đổi</h4>
                    <p>Chỉnh sửa các thông tin cần thay đổi</p>
                </div>
                <div class="col contend-right">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="product_name" required class="form-control" value="{{$pro->product_name}}">
                    </div><br>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="product_image" class="form-control">
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" style="height: 100px; width: 150px;">
                    </div><br>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea style="resize:none" rows="4" name="product_content" class="form-control">{{$pro->product_content}}</textarea>
                    </div><br>
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <select class="form-select" name="product_condition">
                            @if($pro->product_condition=="1")
                            <option value="1" selected>Còn hàng</option>
                            <option value="0">Hết hàng</option>
                            @else
                            <option value="0" selected>Hết hàng</option>
                            <option value="1">Còn Hàng</option>
                            @endif
                        </select>
                    </div><br>
                </div>
                <div class="col contend-right">
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input type="text" name="product_code" required class="form-control" value="{{$pro->product_code}}">
                    </div><br>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="product_price" required class="form-control" value="{{$pro->product_price}}">
                    </div><br>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize:none" rows="4" name="product_desc" class="form-control">{{$pro->product_desc}}</textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_cate">
                                @foreach($cate_product as $key =>$cate)
                                @if($cate->category_id==$pro->category_id)
                                <option value="{{$cate->category_id}}" selected>{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="product_brand">
                                @foreach($brand_product as $key =>$brand)
                                @if($brand->brand_id==$pro->brand_id)
                                <option value="{{$brand->brand_id}}" selected>{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach





<!-- <div class="table-agile-info">
    @foreach($edit_product as $key=>$pro)
    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>Mã sản phẩm</label>
            <input type="text" name="product_code" required class="form-control" value="{{$pro->product_code}}">
        </div><br>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="product_name" required class="form-control" value="{{$pro->product_name}}">
        </div><br>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="product_image" class="form-control">
            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" style="height: 100px; width: 150px;">
        </div><br>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="product_price" required class="form-control" value="{{$pro->product_price}}">
        </div><br>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea style="resize:none" rows="5" name="product_content" class="form-control">{{$pro->product_content}}</textarea>
        </div><br>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea style="resize:none" rows="3" name="product_desc" class="form-control">{{$pro->product_desc}}</textarea>
        </div><br>
        <div class="form-group">
            <label for="exampleInputPassword1">Loại bài</label>
            <div class="input-group mb-3">
                <select class="form-select" name="product_cate">
                    @foreach($cate_product as $key =>$cate)
                    @if($cate->category_id==$pro->category_id)
                    <option value="{{$cate->category_id}}" selected>{{$cate->category_name}}</option>
                    @else
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div><br>
        <div class="form-group">
            <label for="exampleInputPassword1">Hệ</label>
            <div class="input-group mb-3">
                <select class="form-select" name="product_brand">
                    @foreach($brand_product as $key =>$brand)
                    @if($brand->brand_id==$pro->brand_id)
                    <option value="{{$brand->brand_id}}" selected>{{$brand->brand_name}}</option>
                    @else
                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                    @endif
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
        <button type="submit" name="add_product" class="btn btn-primary">Cập nhật</button>
        <a href="{{URL::to('/all-product')}}" style="float: right;"><button type="button" class="btn btn-warning" data-mdb-ripple-init><i class="fa-solid fa-list"></i> Xem tất cả sản phẩm</button></a>
    </form>
    @endforeach
</div> -->
@endsection