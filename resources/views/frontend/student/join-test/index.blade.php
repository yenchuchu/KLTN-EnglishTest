@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')
@stop

@section('content')
    <div class="row wrap-test-class" id="title-level-testing">
       <h3>Testing {{$level_chosen->title}}</h3>
    </div>

    <div class="row wrap-test-class" id="testing-id">
        <?php $i_skill = 1;
              $j_title = 1;
              $k_question = 1;
        ?>
        @foreach($items as $key => $item)
            <h4>{{$i_skill}}. {{$key}}</h4>

            @foreach($item as $key_item => $detail)
                @if(!empty($detail))
                    <p>{{$j_title}}. {{$detail->title}}</p>
                    <article>{{$detail->content}}</article>
                    <?php $list_question = json_decode($detail->content_json) ; ?>
                    @foreach($list_question as $question)
                        <div class="col-lg-8">
                            <p>{{$k_question}}. {{$question->content}}</p>
                        </div>

                        @include('frontend.student.join-test.temp_tick_circle_true_false',
                        ['key' => $key, 'j_title' => $j_title, 'k_question' => $k_question])

                        <?php $k_question++; ?>
                    @endforeach

                    <?php $j_title++; ?>
                @endif

            @endforeach


            <?php $i_skill++; ?>
        @endforeach
    </div>
@stop

@section('script')

    <script type="text/javascript">

    </script>

@stop
