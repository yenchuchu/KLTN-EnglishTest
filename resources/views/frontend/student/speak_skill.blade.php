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


         .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
        .speech input {border: 0; width: 240px; display: inline-block; height: 30px;}
        .speech img {float: right; width: 40px }

        #start_button,
        #results {
            float: left;
        }

        #results {
            margin-left: 10px;
        }

    </style>
@stop

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('content')
    <div><p id="text_demo">Television is having a negative impact on society</p></div>

    <div style="float:left; width: 100%">
        <a href="#" id="start_button" onclick="startDictation(event)"><i class="fa fa-microphone" aria-hidden="true"></i></a>

        <div id="results">
            <span id="final_span" class="final"></span>
            <span id="interim_span" class="interim"></span>
            <span id="messages_result"></span>
        </div>
    </div>

    <button id="check_diff" class="btn btn-success" style="margin-top: 10px;">Check</button>


@stop

@section('script')
    <!-- HTML5 Speech Recognition API -->
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var final_transcript = '';
        var recognizing = false;

        if ('webkitSpeechRecognition' in window) {

            var recognition = new webkitSpeechRecognition();

            recognition.continuous = true;
            recognition.interimResults = true;

            recognition.onstart = function() {
                recognizing = true;
            };

            recognition.onerror = function(event) {
                console.log(event.error);
            };

            recognition.onend = function() {
                recognizing = false;
            };

            recognition.onresult = function(event) {
                var interim_transcript = '';
                for (var i = event.resultIndex; i < event.results.length; ++i) {
                    if (event.results[i].isFinal) {
                        final_transcript += event.results[i][0].transcript;
                    } else {
                        interim_transcript += event.results[i][0].transcript;
                    }
                }
                final_transcript = capitalize(final_transcript);
                final_span.innerHTML = linebreak(final_transcript);
                interim_span.innerHTML = linebreak(interim_transcript);

            };
        }

        var two_line = /\n\n/g;
        var one_line = /\n/g;
        function linebreak(s) {
            return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
        }

        function capitalize(s) {
            return s.replace(s.substr(0,1), function(m) { return m.toUpperCase(); });
        }

        function startDictation(event) {
            if (recognizing) {
                recognition.stop();
                return;
            }
            final_transcript = '';
            recognition.lang = 'en-US';
            recognition.start();
            final_span.innerHTML = '';
            interim_span.innerHTML = '';
        }

        $('#check_diff').click(function () {

            recognition.onend = function() {
                recognizing = false;
            };
            text_demo = $('#text_demo').text();
            text_speak = $('#final_span').text();

            url = '{{ route('frontend.student.testing.check_text_speech') }}';
            $.ajax({
                url: url,
                type: "post",
                data: {
                    text_demo: text_demo,
                    text_speak: text_speak,
                    _token: CSRF_TOKEN
                },
                success: function (data) {

                    // hay trả về data mảng dạng {code, message, data};
                    if (data.code == 200) {  // mặc định 200 là thành công
                        $('#messages_result').css('color', '#1bf51b');
                        $('#messages_result').text(data.message);
                    }

                    if (data.code == 32) {  // mặc định 200 là thành công
                        $('#messages_result').css('color', 'red');
                        $('#messages_result').text(data.message);
                    }
                    console.log(data.message);

                    if (data.code == 404) {
                        swal('', data.message, 'error').catch(swal.noop);

                        return false;
                    }
                },
                error: function () {
                    swal('', 'Không thực hiện được hành động này!', 'error');
                }
            });
        });

    </script>

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
