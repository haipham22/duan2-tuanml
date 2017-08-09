<!DOCTYPE html>
<html>
<head>
    <title>Liên minh 247</title>
    <link rel="icon" href="{{ asset('img/lienminh247.png') }}"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <!-- end bootstrap -->
    <!-- my css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- end my css -->
</head>
<body>
<header class="container">
    <h1 class="logo left">
        <a href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="100%" class="col-md-3">
        </a>
    </h1>
</header>
<section class="wapper container">
    <div class="top-nav" >
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" id="navbar-brand" href="{{ route('index') }}"  style="color: #fff">Trang chủ</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="" style="color: #fff">Tin game</a>
                    </li>
                    <li>
                        <a href="tinesport.php" style="color: #fff">Tin esports</a>
                    </li>
                    <li>
                        <a href="video.php" style="color: #fff">Video</a>
                    </li>
                    <li>
                        <a href="hinhanh.php" style="color: #fff">Hình ảnh</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="boxtimkiem">
                        <a>
                            <img src="images/i-fb.jpg">
                            <img src="images/i-youtube.jpg">
                            <input type="text" class="timkiem">
                            <button type="button" class="nuttim" placeholder="aa">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right" style="padding: 10px;">
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-log-in"></span> Đăng kí
                        </button></a>
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-user"></span> Đăng nhập
                        </button></a>
                </ul>
            </div>
        </nav>
    </div>
</section>
<footer>
    <div class="container">
        <div class="col-md-8 footer">
            <p>Copyright © 2017 Liên Minh 360. All Rights Reserved</p>
            <ul>
                <li></li>
                <li>TIN GAME</li>
                <li>TIN ESPORTS</li>
                <li>CẨM NANG</li>
                <li>CỘNG ĐỒNG</li>
                <li>VIDEO</li>
                <li style="border:0px">HÌNH ẢNH</li>
            </ul>
            <div style="float: left;width: 100%;margin-top: 20px;">
                <img src="{{ asset('images/i-fb.jpg') }}">
                <img src="{{ asset('images/i-youtube.jpg') }}">
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/logo.png') }}" style="width: 275px">
        </div>
    </div>
</footer>
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>