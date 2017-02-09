<?php

namespace App\Http\Controllers\backend\author;

use App\BookMap;
use App\Classes;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Level;
use App\AnswerQuestion;
use App\AnswerQuestionDetail;
use App\ExamType;

use Carbon\Carbon;
use Route;
use Illuminate\Support\Facades\Redirect;

class AnswerQuestionsController extends Controller
{
    protected $levels;
    protected $skill;
    protected $classes;

    /**
     * @var $type_diff = 1 : tao de cho giao vien
     * = 2: tao de cho hoc sinh
     */
    protected $type_diff;
    protected $class_code;
    protected $code_user;

    public function __construct()
    {
        $this->levels = Level::all();
        $this->classes = Classes::all();
        $this->skill = 'Read';

        $this->url_parameters = Route::getCurrentRoute()->parameters();
    }

    public function index()
    {
        $ans_questions_all = AnswerQuestion::orderBy('level_id', 'ASC')
            ->with('skills', 'levels')
            ->get();

        $ans_questions = [];
        foreach ($ans_questions_all as $ans) {
            $ans->content_json = json_decode($ans->content_json);
            $ans->skills = $ans->skills->first();
            $ans->levels = $ans->levels->first();

            $ans_questions[] = $ans;

        }

        $class_code = $this->url_parameters['class_code'];

        return view('backend.author.answer_question.index', compact('ans_questions', 'class_code'));
    }

    public function create()
    {
        $levels = $this->levels;
        $all_classes = $this->classes;


        $class_code = $this->url_parameters['class_code'];
        $code_user = $this->url_parameters['code_user'];

        $classes = $all_classes->filter(function ($class) use ($class_code) {
            return ($class->code == $class_code);
        });

        if($code_user == 'TC') {
            $exam_types = ExamType::all();
            $book_maps = BookMap::all();

            return view('backend.author.answer_question.create',
                compact('levels', 'class_code', 'code_user', 'classes', 'exam_types', 'book_maps'));
        }

        return view('backend.author.answer_question.create', compact('levels', 'class_code', 'code_user', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all_data = $request->all();

        if(!isset($all_data['level_id'])) {
            $all_data['level_id'] = null;
        }

        if(!isset($all_data['book_map_id'])) {
            $all_data['book_map_id'] = null;
        }

        if(!isset($all_data['exam_type_id'])) {
            $all_data['exam_type_id'] = null;
        }

        $skill = Skill::where('code', $this->skill)->first();
        $level_id = $all_data['level_id'];
        $class_id = $all_data['class_id'];

        foreach ($all_data['answer_question'] as $data) {

            $answer_question_content_question = $data['content-choose-ans-question'];
            $answer_question = new AnswerQuestion();

            $answer_question->title = $data['title-answer-question'];
            $answer_question->content = $data['content-answer-question'];
            $answer_question->point = $data['point'];
            $answer_question->type_user = $data['code_user'];
            $answer_question->content_json = json_encode($answer_question_content_question);
            $answer_question->skill_id = $skill->id;
            $answer_question->level_id = $level_id;
            $answer_question->class_id = $class_id;

            $answer_question->save();
        }

        return Redirect()->route('backend.manager.author.answer-question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_id = $request->all();
        $user = User::whereId($user_id)->with('roles')->first();

        if(count($user) != 1) {
            return response()->json([
                'code' => 404,
                'message' => 'Không tìm thấy người dùng!',
            ]);
        }
        $roles = $user->roles()->get();

        if(!isset($roles)) {
            return response()->json([
                'code' => 404,
                'message' => 'Không thực hiện được hành động này!',
            ]);
        }

        $roles_ids = [];
        foreach ($roles as $rol) {
            $roles_ids[] = $rol->id;
        }

        $user->roles()->detach($roles_ids);
        $user->delete();

        $users = User::with('roles', 'classes')->get();
        return view('backend.users.table-index', compact('users'));

    }
}
