<!DOCTYPE html>

<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/monthly.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>
    <style>
        .menu {
            height: 100%;
            /* background-image: url(public/backend/images/bg-login.jpg); */
            background-color: white;
            background-size: cover;
            opacity: 0.9;
        }
    </style>

</head>

<body>
    <div class="menu">
        <section id="container">
            <!--header start-->
            <header class="header fixed-top clearfix ">
                <div class="brand">
                    <img src="{{URL::to('/public/backend/images/admin.png')}}" alt="">
                    <a href="{{URL::to('/dashboard')}}" class="logo">
                        Quản trị viên
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </div>
                <div class="top-nav clearfix">
                    <div class="icon-header">
                        <a href=""><i class="fa-regular fa-envelope icon1"></i></a>
                        <a href=""><i class="fa-regular fa-bell icon1"></i></a>
                        <a href=""><i class="fa-regular fa-newspaper icon1"></i></a>
                    </div>
                    <ul class="nav pull-right top-menu">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <li class="dropdown">
                            <button class="btn btn-light dropdown-toggle user-admin" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user"></i>
                                <span class="username">
                                    <?php

                                    use Illuminate\Support\Facades\Session;

                                    $name = Session::get('admin_name');
                                    if ($name) {
                                        echo  $name;
                                    }
                                    ?>
                                </span>
                            </button>
                            <ul class="dropdown-menu extended logout">
                                <li><a class="dropdown-item" href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                                <li><a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>

            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a class="" href="{{URL::to('dashboard')}}">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Tổng quan</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/all-category-product')}}">
                                    <i class="fa-solid fa-layer-group"></i>
                                    <span>Quản lý danh mục</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/all-brand-product')}}">
                                    <i class="fa-solid fa-copyright"></i>
                                    <span>Quản lý thương hiệu</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <!-- <a href="javascript:;"> -->
                                <a href="{{URL::to('/all-product')}}">
                                    <i class="fa-brands fa-product-hunt"></i>
                                    <span>Quản lý sản phẩm</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/manage-order')}}">
                                <i class="fa-solid fa-cart-flatbed"></i>
                                    <span>Đơn đặt hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!--sidebar end-->
            <section id="main-content">
                <section class="wrapper">
                    @yield('admin_content')
                </section>
                <div class="footer">
                    <div class="wthree-copyright">
                        <p>© 2024 Lê Kim Ngọc - CK22V7K516 <a></a></p>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
    <script type="{{asset('public/backend/text/javascript')}}" src="js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load(function() {

            $('#mycalendar').monthly({
                mode: 'event',

            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    // running on a server, should be good.
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }

        });
    </script>
    <!-- //calendar -->
</body>

</html>