<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $req)
    {
        $keyword = $req->input('keyword');
        $query = \App\Student::query();

        if(!empty($keyword)){
            $query->where('email','like','%'.$keyword.'%');
            $query->orWhere('name','like','%'.$keyword.'%');
        }
        $students = $query->orderBy('id','desc')->paginate(10);
        return view('student.all')->with('students',$students)->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    public function confirm(\App\Http\Requests\CheckStudentRequest $req)
    {
        $data = $req->all();
        return view('student.confirm')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $student = new Student;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->tel = $req->tel;
        $student->save();
        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show')->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $req->name;
        $student->email = $req->email;
        $student->tel = $req->tel;
        $student->save();
        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Student::find($id);
        $user->delete();
        return redirect()->to('/');
    }
}
