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
@include('layouts.menu')
@yield('content')
<footer>
    <div class="container">
        <div class="col-md-8 footer">
            <p>Copyright © {{ date('Y') }} Liên Minh 360. All Rights Reserved</p>
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