@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')

    <style>
        .input_complete_listen {
            width: 7%;
            border: none;
            border-bottom: 1px solid gray;
            margin-left: 7px;
            color: gray;
        }

        .audio_listen {
            margin-top: 10px;
            margin-bottom: 15px;
        }

    </style>
@stop

@section('content')
    <a style="display: none;" href="{{route('frontend.dashboard.student.index')}}" id="href_goto_index"></a>
    <div id="refresh-page-testing">

        @include('frontend.student.join-test.listening.index_start')
    </div>
@stop

@section('script')
    @include('frontend.student.join-test.listening.script')
@stop
