<script>
    var j = 2;
    $('.add-item').click(function () {
        $("#wrap_add_answer_question").append('' +
                '<div class="col-lg-12" class="col_add_answer_question">' +

                '<i class="fa fa-times col-lg-2 col-lg-offset-10 i-remove-item" id="remove-item-'+ j +'" ' +
                'aria-hidden="true" title="remove" onclick="remove_item(this.id)"></i>' +

                '<div class="panel panel-default">' +

                '<div class="panel-body" style="padding-top: 0px;">' +

                '<div class="table-responsive" id="wrap-content-exam-' + j + '">' +

                '<div class="col-lg-10" style="padding-left: 0;">' +
                '<div class="form-group">' +
                '<input type="text" name="title-answer-question-'+ j +'" class="form-control">' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2" style=" padding-right: 0;">' +
                '<div class="form-group">' +
                '<label class="lable-point">Point: </label>' +
                '<input type="number" name="point-'+ j +'" class="form-control input-point">' +
                '</div>' +
                '</div>' +

                '<div class="form-group">' +
                '<textarea type="text" class="form-control" name="content-answer-question-'+ j +'" placeholder="enter content"></textarea>' +
                '</div>' +
                '<div class="form-group" style="width:100%; float:left;" >' +
                ' <div class="span-numb-question" id="id-numb-question-1" >' +
                '1' +
                '</div>' +

                '<div class="span-text-question">' +
                '<textarea type="text" class="form-control" name="content-choose-ans-question-'+ j +'[]" placeholder="enter content" ></textarea>' +
                '</div>' +

                '<div class="span-choose-answer" >' +
                '<span><strong>T</strong></span>' +
                '<span><strong>F</strong></span>' +
                '</div>' +

                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<a href="#" id="add_item_question_' + j + '" item_this="1" item="' + j + '" ' +
                'class="add-question" onclick="add_item_question(this.id)">+</a>' +
                '</div>' +
                '</div>' +


                '</div>' +
                '</div>');
    });

     function add_item_question(id) {

         item = $('#' + id).attr('item');
         item_this =  $('#' + id).attr('item_this');

         item_this++;

         $("#wrap-content-exam-" + item ).append('<div class="form-group" style="width:100%; float:left;">' +
                 '<div class="span-numb-question" id="id-numb-question-'+ item_this +'">' +
                 item_this +
                 '</div>' +
                 '<div class="span-text-question">' +
                 '<textarea type="text" class="form-control" name="content-choose-ans-question-'+ item +'[]" placeholder="enter content" ></textarea>' +
                 '</div>' +
                 '<div class="span-choose-answer" >' +
                 '<span><strong>T</strong></span>' +
                 '<span><strong>F</strong></span>' +
                 '</div>' +
                 '</div>');

         $('#add_item_question_'+ item).attr('item_this', item_this);
     }

     function remove_item(id) {
         console.log(id);
         $('#'+id).parent().remove();
     }

</script>