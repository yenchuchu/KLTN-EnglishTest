<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'English App - Free') }}</title>

{{--<title>English App - Free</title>--}}

<!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('backend/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet"/>

    <!-- My CSS -->
    <link href="{{URL::asset('frontend/mystyle.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{URL::asset('frontend/theme_css/css/freelancer.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- sweet alert -->
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/loader.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/page_loaders.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/sweetalert2.min.css')}}"/>

    <!-- Styles -->
{{--    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">--}}

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('style')
    @yield('style-menu-main')

    <style>
        #menu-nav-top {
            background-color: #0c8db9;
        }

        #menu-nav-top .navbar-brand,
        #menu-nav-top #username-auth,
        .guest-app > a {
            color: white !important;
        }

        #menu-nav-top .nav a:hover,
        #menu-nav-top .nav a:active {
            background-color: #2aadda;
        }

    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top" id="menu-nav-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            @include('partials.menu-top-right')
        </div>
    </nav>
    <div class="container">

        @yield('menu-main')
        @include('errors.errors')
        @yield('content')

    </div>

</div>

<!-- Core Scripts - Include with every page -->
<script src="{{URL::asset('backend/assets/plugins/jquery-1.10.2.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{URL::asset('backend/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{URL::asset('js/sweet-alert/sweetalert2.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        }
    });
</script>

<!-- Scripts -->
<script src="{{URL::asset('js/app.js')}}"></script>

@yield('script')

<script>
    $('.dropdown').click(function () {
        $('.dropdown-menu').toggle();
    });
</script>

</body>
</html>
