<script>
    var j = 2;
    $('.add-item').click(function () {
        $("#wrap_add_tick_true_false").append('' +
                '<div class="col-lg-12" class="col_add_tick_true_false">' +

                '<i class="fa fa-times col-lg-2 col-lg-offset-10 i-remove-item" id="remove-item-' + j + '" ' +
                'aria-hidden="true" title="remove" onclick="remove_item(this.id)"></i>' +

                '<div class="panel panel-default">' +

                '<div class="panel-body" style="padding-top: 0px;">' +

                '<div class="table-responsive" id="wrap-content-exam-' + j + '">' +

                '<div class="col-lg-10" style="padding-left: 0;">' +
                '<div class="form-group">' +
                '<input type="text" name="tick_true_false[' + j + '][title-tick-true-false] " class="form-control" required>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2" style=" padding-right: 0;">' +
                '<div class="form-group">' +
                '<label class="lable-point">Point: </label>' +
                '<input type="number" name="tick_true_false[' + j + '][point]" class="form-control input-point" required>' +
                '</div>' +
                '</div>' +

                '<div class="form-group">' +
                '<textarea type="text" class="form-control" name="tick_true_false[' + j + '][content-tick-true-false]' +
                'placeholder="enter content" required></textarea>' +
                '</div>' +
                '<div class="form-group" style="width:100%; float:left;" >' +
                ' <div class="span-numb-question" id="id-numb-question-1" >' +
                '1' +
                '</div>' +

                '<div class="span-text-question">' +
                '<textarea type="text" class="form-control" ' +
                'name="tick_true_false[' + j + '][content-choose-ans-question][1][content]"' +
                'placeholder="enter content" required></textarea>' +
                '</div>' +

                '<div class="span-choose-tick-true-false">' +
                '<span>' +
                '<input type="radio" id="check-answer_' + j + '_1_T"' +
                'name="tick_true_false[' + j + '][content-choose-ans-question][1][answer]" value="T"' +
                'class="ans-true"> <label for="check-answer_' + j + '_1_T" style="cursor: pointer">T</label>' +
                ' </span>' +
                '<span>' +
                '<input type="radio" id="check-answer_' + j + '_1_F"' +
                'name="tick_true_false[' + j + '][content-choose-ans-question][1][answer]" value="F"' +
                'class="ans-false"> <label for="check-answer_' + j + '_1_F" style="cursor: pointer">F</label>' +
                '</span>' +
                '</div>' +

                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<span id="add_item_question_' + j + '" item_this="1" item="' + j + '" ' +
                'class="add-question" onclick="add_item_question_TF(this.id)">+</span>' +
                '</div>' +
                '</div>' +


                '</div>' +
                '</div>');

        j++;
    });

    function add_item_question_TF(id) {

        item = $('#' + id).attr('item');
        item_this = $('#' + id).attr('item_this');

        item_this++;

        $("#wrap-content-exam-" + item).append('<div class="form-group" style="width:100%; float:left;">' +
                '<div class="span-numb-question" id="id-numb-question-' + item_this + '">' +
                item_this +
                '</div>' +
                '<div class="span-text-question">' +
                '<textarea type="text" class="form-control" ' +
                'name="tick_true_false[' + item + '][content-choose-ans-question][' + item_this + '][content]"' +
                'placeholder="enter content" ></textarea>' +
                '</div>' +

                '<div class="span-choose-tick-true-false">' +
                '<span>' +
                '<input type="radio" id="check-answer_' + item + '_' + item_this + '_T"' +
                'name="tick_true_false[' + item + '][content-choose-ans-question][' + item_this + '][answer]" value="T"' +
                'class="ans-true">' +
                '<label for="check-answer_' + item + '_' + item_this + '_T" style="cursor: pointer">T</label>' +
                ' </span>' +
                '<span>' +
                '<input type="radio" id="check-answer_' + item + '_' + item_this + '_F"' +
                'name="tick_true_false[' + item + '][content-choose-ans-question][' + item_this + '][answer]" value="F"' +
                'class="ans-false"> ' +
                '<label for="check-answer_' + item + '_' + item_this + '_F" style="cursor: pointer">F</label>' +
                '</span>' +
                '</div>' +

                '</div>');

        $('#add_item_question_' + item).attr('item_this', item_this);
    }

    /**
     * hiển thị các unit khi chọn kiểm tra thường xuyên
     * @type {any}
     */
    var code_exam_type = $('#tick-true-false-examtype').find(":selected").attr('code');
    if (code_exam_type == 'test_15') {
        $('#wrap_bookmap_form').show();
    } else {
        $('#wrap_bookmap_form').hide();
    }

    $('#tick-true-false-examtype').change(function () {
        var code_exam_type = $('#tick-true-false-examtype').find(":selected").attr('code');
        if (code_exam_type == 'test_15') {
            $('#wrap_bookmap_form').show();
        } else {
            $('#wrap_bookmap_form').hide();
        }
    });

</script>