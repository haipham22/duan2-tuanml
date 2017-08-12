@if(count($posts) > 4)
    <div class="container nopadding topbanner">
        @php($top = $posts->take(4))
        <div class="newstop">
            @php($item = $top->first())
            <div class="col-md-6 nopadding topbannerleft">
                <div class="namecate">{{ $item->categories->name }}</div>
                <a href="{{ route('post', $item->slug) }}">
                    <div class="textinbox">
                        <h3>{{ $item->name }}</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-6 nopadding">
                @php($item = $top->pull(2))
                <div class="col-md-12 topbannerrighttop">
                    <div class="namecate">{{ $item->categories->name }}</div>
                    <a href="{{ route('post', $item->slug) }}">
                        <div class="textinbox">
                            <h3>{{ $item->name }}</h3>
                        </div>
                    </a>
                </div>
                @php($item = $top->pull(3))
                <div class="col-md-12 topbannerrightbot">
                    <div class="col-md-6  boxleft1">
                        <div class="namecate">{{ $item->categories->name }}</div>
                        <a href="{{ route('post', $item->slug) }}">
                            <div class="textinbox">
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </a>
                    </div>
                    @php($item = $top->last())
                    <div class="col-md-6 boxleft2">
                        <div class="namecate">{{ $item->categories->name }}</div>
                        <a href="{{ route('post', $item->slug) }}">
                            <div class="textinbox">
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif