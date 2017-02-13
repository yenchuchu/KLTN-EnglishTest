<?php

namespace App\Http\Controllers\frontend;

use App\BookMap;
use App\Classes;
use App\ExamType;
use App\Http\Controllers\Controller;
use App\Skill;

use App\AnswerQuestion;

use Config;
use DB;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    protected $classes;
    protected $exam_type;
    protected $skills;
    protected $book_maps;
    protected $kind_exam;

    public function __construct()
    {
        $this->classes = Classes::all();
        $this->exam_type = ExamType::all();
        $this->skills = Skill::all();
        $this->book_maps = BookMap::all();

        $this->kind_exam = Config::get('constants.skill');
    }

    public function index()
    {
        $classes = Classes::all();
//        dd($classes);
        return view('dashboard.index');
    }

    public function elementary()
    {
        $classes = $this->classes->filter(function ($class, $key) {
            return $class->code == 1;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = [];
        $kind_exam = $this->kind_exam;

        return view('frontend.teachers.elementary.index',
            compact('classes', 'exam_types', 'skills', 'book_maps', 'kind_exam'));
    }

    public function get_unit_class(Request $requests)
    {
        $all_request = $requests->all();
        $class_id = $all_request['class_id'];

        $book_maps = BookMap::where('class_id', $class_id)->get();

        return view('frontend.teachers.elementary.unit-reload', compact('book_maps'));
    }

    public function get_examtype_skill(Request $requests)
    {
        $all_request = $requests->all();
        $skill_code = $all_request['skill_code'];
        $examtype_skills = $this->kind_exam[$skill_code];

        return view('frontend.teachers.elementary.examtype-skill-reload', compact('examtype_skills'));
    }

    public function store(Request $request)
    {
        $request_all = $request->all();
        $class_id = $request_all['class_id'];
        $exam_type_id = $request_all['exam_type_id'];
        $code_user = $request_all['code_user'];
        $examtype_skills = $request_all['examtype_skills'];

        if (!isset($request_all['skill_id'])) {
            $skill_id = null;
        } else {
            $skill_id = $request_all['skill_id'];
        }

        if (!isset($request_all['book_map_id'])) {
            $book_map_id = null;
        } else {
            $book_map_id = $request_all['book_map_id'];
        }

        $record_model = [];
        foreach ($examtype_skills as $item) {
            var_dump($item);
            var_dump($class_id);
            var_dump($skill_id);
            var_dump($exam_type_id);
            var_dump($book_map_id);

            $record_model[$item] = DB::table($item)->where(['class_id' => $class_id, 'type_user' => $code_user,
                'skill_id' => $skill_id, 'exam_type_id' => $exam_type_id])
                ->whereIn('bookmap_id', $book_map_id)->get();
            dd($record_model);
        }

        dd($record_model);
    }

    public function secondary()
    {
        $classes = $this->classes->filter(function ($class, $key) {
            return $class->code == 2;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = $this->book_maps;

        return view('frontend.teachers.secondary.index', compact('classes', 'exam_types', 'skills', 'book_maps'));
    }

    public function highschool()
    {
        $classes = $this->classes->filter(function ($class, $key) {
            return $class->code == 3;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = $this->book_maps;

        return view('frontend.teachers.highschool.index', compact('classes', 'exam_types', 'skills', 'book_maps'));
    }

}
