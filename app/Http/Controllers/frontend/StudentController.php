<?php

namespace App\Http\Controllers\frontend;

use App\Classes;
use App\User;
use App\Level;

use Auth;
use Route;
use Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $skill_read;
    protected $skill_listen;

    public function __construct()
    {
        $this->skill_read = Config::get('constants.skill.Read');
        $this->skill_listen = Config::get('constants.skill.Listen');
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

        $level = Level::whereId($level_id)->get();
        if(!isset($level)) {
            // noti message
        }

        $class_id = Auth::user()->class_id;

        return view('frontend.student.join-test.index', compact('class_id', 'level'));
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
