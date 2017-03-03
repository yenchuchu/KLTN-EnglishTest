@extends('layouts.app')

@section('menu-main')
    @include('frontend.student.partials.menu-main')
@stop

@section('style-menu-main')
    @include('frontend.student.join-test.style')
@stop

@section('content')
    <div class="refresh" onload="test()">
        <div class="row wrap-test-class" id="title-level-testing">
            <h3>Testing {{$level_chosen->title}}</h3>
            <input type="hidden" id="level-tesing-hidden" value="{{$level_chosen->id}}">
        </div>
        <div class="row wrap-test-class" id="testing-id">

            @include('frontend.student.join-test.index_start')
        </div>
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
                            demlui(thoigian);

//            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } else { // false: continue testing
                            // cập nhật tiếp dữ liệu ở bản ghi trong user_skill table.
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
        </script>
    @else
        <script>
            demlui(thoigian);
        </script>
    @endif

@stop
