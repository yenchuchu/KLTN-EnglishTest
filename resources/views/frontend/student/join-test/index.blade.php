@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')
@stop

@section('content')
    <a style="display: none;" href="{{route('frontend.dashboard.student.index')}}" id="href_goto_index"></a>
    <div id="refresh-page-testing">
        @include('frontend.student.join-test.index_start')
    </div>
@stop

@section('script')
    @include('frontend.student.join-test.script')


    {{-- có bản ghi trong bảng Items -> chưa làm xong --}}
    @if($noti_not_complete == 1)
        <script type="text/javascript">

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
                    function (isConfirm) {
                        if (isConfirm) { // true: restart
                            // xóa record gần nhất ( record của cái lần vừa được restart)
                            // bắt đầu thêm lại và update.
                            restart_test('{{$level_chosen->id}}');

                            if (cancelled == false) {
                                demlui(thoigian);
                            }
                        } else { // false: continue testing
                            // cập nhật tiếp dữ liệu ở bản ghi trong user_skill table.
                            // cứ 15s gửi đáp án lên serve 1 lần
                            // tgian: lay tu time trong bang item. chua set duoc time.
                            if (cancelled == false) {
                                demlui(thoigian);
                            }

                            interval = setInterval(function () { get_answer_consecutive(0); }, 1500);
                        }
                    });
        </script>
    @else
        <script>
            cancelled = demlui(thoigian);

            interval = setInterval(function () { get_answer_consecutive(0); }, 1500);
//
//            countdown_autoSentAjax(cancelled)

        </script>
    @endif

@stop
