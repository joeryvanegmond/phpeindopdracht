<?php

namespace App\Http\Controllers;

use App\Course;
use App\Teacher;
use Illuminate\Http\Request;
use function Sodium\add;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        $teacher = Teacher::all();
//        $teacherName = array();
//        foreach ($teacher as $key => $value)
//        {
//            $tempTeacher = array_search($value->name, $teacher);
////                $teacher->find($value->coordinator);
////            array_push($teacherName, $tempTeacher);
//        }
//        dd($tempTeacher);
        return view('course.index', ['course'=>$course, 'teacher'=>$teacher]);
//        return view('course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::pluck('name', 'id')->all();
        return view('course.create', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'omschrijving'=>'required',
            'coordinator' => 'required',
            ]);
        $course = new Course();
        $course->name = $request->input('name');
        $course->omschrijving = $request->input('omschrijving');
        $course->coordinator = $request->input('coordinator');
        $course->save();
//        dd($request);
        return redirect()->route('course.index')->with('success', 'Vak succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
