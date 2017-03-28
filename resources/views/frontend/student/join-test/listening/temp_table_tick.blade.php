<div class="row wrap_question_details">
    <div class="col-lg-8 question-checkbox">
        @if(isset($detail->old_answer) && $detail->old_answer[$id_question]['id_question'] == $id_question)

        @else
            <table class="table table-bordered">
                @foreach($suggest_choose as $idx => $sug)
                    <tr>
                        <td><label for="your_answer_{{$table}}_{{$id_record}}_{{$sug}}">{{$sug}}</label></td>
                        <td><input type="checkbox" id="your_answer_{{$table}}_{{$id_record}}_{{$sug}}"
                                   name="your_answer_{{$table}}_{{$id_record}}[]" value="{{$sug}}"
                                   id_record="{{$id_record}}" name_table="{{$table}}" number_title="{{$number_title}}">
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>