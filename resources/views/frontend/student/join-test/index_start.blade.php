<p id="demo"></p>

<div id='demnguoc'><i class="fa fa-clock-o" aria-hidden="true"></i><span id='dem'></span> <span id='donvi'></span>
</div>

<?php $i_skill = 1;
$j_title = 1;

?>
@foreach($items as $key => $item)
    <h4>{{$i_skill}}. {{$key}}</h4>

    @foreach($item as $key_item => $detail)
        @if(!empty($detail))
            <div class="col-lg-12 space-exam">
                <p>{{$j_title}}. {{$detail->title}}</p>
                <article>{{$detail->content}}</article>
                <?php $list_question = json_decode($detail->content_json);
                $k_question = 1;
                ?>
                @foreach($list_question as $question)
                    <?php
                    switch ($detail->table) {
                    case "answer_questions": ?>

                    @include('frontend.student.join-test.temp_answer_question',
                    ['key' => $key, 'j_title' => $j_title, 'k_question' => $k_question, 'id_question' => $question->id,
                    'question_content' =>$question->content, 'id_record'=> $detail->id, 'table' => $detail->table])
                    <?php  break;

                    case "classify_words":
                        echo "classify_words!";
                        break;
                    case "complete_words":
                        echo "complete_words!";
                        break;
                    case "find_errors":
                        echo "find_errors!";
                          break;
                    case "multiple_choices": ?>

                        @include('frontend.student.join-test.temp_multiple_choice',
                    ['key' => $key, 'table' => $detail->table, 'k_question' => $k_question, 'id_question' => $question->id,
                    'question_content' =>$question->content])
                        <?php break;

                    case "tick_circle_true_falses": ?>

                    @include('frontend.student.join-test.temp_tick_circle_true_false',
                    ['key' => $key, 'table' => $detail->table, 'k_question' => $k_question, 'id_question' => $question->id,
                    'question_content' =>$question->content, 'id_record'=> $detail->id])
                    <?php break;

                    case "underlines":
                        echo "underlines!";
                        break;
                    default:
                        echo "Your favorite color is neither red, blue, nor green!";
                    }
                    ?>

                    <?php $k_question++; ?>
                @endforeach
            </div>
            <?php $j_title++; ?>
        @endif
    @endforeach


    <?php $i_skill++; ?>
@endforeach

<div class="col-lg-offset-10 col-lg-2">
    <button type="submit" title="Submit" id="btn-submit-test" class="btn btn-success btn-submit-test">Submit</button>
</div>
