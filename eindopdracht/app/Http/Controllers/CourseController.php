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
        return view('course.index', ['course'=>$course, 'teacher'=>$teacher]);
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
        return redirect()->route('course.index')->with('success', 'Vak succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $course = Course::find($id);
        $teacher = Teacher::find($course->coordinator);
        return view('course.show', ['course'=>$course, 'teacher'=>$teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $course = Course::find($id);
        $teachers = Teacher::pluck('name', 'id')->all();
        return view('course.edit', ['course'=>$course, 'teachers'=>$teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'omschrijving' => 'required',
            'coordinator' => 'required',
        ]);
        $course = Course::find($id);
        $course->coordinator = $request->input('coordinator');
        $course->update($request->all());
        return redirect()->route('course.index')->with('success', 'Vak succesvol aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Course::find($id)->delete();
        return redirect()->route('course.index')->with('success', 'Vak succesvol verwijderd');

    }
}
