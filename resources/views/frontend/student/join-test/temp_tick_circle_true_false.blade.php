<div class="row wrap_question_details">
    <div class="col-lg-8" style="padding-left: 0px;">
        <span class="content_question"><span class="huge-number">{{$k_question}}.</span> {{$question_content}}</span>
    </div>

    <div class="col-lg-4 question-checkbox">
        <label class="checkbox-inline">
            <input type="radio" name="answer[{{$key}}][{{$j_title}}][{{$k_question}}][]" value="">True
        </label>
        <label class="checkbox-inline">
            <input type="radio" name="answer[{{$key}}][{{$j_title}}][{{$k_question}}][]" value="">False
        </label>
    </div>
</div>