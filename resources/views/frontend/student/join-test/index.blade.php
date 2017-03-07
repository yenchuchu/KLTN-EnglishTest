@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')
@stop

@section('content')
    <a style="display: none;" href="{{route('frontend.dashboard.student.index')}}" id="href_goto_index"></a>
    <div id="refresh-page-testing">
        @include('frontend.student.join-test.index_start')
    </div>
@stop

@section('script')
    @include('frontend.student.join-test.script')


@stop
