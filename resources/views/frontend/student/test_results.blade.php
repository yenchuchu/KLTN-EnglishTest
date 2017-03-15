@extends('layouts.app')

@section('header')
    <h1 class="page-header">Test Speak</h1>
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

        div#manager_results_users_filter label {
            text-align: right;
            width: 100%;
        }

        div#manager_results_users_filter input {
            margin-left: 10px;
            width: 65%;
        }

    </style>
@stop

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kết quả đã thi
                </div>
                <div class="panel-body">
                    <div class="table-responsive" id="reload-table-results">
                        <table class="table table-hover" id="manager_results_users">
                            <thead>
                            <tr>
                                {{--<th rowspan="2">STT</th>--}}
                                <th rowspan="2">Lần thi</th>
                                <th rowspan="2">Level</th>
                                <th colspan="2" align="center">Điểm</th>
                            </tr>
                            <tr>
                                <th>Nghe</th>
                                <th>Đọc</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_results as $results)
                                <tr class="odd gradeX">
                                    {{--<td></td>--}}
                                    <td>{{$results->test_id}}</td>
                                    <td>{{$results->level_id}}</td>
                                    @foreach($results->skill_json as $skill)

                                        @if($skill->skill_id == 'Listen')
                                        <td> {{$skill->point}} </td>
                                        @endif

                                        @if($skill->skill_id == 'Read')
                                                <td> {{$skill->point}} </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>

@stop

@section('script')

    <script type="text/javascript">
        setTableInitStudent('manager_results_users');

    </script>

@stop
