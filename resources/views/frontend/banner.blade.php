@php
foreach ($posts as $k => $post) :
switch ($k) :
    case 1:
        $tin1title = $post ->name;
		$tin1anh= $post ->thumbnail;
		$tin1link = route('post', $post->slug);
        break;
    case 2:
        $tin2title = $post ->name;
		$tin2anh= $post ->thumbnail;
		$tin2link = route('post', $post->slug);
        break;
    case 3:
        $tin3title = $post ->name;
		$tin3anh= $post ->thumbnail;
		$tin3link = route('post', $post->slug);
        break;
    default:
        $tin4title = $post ->name;
		$tin4anh= $post ->thumbnail;
		$tin4link = route('post', $post->slug);
        break;
endswitch;

endforeach;
@endphp
<div class="container nopadding topbanner">
    <div class="newstop">
        <div class="col-md-6 nopadding topbannerleft">
            <a href="{{ $tin1link }}">
                <img src="{{ asset($tin1anh) }}" style="width: 100%;height: 100%">

                <div class="textinbox">
                    <h3>{{$tin1title}}</h3>
                </div>
            </a>
        </div>
        <div class="col-md-6 nopadding">
            <div class="col-md-12 topbannerrighttop">
                <a href="{{ $tin2link }}">
                    <img src="{{ asset($tin2anh) }}" style="width: 100%;height: 100%">

                    <div class="textinbox">
                        <h3>{{$tin2title}}</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-12 topbannerrightbot">
                <div class="col-md-6  boxleft1">
                    <a href="{{ $tin3link }}">
                        <img src="{{ asset($tin3anh) }}" style="width: 100%;height: 100%">

                        <div class="textinbox">
                            <h3>{{$tin3title}}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 boxleft2">
                    <a href="{{ $tin4link }}">
                        <img src="{{ asset($tin4anh) }}" style="width: 100%;height: 100%">

                        <div class="textinbox">
                            <h3>{{$tin4title}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>