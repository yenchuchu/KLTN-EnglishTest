<div class="row wrap_question_details">
    <div class="col-lg-12" style="padding-left: 0px;">
        <span class="content_question"><span class="huge-number">{{$k_question}}.</span> {{$question_content}}</span>
    </div>

    <div class="col-lg-12 suggest_asnwer_questions">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="enter answer" id="your_answer_{{$table}}_{{$id_record}}_{{$id_question}}"
                   id_record="{{$id_record}}" id_question="{{$id_question}}" name_table="{{$table}}"
                   name="your_answer_[{{$table}}][{{$id_record}}][{{$id_question}}]">
        </div>
    </div>
</div>