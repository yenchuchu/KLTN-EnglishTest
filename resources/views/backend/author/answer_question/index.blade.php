@extends('layouts.app-backend')

@section('header')
    <h1 class="page-header">Dashboard</h1>
@stop
@section('content')
    <div class="row">
        <!-- Welcome -->
        <div class="col-lg-12">
            <div class="alert alert-info">
                <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Jonny Deen </b>
                <i class="fa  fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;
            </div>
        </div>
        <!--end  Welcome -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Advanced Tables
                    <a href="{{route('backend.manager.author.answer-question.create', ['ST' , $class_code])}}" target="_blank">Add Student Test</a>
                    <a href="{{route('backend.manager.author.answer-question.create', ['TC', $class_code])}}" target="_blank">Add exam for teacher</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" id="reload-table-manager-users">
                        @include('backend.author.answer_question.table-index')
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>

@stop

@section('script')
@stop
