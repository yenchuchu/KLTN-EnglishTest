<div class="row wrap_question_details">
    <div class="col-lg-12" style="padding-left: 0px;">
        <span class="content_question"><span class="huge-number">{{$k_question}}.</span> {{$question_content}}</span>
    </div>

    <div class="col-lg-12 suggest_asnwer_questions">
        <div class="col-lg-4 option-as-details">
            <input type="radio" value="A"
                   name="multiple_choice[]">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="enter answer" name_table="{{$table}}" number_title="{{$j_title}}"
                       skill_name="{{$key}}"  name="your_answer_[{{$table}}][{{$k_question}}][content-choose-ans-question][1][option-answer][A]">
            </div>
        </div>

        <div class="col-lg-4 option-as-details">
            <input type="radio" value="B"
                   name="multiple_choice[1][content-choose-ans-question][1][answer]">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="enter answer" index="2" name_table="{{$table}}" number_title="{{$j_title}}"
                       skill_name="{{$key}}"  name="your_answer_[{{$table}}][1][content-choose-ans-question][1][option-answer][B]">
            </div>
        </div>

        <div class="col-lg-4 option-as-details">
            <input type="radio" value="C"
                   name="multiple_choice[1][content-choose-ans-question][1][answer]">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="enter answer" index="3" name_table="{{$table}}" number_title="{{$j_title}}"
                       skill_name="{{$key}}" name="your_answer_[{{$table}}][1][content-choose-ans-question][1][option-answer][C]">
            </div>
        </div>
    </div>
</div>