@extends('admin_layout')
@section('admin_content')
@foreach($edit_category_product as $key =>$edit_value)
<form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa danh mục</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-category-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-check"></i> Lưu</button></a>
                <a href="{{URL::to('/edit-category-product/'.$edit_value->category_id)}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="row">
            <div class="col-md-4 title-left">
                <h4>Chi tiết thay đổi</h4>
                <p>Chỉnh sửa các thông tin cần thay đổi</p>
            </div>
            <div class="col-md-6 contend-right">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" required class="form-control" id="exampleInputEmail1">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <textarea style="resize:none" rows="4" type="password" name="category_product_desc" class="form-control" id="exampleInputPassword1">{{$edit_value->category_desc}}</textarea>
                </div><br>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection