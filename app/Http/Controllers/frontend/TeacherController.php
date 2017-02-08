<?php

namespace App\Http\Controllers\frontend;

use App\Classes;
use App\ExamType;
use App\BookMap;
use App\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class TeacherController extends Controller
{

    protected $classes;
    protected $exam_type;
    protected $skills;
    protected $book_maps;

    public function __construct()
    {
        $this->classes = Classes::all();
        $this->exam_type = ExamType::all();
        $this->skills = Skill::all();
        $this->book_maps = BookMap::all();

    }

    public function index()
    {
        return view('frontend.student.index');
    }

    public function elementary()
    {
        $classes = $this->classes->filter(function($class,$key){
            return $class->code == 1;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = $this->book_maps;

        return view('frontend.elementary.index', compact('classes', 'exam_types', 'skills', 'book_maps'));
    }

    public function secondary()
    {
        $classes = $this->classes->filter(function($class,$key){
            return $class->code == 2;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = $this->book_maps;

        return view('frontend.secondary.index', compact('classes', 'exam_types', 'skills', 'book_maps'));
    }

    public function highschool()
    {
        $classes = $this->classes->filter(function($class,$key){
            return $class->code == 3;
        });
        $exam_types = $this->exam_type;
        $skills = $this->skills;
        $book_maps = $this->book_maps;

        return view('frontend.highschool.index', compact('classes', 'exam_types', 'skills', 'book_maps'));
    }

}
