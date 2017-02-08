<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">
                    <div class="user-section-inner">
                        <?php
                        if(!empty(Auth::user()->avatar)) { ?>
                            <img src="{{URL::asset(Auth::user()->avatar)}}" alt="">
                        <?php } else { ?>
                        <img src="{{URL::asset('backend/assets/img/user.jpg')}}" alt="">
                        <?php } ?>
                    </div>
                    <div class="user-info">
                        <div>{{ Auth::user()->user_name }}</div>
                        <div class="user-text-online">
                            <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                        </div>
                    </div>
                </div>
                <!--end user image section-->
            </li>
            @if ( Auth::user()->hasRole('AT'))

                <li class="selected">
                    <a href="{{route('backend.manager.author.index')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.answer-question')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Answer Questions</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.classify-word')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Classify Words</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.complete-word')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Complete Words</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.find-errors')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Find Errors</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.multiple-choice')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Multiple Choices</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.tick-cricle-true-false')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Tick Cricle True Flase</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.author.underlines')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Underlines</a>
                </li>

            @endif

            @if ( Auth::user()->hasRole('AD'))
                <li class="selected">
                    <a href="{{route('backend.manager.users.index')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Manager Users</a>
                </li>
                <li>
                    <a href="{{route('backend.manager.roles.permissions.index')}}">
                        <i class="fa fa-dashboard fa-fw"></i>Manager Roles Permissions </a>
                </li>
            @endif


        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
