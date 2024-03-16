@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-3">
        <div class="input-group">
            <button type="button" class="btn btn-dark" data-mdb-ripple-init>
                <i class="fas fa-search"></i>
            </button>
            <div class="form-outline" data-mdb-input-init>
                <input type="search" id="form1" class="form-control" placeholder="search" />
            </div>
        </div>
    </div>
    <div class="col-md-3 offset-2">
        <h3 class="title-content">Danh sách sản phẩm</h3>
    </div>
    <div class="col-md-4">
        <a href="{{URL::to('/add-product')}}"><button type="button" class="btn btn-success add-products" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</button></a>
        <a href="{{URL::to('/all-product')}}"> <button type="button" class="btn btn-secondary refesh-page" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
    </div>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="table-responsive">
            <?php

            use Illuminate\Support\Facades\Session;

            $message_success = Session::get('message_success');
            $message_fail = Session::get('message_fail');
            if ($message_success) {
                echo '<p class="text-success" >', $message_success, '</p>';
                Session::put('message_success', null);
                echo '<br>';
            } else {
                echo '<p class="text-danger" >', $message_fail, '</p>';
                Session::put('message_fail', null);
                echo '<br>';
            }
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Tình trạng</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key =>$pro)
                    <tr>
                        <td><img src="public/uploads/product/{{$pro->product_image}}" style="height: 80px; width: auto;"></td>
                        <td>{{$pro->product_code}}</td>
                        <td>{{$pro->product_name}}</td>
                        <td>{{number_format($pro->product_price)}}đ</td>
                        <td>{{$pro->category_name}}</td>
                        <td>{{$pro->brand_name}}</td>
                        <td>
                            @if($pro->product_condition =="1")
                            Còn hàng
                            @else
                            Hết hàng
                            @endif
                        </td>
                        <td><span class="text-ellipsis">
                                <?php
                                if ($pro->product_status == 0) {
                                ?>
                                    <a class="link-danger styling-eye" href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><i class="fa-solid fa-eye-slash"></i> Ẩn</a>
                                <?php
                                } else {
                                ?>
                                    <a class="link-primary styling-eye" href="{{URL::to('/active-product/'.$pro->product_id)}}"><i class="fa-solid fa-eye"></i> Hiển thị</a>
                                <?php
                                }
                                ?>
                            </span>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="btn-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xoá sản phẩm này?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class=" btn-remove" ui-toggle-class=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-3 offset-sm-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
    </div>
</div>


@endsection