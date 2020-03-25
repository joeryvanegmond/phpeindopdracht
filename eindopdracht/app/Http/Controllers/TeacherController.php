<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Course;

use Illuminate\Http\Request;

class  TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::all();
        $course = Course::all();
        return view('teacher.index', ['course'=>$course, 'teacher'=>$teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('teacher.create', [
            'courses' => $courses,
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
            'name'=>'required|string',
            'lastname' => 'required|string',
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->infix = $request->input('infix');
        $teacher->lastname = $request->input('lastname');
        $teacher->save();
        $teacher->courses()->attach($request->course_array);
        return redirect()->route('admin')->with('success', 'Docent succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $teacher = Teacher::find($id);
        $courses = Course::all();
        $selectedCourses = $teacher->courses()->where('teacher_id', $id)->get();
        return view('teacher.show', ['selectedCourses'=>$selectedCourses, 'teacher'=>$teacher, 'courses'=>$courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $teacher = Teacher::find($id);
        $courses = Course::all();
        return view('teacher.edit', ['courses'=>$courses, 'teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'lastname' => 'required|string',
        ]);
        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name');
        $teacher->infix = $request->input('infix');
        $teacher->lastname = $request->input('lastname');
        $teacher->save();

//        $teacher->update($request->all());
        $teacher->courses()->sync($request->course_array);
//        dd($request);

        return redirect()->route('admin')->with('success', 'Docent succesvol aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Teacher::find($id)->delete();
        return redirect()->route('admin')->with('success', 'Vak succesvol verwijderd');
    }
}
