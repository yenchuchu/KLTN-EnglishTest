<div class="row wrap_question_details">
    <div class="col-lg-8" style="padding-left: 0px;">
        <span class="content_question"><span class="huge-number">{{$k_question}}.</span> {{$question_content}}</span>
    </div>

    <div class="col-lg-4 question-checkbox">
        <label class="checkbox-inline">
            <input type="radio" name="your_answer_[{{$table}}][{{$id_record}}][{{$id_question}}][]"
                   id="your_answer_{{$table}}_{{$id_record}}_{{$id_question}}_true"
                   id_record="{{$id_record}}" id_question="{{$id_question}}" name_table="{{$table}}" value="1">True
        </label>
        <label class="checkbox-inline">
            <input type="radio" name="your_answer_[{{$table}}][{{$id_record}}][{{$id_question}}][]"
                   id="your_answer_{{$table}}_{{$id_record}}_{{$id_question}}_false"
                   id_record="{{$id_record}}" id_question="{{$id_question}}" name_table="{{$table}}" value="0">False
        </label>
    </div>
</div>