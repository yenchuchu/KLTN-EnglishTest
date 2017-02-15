@extends ('layouts.init-pdf')
@section('style')
    <link href="{{URL::asset('backend/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <style>

    </style>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h4><strong>Skill: {{$code_skill}}</strong></h4>
        </div>
        <div class="col-xs-12">
            <div class="panel-body">
                @foreach($record_model as $key => $exams)

                    @foreach($exams as $key_exam => $exam)
                        <h3>{{$key_exam+1}}. {{$exam->title}}</h3>
                        <h4>{{$exam->content}}</h4>
                        <?php
                        $questions = $exam->content_json;
                        $count_questions = count($questions);
                        $type_table = $exam->type_model;
                        ?>

                        @foreach($questions as $key_qts => $value_qts)
                            <span>{{$key_qts}}. </span> <p>{{$value_qts->content}}</p>
                            <p>
                                @if($type_table == 'tick_circle_true_falses')
                                    <span>A. True</span>
                                    <span>B. False</span>
                                @elseif($type_table == 'answer_questions')
                                    <span>______________________________________________</span>
                                @endif
                            </p>
                        @endforeach

                    @endforeach

                @endforeach
            </div>
        </div>

    </div>

@stop

@section('script')
    <script>

    </script>
@stop