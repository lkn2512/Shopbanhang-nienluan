<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="card" style="border-radius: 15px;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-5 col-lg-5 col-xl-5">
                            <img src="{{URL::to('/public/frontend/images/reg.webp')}}" class="img-fluid" alt="Sample image">
                        </div>
                        <div class="col-md-6 col-lg-7 col-xl-6">
                            <div class="card-body p-5">
                                <h2 class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 ">Tạo tài khoản</h2>
                                <form action="{{URL::to('/add-customer')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example3cg" class="form-control form-control-lg" placeholder="Họ và tên" name="customer_name" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email" name="customer_email"required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="number" id="form3Example1cg" class="form-control form-control-lg" placeholder="Số điện thoại" name="customer_phone" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Mật khẩu" name="customer_pass" required />
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" />
                                        </div>
                                    </div> -->
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            Tôi đồng ý với <a href="#!" class="text-body"><u>điều khoản dịch vụ</u></a>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg text-white">Đăng ký</button>
                                    </div>
                                    <p class="text-center h6 mb-5 mx-1 mx-md-4 mt-4">Bạn đã có tài khoản?<a href="{{URL::to('/login-checkout')}}"> Đăng nhập</a></p>
                                </form>
                                <div class="text-center h6 "><a href="{{URL::to('/')}}"> Trang chủ</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>