<section class="wapper container">
    <div class="top-nav" >
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" id="navbar-brand" href="{{ route('index') }}"  style="color: #fff">Trang chủ</a>
                </div>
                <ul class="nav navbar-nav">
                    @foreach($menu as $item)
                        <li>
                            <a href="{{ route('category', $item->slug) }}" style="color: #fff">{{ $item->name }}</a>
                        </li>
                    @endforeach
                    {{--<li>
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
                    </li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="boxtimkiem">
                        <form action="{{ route('search') }}">
                            {{--<img src="images/i-fb.jpg">
                            <img src="images/i-youtube.jpg">--}}
                            <input type="text" class="timkiem" name="s">
                            <button class="nuttim" placeholder="aa">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
</section>