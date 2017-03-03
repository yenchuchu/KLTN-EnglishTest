{{--<script src="dist/sweetalert.min.js"></script>--}}
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //thoi gian bắt đầu đếm lùi
    var thoigian = 3600;
    //đơn vị đếm là giây hoặc phút
    var donvi = "";
    //khoach cách giữa 2 lần giảm, đơn vị là ms
    var khoangcach = 1000; // =1s
    if (donvi == "phút") khoangcach = 60000; //=1 phút
    //cố định giá trị thời gian bằng biến bandau
    var bandau = thoigian;

    // tự động cập nhật kết quả lên serve 15s 1 lần
    function auto_sent_answer(list_answer, level_id) {
        url = '{{ route('frontend.student.testing.handle') }}';
        $.ajax({
            url: url,
            type: "post",
            data: {
                list_answer: list_answer,
                level_id: level_id,
                _token: CSRF_TOKEN
            },
            success: function (data) {

                // hay trả về data mảng dạng {code, message, data};
                if (data.code == 200) {  // mặc định 200 là thành công
                    swal(data.message, '', 'success');
                }
                if (data.code == 404 || data.code == 32) {
                    swal('', data.message, 'error').catch(swal.noop);
                }
            },
            error: function () {
                swal('', 'Không thực hiện được hành động này!', 'error');
            }
        });
    }

    // nếu giây có 1 chữ số => thêm số 0 vào trước.
    function format_time(seconds) {

        if(seconds < 10) {
            seconds = "0" + seconds;
        }

        return seconds;
    }

    // đếm ngược thời gian cho tới 00:00
    function demlui(thoigian) {

        //đưa thời gian bắt đầu đếm vào button
        var minutes_st = Math.floor((thoigian / (60)));
        var seconds_st = Math.floor((thoigian % 60));
        document.getElementById("dem").innerHTML =  " " + minutes_st.toString() + ":" + format_time(seconds_st.toString());

        //khi nào bắt đầu đếm thì ẩn nút click và hiện thời gian
        //sau một khoảng thời gian là khoangcach thì thời gian trừ đi 1
        var timer = setInterval(function () {
            thoigian--;
            if (thoigian < 0) {

                get_answer_consecutive();

//                //reset timer
//                clearInterval(timer);
//                var minutes = Math.floor((bandau / (60)));
//                var seconds = Math.floor((bandau % 60));
//                //đặt lại time để chạy ltowisclick tới
//                document.getElementById("dem").innerHTML =  " " + minutes.toString() + ":" + format_time(seconds.toString());
//                thoigian = bandau;
            } else {
                var minutes = Math.floor((thoigian / (60)));
                var seconds = Math.floor((thoigian % 60));
                //nếu chưa đếm xong thì đưa thoigian=thoigian-1 vào button
                document.getElementById("dem").innerHTML = " " + minutes.toString() + ":" + format_time(seconds.toString());
            }
        }, khoangcach);
    };

    // lọc những phần tử giống nhau trong 1 mảng
    function unique(list) {
        var result = [];
        $.each(list, function(i, e) {
            if ($.inArray(e, result) == -1) result.push(e);
        });
        return result;
    }

    // lọc những object giống nhau trong 1 mảng
    function dedupe(arr) {
        return arr.reduce(function (p, c) {
            var key = [c.name_table, c.id_record, c.id_question, c.answer_student].join('|');
            if (p.temp.indexOf(key) === -1) {
                p.out.push(c);
                p.temp.push(key);
            }
            return p;
        }, { temp: [], out: [] }).out;
    }

    function get_answer_consecutive() {
        list_answer = [];
        list_answer_details = [];
        unique_list_answer = [];

        level_id = $('#level-tesing-hidden').val();

        $("[id^='your_answer_']").each(function () {
            name_table = $(this).attr('name_table');
            id_record = $(this).attr('id_record');
            id_question = $(this).attr('id_question');
            number_title = $(this).attr('number_title');
            skill_name = $(this).attr('skill_name');

            if(name_table == 'tick_circle_true_falses') {
                answer_student = $('input[name="your_answer_['+name_table+']['+id_record+']['+id_question+'][]"]:checked').val();
            } else {
                answer_student = $(this).val();
            }

            list_answer.push({
                'name_table': name_table,
                'id_record': id_record,
                'id_question': id_question,
                'answer_student': answer_student,
                'number_title': number_title,
                'skill_name': skill_name
            });

            unique_list_answer = dedupe(list_answer);
        });

        auto_sent_answer(unique_list_answer, level_id);
    }

    // cứ 15s gửi đáp án lên serve 1 lần
//    setInterval(function(){ get_answer_consecutive(); }, 1500);

    $('#btn-submit-test').click(function () {
        get_answer_consecutive();
    });

</script>