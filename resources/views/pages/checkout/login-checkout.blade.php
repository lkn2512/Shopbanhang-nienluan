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
    <section id="form"><!--form-->
        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-5">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>

                                <form class="mx-1 mx-md-4" method="POST" action="{{URL::to('/login-customer')}}">
                                    {{csrf_field()}}
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="email_account" id="form3Example1c" class="form-control" placeholder="Tên tài khoản" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="pass_account" id="form3Example4c" class="form-control" placeholder="Mật khẩu" />
                                        </div>
                                    </div>
                                    <?php

                                    use Illuminate\Support\Facades\Session;

                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<p class="text-danger">', $message, '</p>';
                                        Session::put('message', null);
                                    }
                                    ?>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" class="btn btn-primary btn-lg" name="createUser" value="Đăng Nhập" />
                                    </div>
                                    <p class="text-center h6 mb-5 mx-1 mx-md-4 mt-4">Bạn chưa có tài khoản?<a href="{{URL::to('/register-checkout')}}"> Đăng ký</a></p>
                                </form>

                                <p class="text-center h6 mb-5 mx-1 mx-md-4 "><a href="{{URL::to('/')}}"> Trang chủ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->
</body>

</html>