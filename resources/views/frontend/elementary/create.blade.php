@extends ('layouts.app')
@section('add-style')
    <style>
        .body-wrap-main {
            background: #DEF3FF url({{asset('/imgs-dashboard/gamepage_bg.png')}}) no-repeat bottom right;
        }

        .preview-create {
            background-color: white;
            padding: 35px 30px;
            overflow: hidden;
        }

        .count {
            /*width: 10%;*/
            float: left;
            margin-right: 5px;
        }

        .answer-lis-a-mat,
        .answer-lis-a-pic{
            width: 30%;
            float: left;
        }

        .answer-lis-a-mat .choose-ans,
        .answer-lis-a-pic .choose-ans {
            text-align: center;
        }

        .example .first-as,
        .answer-lis-a-pic .first-as {
            text-align: center;
        }

        .example,
        .question-lis-a-mat,
        .question-lis-a-tic-pic{
            float: left;
            width: 100%;
            margin-top: 20px;
        }

        .example .first-as,
        .question-lis-a-mat .first-as,
        .question-lis-a-tic-pic .first-as {
            padding-left: 0px;
        }



    </style>
@stop

@section('content')
    <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12 wrap-bread_scrumb">
        <div class="bread_crumb">
            <ul>
                <li><a href="{{ route('frontend.teacher.index') }}">Trang chủ &nbsp;›</a></li>
                <li><a href="{{ route('frontend.teacher.elementary') }}">Tiểu học&nbsp;›</a></li>
                <li><a href="{{ route('frontend.teacher.elementary.create') }}">Tạo đề thi</a></li>
            </ul>
        </div>
    </div>


    <div class="main-body col-lg-12 col-md-12 col-ms-12 col-xs-12">
        <div class="panel-body">

            <div class="preview-create">
                {{-- header --}}
                <div class="preview-header">
                    <?php echo $header_examp_type->Header; ?>
                </div>

                {{-- body --}}
                <div class="preview-body">
                    <div class="unit1 col-lg-12 col-md-12 col-ms-12 col-xs-12">
                        <div class="unit-header">
                            {{ $exam_format->Part }}. {{ $exam_format->Description }}</div>

                        <div class="task1">
                            <span class="task-title">
                                <b>Task 1. Listen and match. There is one example (0).</b>
                            </span>
                            <div class="task1-content">Task 1. Listen and match. There is one example (0).</div>
                        </div>

                        <div class="task2">
                            <span class="task-title">
                                <b>Task 2. Listen and tick(v) A, B or C. There is one example.</b>
                            </span>
                            <div class="task1-content">
                                <div class="example">
                                    <div class="count">Example:</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">I often speak English to my friends.
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt=""></div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checked-box.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-mat">
                                    <div class="count">1.</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">I often speak English to my friends.
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-mat">
                                    <div class="count">2.</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">I often speak English to my friends.
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-mat">
                                    <div class="count">3.</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">I often speak English to my friends.
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-mat">
                                    <div class="count">4.</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">I often speak English to my friends.
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12">I often speak English to my friends.</div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="task3">
                            <span class="task-title">
                                <b>Task 3. Listen and tick(v) the correct pictures. There is one example.</b>
                            </span>
                            <div class="task1-content">
                                <div class="example">
                                    <div class="count col-lg-12 col-md-12">Example: What's he doing?</div>
                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt=""></div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checked-box.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-mat">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-tic-pic">
                                    <div class="count col-lg-12 col-md-12">1. What lesson does she have today?</div>
                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-tic-pic">
                                    <div class="count col-lg-12 col-md-12">2. How does he practise English?</div>
                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-tic-pic">
                                    <div class="count col-lg-12 col-md-12">3. What's she reading</div>
                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="question-lis-a-tic-pic">
                                    <div class="count col-lg-12 col-md-12">4. What animals did Tom see?</div>
                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">A.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">B.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="answer-lis-a-pic">
                                        <div class="col-lg-12 col-md-12 first-as">
                                            <img src="{{asset('/imgs-dashboard/ex1.png')}}" alt="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 choose-ans">C.
                                            <img src="{{asset('/imgs-dashboard/checkbox.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('add-script')
    <script>
        $(document).ready(function () {

            $('#slExamType').on('change', function (e) {
                var valueSelected = this.value;

                if (valueSelected == 2) {
                    $('#container_Unit').css('display', 'block');
                } else {
                    $('#container_Unit').css('display', 'none');
                }

            });

            $('#btnSave').click(function () {
                type_exam = $('#slExamType option:selected').val();
                if (type_exam == 0) {
                    alert('Bạn phải chọn loại bài kiểm tra');
                }
                if (type_exam == 2) {
                    unit = $('#slUnit option:selected').val();
                    skill = $('#slKyNang option:selected').val();

                    if (unit == 0) {
                        alert('Bạn phải chọn Unit');
                        return false;
                    }

                    if (skill == 0) {
                        alert('Bạn phải chọn Kỹ Năng');
                        return false;
                    }

                }
            });

        });


    </script>
@stop