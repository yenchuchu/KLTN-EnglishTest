<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Item;
use App\Level;
use App\Skill;
use App\User;
use App\UserSkill;

use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Http\Request;
use Route;
use Session;

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

    public function redirectToTest(Request $request)
    {
//        $request_all =$request->all();
        $this->url_parameters = Route::getCurrentRoute()->parameters();
        $level_id = $this->url_parameters['level_id'];
        $user = Auth::user();
        $user_id = $user->id;

        $level_chosen = Level::whereId($level_id)->first();

        if (!isset($level)) {
            // noti message
        }

        $class_id = Auth::user()->class_id;
        $levels = Level::all();

        $skills = $user->user_skills()->get();

        // kiểm tra lượt thi đã tồn tại hay chưa ( được lưu ở bảng Items).
        $check_exist_item = Item::where(['user_id' => $user_id, 'level_id' => $level_id])->get();
        if (count($check_exist_item) == 0) {

            $max_code = $this->getMaxCodeTest($skills);

            // Lấy kết quả lần thi gần đây nhất.
            $filter_skills = $skills->filter(function ($skill) use ($user_id, $max_code) {
                $test_id = $user_id . '_' . $max_code;

                return $skill->user_id == $user_id && $skill->test_id == $test_id;
            });

            // lấy điểm của từng kỹ năng. so sánh, kỹ năng nào có điểm thấp hơn thì cho nhiều bài tập hơn.
            // nếu chưa có phần thi nào => số bài của 2 kĩ năng = nhau.

            $skill_json = [];
            foreach ($filter_skills as $diff) {
                $de_json = json_decode($diff->skill_json);

                foreach ($de_json as $de) {
                    $code_skill = Skill::select('code')->whereId($de->skill_id)->first();
                    $skill_json[$code_skill->code] = $de->point;
                }
            }

            if ($skill_json['Read'] > $skill_json['Listen']) {
                $type_exam_read = $this->skill_read;
                $random_type_read = array_rand($type_exam_read, 1);
                $check_read = 'read';

                $type_exam_listen = $this->skill_listen;
                $random_type_listen = array_rand($type_exam_listen, 3);

            } else {
                if ($skill_json['Listen'] > $skill_json['Read']) {
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
            }

            $items = [];
            $items['listen'][] = '';
            $items['read'][] = '';

            if (!isset($check_listen)) {
                // listen chỉ có 1 dạng bài.

            } else {

            }

            var_dump($random_type_read);
            if (!isset($check_read)) {
                foreach ($random_type_read as $read) {
                    $read_table = DB::table($read)
                        ->where(['class_id' => $class_id, 'type_user' => $this->code_student, 'level_id' => $level_id])
                        ->get()->toArray();

                    if (count($read_table) != 0) {
                        $max = count($read_table) - 1;
                        $rand = rand(0, $max);

                        $read_table[$rand]->table = $read;
                        $items['read'][] = $read_table[$rand];

                    }
                }
            } else {
                // read chỉ có 1 dạng bài.
                $read_table = DB::table($random_type_read)
                    ->where(['class_id' => $class_id, 'type_user' => $this->code_student, 'level_id' => $level_id])
                    ->get()->toArray();

                if (count($read_table) != 0) {
                    $max = count($read_table) - 1;
                    $rand = rand(0, $max);

                    $items['read']['tables'][] = $random_type_read;
                    $items['read'][] = $read_table[$rand];
                }
            }

            $noti_not_complete = 0;
        } elseif (count($check_exist_item) == 1) {
            $noti_not_complete = 1;
            $items_old = Item::where([
                'user_id' => $user_id,
                'level_id' => $level_id
            ])->get();

            $items = [];
            foreach ($items_old as $item) {
                $json_decode_answer = json_decode($item->update_json_answer);
            }

            foreach ($json_decode_answer as $skill => $ans) {

                foreach ($ans as $table => $tb) {
                    $find = DB::table($table)->where([
                        'id' => $tb[0]->id_record
                    ])->first();

                    if($find == null) {
                        Session::flash('message', 'Không thực hiện được hành động này!');

                        return redirect()->route('frontend.dashboard.student.index');
                    }

                    $find->table = $table;
                    foreach ($tb as $t) {
                        $find->old_answer[$t->id_question] = [
                            'id_question' => $t->id_question,
                            'answer_student' => $t->answer_student
                        ];
                    }

                    $items[$skill][$tb[0]->order] = $find;
                }
            }

        }

//        dd($items);

        return view('frontend.student.join-test.index',
            compact('class_id', 'level_chosen', 'levels', 'items', 'random_type_listen', 'random_type_read', 'noti_not_complete'));
    }

    public function hanglingResult(Request $request)
    {
        $requets_all = $request->all();

        $array_tables = collect($requets_all['list_answer'])->pluck('name_table');
        $table_all = array_unique($array_tables->toArray());

        foreach ($requets_all['list_answer'] as $ans) {

            if($ans['skill_name'] == 'read') {
                foreach ($table_all as $table) {
                    if ($ans['name_table'] == $table) {

                        if(!isset($ans['answer_student'])) {
                            $ans['answer_student'] = '';
                        }

                        $data = [
                            'order' => $ans['number_title'], // số thứ tự của bài đang test. ( bài 1 bài 2)
                          'id_record' => $ans['id_record'],
                          'id_question' => $ans['id_question'],
                          'answer_student' => $ans['answer_student']
                        ];
                        $json_answer['read'][$table][] = $data;
                    }
                }
            } else if($ans['skill_name'] == 'listen') {
                foreach ($table_all as $table) {
                    if ($ans['name_table'] == $table) {

                        if(!isset($ans['answer_student'])) {
                            $ans['answer_student'] = '';
                        }

                        $data = [
                            'order' => $ans['number_title'], // số thứ tự của bài đang test. ( bài 1 bài 2)
                            'id_record' => $ans['id_record'],
                            'id_question' => $ans['id_question'],
                            'answer_student' => $ans['answer_student']
                        ];
                        $json_answer['listen'][$table][] = $data;
                    }
                }
            }

        }

        $json_answer_encode = json_encode($json_answer);
        $user_id = Auth::user()->id;
        $level_id = $requets_all['level_id'];
//        $time = $requets_all['time'];
        $time = 2700;
        if ($time == 3600) {
            $done = 1;
            // gọi hàm đối chiếu đáp án & tính điểm
//            checkAnswer();
        } else {
            if ($time < 3600) {
                $done = 0;
            }
        }

        $check_item_exist = Item::where(['user_id' => $user_id, 'level_id' => $level_id])->get();
        if ($done == 0) {
            if (count($check_item_exist) == 0) {
                $items = new Item();

                $items->level_id = $level_id;
                $items->user_id = $user_id;
                $items->time = Carbon::now();
                $items->update_json_answer = $json_answer_encode;

                $items->save();
            } else {
//                dd($check_item_exist);
                $data = [
                    'time' => Carbon::now(),
                    'update_json_answer' => $json_answer_encode
                ];
//                $check_item_exist->time = Carbon::now();
//                $check_item_exist->update_json_answer = $json_answer_encode;

//                $check_item_exist->save();

                Item::where([
                    'user_id' => $user_id,
                    'level_id' => $level_id])
                    ->update($data);
            }
        } else {
            $add_user_skill = new UserSkill();

            $user = User::find($user_id);

            // lấy số lần đã thi của user
            $skills = $user->user_skills()->get();
            $max_code = $this->getMaxCodeTest($skills) + 1;
            $test_id = $user_id."_".$max_code;

            $add_user_skill->user_id = $user_id;
            $add_user_skill->level_id = $level_id;
            $add_user_skill->status = 1;
            $add_user_skill->test_id = $test_id;

            $add_user_skill->skill_json = 'lấy kết quả skill_id, point từ hàm đối chiếu kquar khi done =1';

            deleteItems($check_item_exist);
        }

    }

    // xoas 1 item trong bang Items
    public function deleteItems($check_item_exist) {
        $check_item_exist->delete();
    }

    // xoas 1 item trong bang Items khi ajax goi restart.
    public function restartDeleteItem(Request $request) {
        $request_all = $request->all();

        $check_item_exist = Item::where(['user_id' => Auth::user()->id, 'level_id' => $request_all['level_id']]);

        if(count($check_item_exist) == 0 ) {
            return response()->json([
                'code'    => 404,
                'message' => 'Bài làm trước đó chưa tồn tại!',
            ]);
        }

        $check_item_exist->delete();

        if($check_item_exist == true) {
            return response()->json([
                'code'    => 200,
                'message' => '',
            ]);
        } else {
            return response()->json([
                'code'    => 404,
                'message' => 'Không thực hiện được hành động này!',
            ]);
        }
    }

    // lấy lượt thi gần đây nhất của học sinh.
    public function getMaxCodeTest($skills) {
        $all_code_test = [];
        $max_code = 1;
        foreach ($skills as $key => $skill) {
            $test_id = $skill->test_id;
            $max_test_id = explode('_', $test_id);
            $all_code_test[] = $max_test_id[1];
            $max_code = max($all_code_test);
        }

        return $max_code;
    }

    // tạo code ( test_id) cho lượt thi của học sinh
    public function create_code_test_id($max_code, $user_id) {
        $code = $user_id."_".$max_code;

        return $code;
    }

    public function ShowTest()
    {

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
