@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')
@stop

@section('content')
    <div class="row wrap-test-class" id="title-level-testing">
       <h3>Test level 3</h3>
    </div>

    <div class="row wrap-test-class" id="testing-id">
                this is col-lg-2
    </div>
@stop

@section('script')

    <script type="text/javascript">

    </script>

@stop
