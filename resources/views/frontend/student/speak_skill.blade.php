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
    <div>
        <p id="text_demo">Television is having a negative impact on society</p>
        <audio controls>
            <source src="{{$voice['response']}}">
            Your browser does not support the audio element.
        </audio>
    </div>

    <div style="float:left; width: 100%">
        <a href="#" id="start_button" onclick="startDictation(event)"><i class="fa fa-microphone" aria-hidden="true"></i></a>

        <div id="results">
            <span id="final_span" class="final"></span>
            <span id="interim_span" class="interim"></span>
            <span id="messages_result"></span>
        </div>
    </div>



    <button id="check_diff" class="btn btn-success" style="margin-top: 10px;">Check</button>


    <h1> MediaRecorder API example</h1>

    <p> For now it is supported only in Firefox(v25+) and Chrome(v47+)</p>
    <div id='gUMArea'>
        <div>
            Record:
            <input type="radio" name="media" value="audio">audio
        </div>
    </div>
    <div id='btns'>
        <button  class="btn btn-default" id='start'>Start</button>
        <button  class="btn btn-default" id='stop' disabled>Stop</button>
    </div>
    <div>
        <ul  class="list-unstyled" id='ul'></ul>
    </div>
@stop

@section('script')

    <script>
        'use strict'

        let log = console.log.bind(console),
                id = val => document.getElementById(val),
                ul = id('ul'),
                start = id('start'),
                stop = id('stop'),
                stream,
                recorder,
                counter=1,
                chunks,
                media, record_recognition, final_transcript = '';

            let mv = { audio: {
                            tag: 'audio',
                            type: 'audio/ogg',
                            ext: '.ogg',
                            gUM: {audio: true}
                        }
                    };
            media =mv.audio;
            navigator.mediaDevices.getUserMedia(media.gUM).then(_stream => {
                stream = _stream;
            id('gUMArea').style.display = 'none';
            id('btns').style.display = 'inherit';
            start.removeAttribute('disabled');

            recorder = new MediaRecorder(stream);
            recorder.ondataavailable = e => {
                chunks.push(e.data);
                if(recorder.state == 'inactive')  makeLink();
            };
            log('got media successfully');
        }).catch(log);
        console.log(record_recognition);
        start.onclick = e => {
            start.disabled = true;
            stop.removeAttribute('disabled');
            chunks=[];
            recorder.start();

            final_transcript = '';
            final_span.innerHTML = '';
            interim_span.innerHTML = '';
            messages_result.innerHTML = '';

            record_recognition = new webkitSpeechRecognition();
            record_recognition.lang = "en-US";
            record_recognition.continuous = true;
            record_recognition.interimResults = true;
            record_recognition.start();

            record_recognition.onresult = function(event) {
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
            }
        }
        stop.onclick = e => {
            stop.disabled = true;
            recorder.stop();
            start.removeAttribute('disabled');
            record_recognition.stop();
        }

        function makeLink(){
            let blob = new Blob(chunks, {type: media.type })
                    , url = URL.createObjectURL(blob)
                    , li = document.createElement('li')
                    , mt = document.createElement(media.tag)
                    , hf = document.createElement('a')
                    ;
            mt.controls = true;
            mt.src = url;
            hf.href = url;
            hf.download = `${counter++}${media.ext}`;
            hf.innerHTML = `donwload ${hf.download}`;
            li.appendChild(mt);
            li.appendChild(hf);
            ul.appendChild(li);
        }

        </script>
    <script>


    <!-- HTML5 Speech Recognition API -->
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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