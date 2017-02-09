@extends('layouts.app-backend')

@section('style')
    @include('backend.author.answer_question.style')
@stop

@section('header')
    <h1 class="page-header">Add exam 'answer question'</h1>
@stop

@section('content')

    {{ Form::open(['route' => 'backend.manager.author.answer-question.store', 'method' => 'post']) }}

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">

                <select name="level_id" class="form-control" id="add-answer-question-level">
                    @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->title}} - {{$level->point}}  </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="wrap_add_answer_question">
        <div class="col-lg-12 col_add_answer_question">

            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive" id="wrap-content-exam-1">

                        <div class="col-lg-10" style="padding-left: 0;">
                            <div class="form-group">
                                <input type="text" name="answer_question[1][title-answer-question]"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-2" style=" padding-right: 0;">
                            <div class="form-group">
                                <label class="lable-point">Point: </label>
                                <input type="number" name="answer_question[1][point]"
                                       class="form-control input-point" required>
                            </div>
                        </div>

                        <div class="form-group">
                                <textarea type="text" class="form-control" name="answer_question[1][content-answer-question]"
                                          placeholder="enter content" required></textarea>
                        </div>
                        <div class="form-group" style="width:100%; float:left;">
                            <div class="span-numb-question" id="id-numb-question-1">
                                1
                            </div>
                            <div class="span-text-question">
                                    <textarea type="text" class="form-control" name="answer_question[1][content-choose-ans-question][1][content]"
                                              placeholder="enter content" required></textarea>
                            </div>
                            <div class="span-choose-answer">
                                <span>
                                    <input type="radio" name="answer_question[1][content-choose-ans-question][1][answer]" value="1" class="ans-true"><strong>T</strong>
                                </span>
                                <span>
                                     <input type="radio" name="answer_question[1][content-choose-ans-question][1][answer]" value="0" class="ans-false"><strong>F</strong>
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <a href="#" id="add_item_question_1" item_this="1" item="1"
                           class="add-question" onclick="add_item_question(this.id)" title="Add">+</a>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="#" class="add-item">+</a>
        </div>
        <div class="col-lg-12 col-md-12">
            <button class="save-answer-questions btn" title="Save" type="submit">
                <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        </div>
    </div>

    {!! Form::close() !!}

@stop

@section('script')
    @include('backend.author.answer_question.scritp')
@stop
