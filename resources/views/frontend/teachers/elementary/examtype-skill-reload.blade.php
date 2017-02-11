<div class="form-group">
    <span class="control-label label-bold" style="line-height: 22px;"><b>CHỌN DẠNG BÀI</b>
        <span class="point-start">*</span></span>
</div>

@if(count($examtype_skills) == 0)
    <p style="font-size: 14px; color: red;">Chưa cập nhật dạng bài</p>
@else

    @foreach($examtype_skills as $item)

        <div class="form-group bookmap_form">
            <input type="checkbox" name="examtype_skills[]">
{{--            <label for="bookmap_{{$book_map->id}}">{{$book_map->title}}</label>--}}
        </div>

    @endforeach

@endif