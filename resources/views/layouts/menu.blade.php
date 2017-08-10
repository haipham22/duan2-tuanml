<section class="wapper container">
    <div class="top-nav" >
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" id="navbar-brand" href="{{ route('index') }}"  style="color: #fff">Trang chủ</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/danh-muc/tin-game" style="color: #fff">Tin game</a>
                    </li>
                    <li>
                        <a href="/danh-muc/tinesport" style="color: #fff">Tin esports</a>
                    </li>
                    <li>
                        <a href="/video" style="color: #fff">Video</a>
                    </li>
                    <li>
                        <a href="/hinh-anh" style="color: #fff">Hình ảnh</a>
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