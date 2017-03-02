{{--<script src="dist/sweetalert.min.js"></script>--}}
<script>
    //thoi gian bắt đầu đếm lùi
    var thoigian = 3600;
    //đơn vị đếm là giây hoặc phút
    var donvi = "";
    //khoach cách giữa 2 lần giảm, đơn vị là ms
    var khoangcach = 1000; // =1s
    if (donvi == "phút") khoangcach = 60000; //=1 phút
    //cố định giá trị thời gian bằng biến bandau
    var bandau = thoigian;

    function auto_finish() {
        url = '{{ route('frontend.student.testing.handle') }}';
        $.ajax({
            url: url,
            type: "post",
            data: {
                absent_request_id: id,
            },
            success: function (data) {

                // hay trả về data mảng dạng {code, message, data};
                if (data.code == 200) {  // mặc định 200 là thành công

                    $('.class-loader-css1').css('display', 'none');
                    $(".row button").prop('disabled', false);

                    $('.checked_absent_request_' + id).html('<i class="fa fa-check-square-o" aria-hidden="true"></i>');

                    count_done = count_done -1;

                    if(count_done == 0) {
                        $('#'+ key_absent_request).css({"color": "white", "font-size": "16px"});
                    }

                    $('#'+ key_absent_request).attr('count_done', count_done);

                    if (typeof window["reload_sidebar_teacher"] === "function")
                        window["reload_sidebar_teacher"]();

                    // Alert message success
                    swal(data.message, '', 'success');
                }

                if (data.code == 404 || data.code == 32) {
                    $('.class-loader-css1').css('display', 'none');
                    $(".row button").prop('disabled', false);

                    swal('', data.message, 'error').catch(swal.noop);
                }

            },
            error: function () {
                $('.class-loader-css1').css('display', 'none');
                $(".row button").prop('disabled', false);

                swal('', 'Không thực hiện được hành động này!', 'error').catch(swal.noop);
            }
        });
    }
    function format_time(seconds) {

        if(seconds < 10) {
            seconds = "0" + seconds;
        }

        return seconds;
    }

    function demlui(thoigian) {

        //đưa thời gian bắt đầu đếm vào button
        var minutes_st = Math.floor((thoigian / (60)));
        var seconds_st = Math.floor((thoigian % 60));
        document.getElementById("dem").innerHTML =  " " + minutes_st.toString() + ":" + format_time(seconds_st.toString());

        //khi nào bắt đầu đếm thì ẩn nút click và hiện thời gian
        document.getElementById("click").style.display = 'none';
        document.getElementById("demnguoc").style.display = 'block';
        //sau một khoảng thời gian là khoangcach thì thời gian trừ đi 1
        var timer = setInterval(function () {
            thoigian--;
            if (thoigian < 0) {
                //nếu đếm xong thì hiện nút click và ẩn thời gian
                document.getElementById("demnguoc").style.display = 'none';
                document.getElementById("click").style.display = 'block';



                //reset timer
                clearInterval(timer);
                var minutes = Math.floor((bandau / (60)));
                var seconds = Math.floor((bandau % 60));
                //đặt lại time để chạy ltowisclick tới
                document.getElementById("dem").innerHTML =  " " + minutes.toString() + ":" + format_time(seconds.toString());
                thoigian = bandau;
            } else {
                var minutes = Math.floor((thoigian / (60)));
                var seconds = Math.floor((thoigian % 60));
                //nếu chưa đếm xong thì đưa thoigian=thoigian-1 vào button
                document.getElementById("dem").innerHTML = " " + minutes.toString() + ":" + format_time(seconds.toString());
            }
        }, khoangcach);
    };

    swal({
        title: "Are you sure?",
        text: "Bạn muốn tiếp tục hay làm lại bài thi?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Restart",
        cancelButtonText: "Continue",
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(isConfirm){
        if (isConfirm) { // true: restart
            demlui(thoigian);

//            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else { // false: continue testing
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });

</script>