<nav class="navbar">
    <ul class="nav navbar-nav" id="ul-menu-main">
        <li class="active"><a href="{{route('frontend.dashboard.student.index')}}">HOME</a></li>
        <li class="dropdown">
            <a href="{{route('frontend.dashboard.student.redirect', 'Read')}}" id="href_Read">
                READING
            </a>
            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#"> VÀO THI </a>--}}
            {{--<ul class="dropdown-menu dropdown-messages">--}}
                {{--@foreach($levels as $level)--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frontend.dashboard.student.redirect', $level->id)}}" id="href_level_{{$level->id}}">{{$level->title}}</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        </li>
        <li><a href="{{route('frontend.dashboard.student.redirect', 'Listen')}}" id="href_Listen">
                LISTENING
            </a></li>
        <li><a href="{{route('frontend.dashboard.student.learn.speak', [])}}">TEST SPEAKING</a></li>
        <li><a href="{{route('frontend.student.show.results')}}">KẾT QUẢ THI</a></li>
        <li><a href="#">HƯỚNG DẪN</a></li>
        <li><a href="#">LÀM THỬ TEST</a></li>
        <li><a href="#">THỐNG KÊ</a></li>
        <li><a href="#">FORUM</a></li>
    </ul>
</nav>