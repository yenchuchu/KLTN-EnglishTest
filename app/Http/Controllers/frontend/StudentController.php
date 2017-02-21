<?php

namespace App\Http\Controllers\frontend;

use App\Classes;
use App\Skill;
use App\User;
use App\Level;
use App\UserSkill;

use Auth;
use Route;
use Config;
use DB;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $skill_read;
    protected $skill_listen;
    protected $code_student;

    public function __construct()
    {
        $this->skill_read = Config::get('constants.skill.Read');
        $this->skill_listen = Config::get('constants.skill.Listen');
        $this->code_student = 'ST';
    }

    public function index()
    {
        $class_id = Auth::user()->class_id;
        $levels = Level::all();

        return view('frontend.student.index', compact('class_id', 'levels'));
    }

    public function redirectToTest() {
        $this->url_parameters = Route::getCurrentRoute()->parameters();
        $level_id = $this->url_parameters['level_id'];
        $user = Auth::user();
        $user_id = $user->id;

        $level_chosen = Level::whereId($level_id)->first();

        if(!isset($level)) {
            // noti message
        }

        $class_id = Auth::user()->class_id;
        $levels = Level::all();

        $skills = $user->user_skills()->get();

        $all_code_test = [];
        $max_code = 1;
        foreach ($skills as $key => $skill) {
            $test_id = $skill->test_id;
            $max_test_id = explode('_', $test_id);
            $all_code_test[] = $max_test_id[1];
            $max_code = max($all_code_test);
        }

        // Lấy kết quả lần thi gần đây nhất.
        $filter_skills =  $skills->filter(function ($skill) use ($user_id, $max_code) {
            $test_id = $user_id.'_'.$max_code;

            return $skill->user_id == $user_id && $skill->test_id == $test_id;
        });

        // lấy điểm của từng kỹ năng. so sánh, kỹ năng nào có điểm thấp hơn thì cho nhiều bài tập hơn.
        // nếu chưa có phần thi nào => số bài của 2 kĩ năng = nhau.

        $skill_json = [];
        foreach ($filter_skills as $diff) {
            $de_json = json_decode($diff->skill_json);

            $code_skill = Skill::select('code')->whereId($de_json->role_id)->first();
            $skill_json[$code_skill->code] = $de_json->point;
        }

        if($skill_json['Read'] > $skill_json['Listen']) {
            $type_exam_read = $this->skill_read;
            $random_type_read = array_rand($type_exam_read, 1);
            $check_read = 'read';

            $type_exam_listen = $this->skill_listen;
            $random_type_listen = array_rand($type_exam_listen, 3);

        } else if($skill_json['Listen'] > $skill_json['Read']) {
            $type_exam_read = $this->skill_read;
            $random_type_read = array_rand($type_exam_read, 3);

            $type_exam_listen = $this->skill_listen;
            $random_type_listen = array_rand($type_exam_listen, 1);
            $check_listen = 'listen';

        } else {
            $type_exam_read = $this->skill_read;
            $random_type_read = array_rand($type_exam_read, 2);

            $type_exam_listen = $this->skill_listen;
            $random_type_listen = array_rand($type_exam_listen, 2);
        }

        $items = [];
        $items['listen'][] = '';
        $items['read'][] = '';

        if (!isset($check_listen)) {
            // listen chỉ có 1 dạng bài.

        } else {

        }

        if (!isset($check_read)) {
            foreach ($random_type_read as $read) {
                $read_table = DB::table($read)
                    ->where(['class_id' => $class_id, 'type_user' =>  $this->code_student, 'level_id' => $level_id])
                    ->get()->toArray();

                if(count($read_table) != 0) {
                    $max = count($read_table) - 1;
                    $rand = rand(0, $max);

//                    foreach ($read_table[$rand] as $record) {
//                        dd($record['content_json']);
//                        $record->content_json = json_decode();
//                    }
//dd($read_table[$rand]);
                    $items['read'][] = $read_table[$rand];

                }
            }
        } else {
            // read chỉ có 1 dạng bài.
            $read_table = DB::table($random_type_read)
                ->where(['class_id' => $class_id, 'type_user' =>  $this->code_student, 'level_id' => $level_id])
                ->get()->toArray();

            if(count($read_table) != 0) {
                $max = count($read_table) - 1;
                $rand = rand(0, $max);

//                foreach ($read_table[$rand] as $record) {
//                    dd($record['content_json']);
//                        $record->content_json = json_decode();
//                }
//                dd($read_table[$rand]);

                $items['read'][] = $read_table[$rand];
            }
        }

//        dd($items);

        // class, level, user_id_auth, => join user_skill.

        return view('frontend.student.join-test.index', compact('class_id', 'level_chosen', 'levels', 'items'));
    }

    public function ShowTest() {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

        dd($id);
    }
}
