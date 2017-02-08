<?php

namespace App\Http\Controllers\frontend;

use App\Classes;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class StudentController extends Controller
{

    public function index()
    {
        $classes = Classes::all();

        return view('frontend.student.index');
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
