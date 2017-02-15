@extends('layouts.app')

@section('header')
    <h1 class="page-header">Dashboard</h1>
@stop

@section('style-menu-main')
   <style>
       #ul-menu-main li {
           background: navajowhite;
           margin-right: 15px;
           height: 41px;
           border-radius: 5px;
       }

        #ul-menu-main li a {
            padding-top: 10px;
       }

       #home-id .col-lg-6 {
           margin-right: 20px;
       }

       #home-id .col-lg-6,
       #home-id .col-lg-5 {
           background: #fafaf3;
           padding-top: 16px;
           padding-bottom: 16px;
       }


   </style>
@stop

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('content')

    @include('frontend.student.home')

@stop

@section('script')

    <script type="text/javascript">
        $('#btn-go-test').click(function () {
            val_level = $('#option-level-test').val();
            if(val_level == 0) {
                return false;
            }
        });

        function showLevel(level_id) {
            $.ajax({
                {{--url: '{{route("frontend.dashboard.student.redirect", level_id)}}',--}}
                type: "GET",
                data: {
                    level_id: level_id
                },
                success: function (data) {},
                error: function () {
                    alert("Không lấy được thông tin này!");
                }
            });
            return false;
        }
    </script>

@stop
