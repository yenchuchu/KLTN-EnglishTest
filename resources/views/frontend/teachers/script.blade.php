<script>
    /**
     * hiển thị các unit khi chọn kiểm tra thường xuyên
     * @type {any}
     */
    var code_exam_type = $('#answer-question-examtype').find(":selected").attr('code');
    if(code_exam_type == 'test_15') {
        $('#wrap_bookmap_form').show();
    } else {
        $('#wrap_bookmap_form').hide();
    }

    $('#answer-question-examtype').change(function(){
        var code_exam_type = $('#answer-question-examtype').find(":selected").attr('code');
        if(code_exam_type == 'test_15') {
            $('#wrap_bookmap_form').show();
        } else {
            $('#wrap_bookmap_form').hide();
        }
    });
</script>