<?php

namespace App\Http\Controllers;

use App\Rules\CorrectGrade;
use App\Teacher;
use App\Test;
use App\Course;
use App\Tag;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $courseName = Course::find($id)->name;
        $tests = Test::where('course_id', '=', $id)->get();
        $duplicates = Course::find($id)->tests()->whereYear('version', '=', now()->year)->count();
        return view('test.index', ['courseName'=>$courseName, 'tests'=>$tests, 'duplicates'=>$duplicates, 'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *  @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $date = now();
        $tests = Course::find($id)->tests()->where('version', now()->year);

        return view('test.create', ['id'=>$id,'date'=>$date, 'tests'=>$tests]);
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
            'cijfer'=>new CorrectGrade,
            'soort'=>'required',
        ]);
                $test = new Test();
                $test->version = $request->input('version');
                $test->cijfer = $request->input('cijfer');
                $test->soort = $request->input('soort');
                $test->course_id = $request->input('id');
                $test->completed = '0';
                $test->save();

                return redirect()->route('admin')->with('success', 'Toets succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $courseName = Course::find($id)->name;
        $tests = Course::all();
//        return view('test.show', ['courseName'=>$courseName, 'tests'=>$tests, 'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $test = Test::find($id);

        return view('test.edit', ['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $test = Test::find($id);
        $completed = Test::all()->where('completed','=', '0');
        switch ($request->type)
        {
            case "deadline":
                $this->validate($request, [
                    'deadline'=>'required|date|after:today',
                ]);
                $test->deadline = $request->input('deadline');
                $test->tag = $request->input('tag');
                $test->completed = $request->input('completed');
                $test->save();
                $courses = Course::all();
                $teachers = Teacher::all();
                $tests = Test::all()->where('version', now()->year);

                return redirect("manager");
            case "test":
                $this->validate($request, [
                    'cijfer'=>new CorrectGrade,
                    'soort'=>'required',
                ]);

                $test->cijfer = $request->input('cijfer');
                $test->soort = $request->input('soort');
                $test->save();

                $courseName = Course::find($test->course_id)->name;
                $tests = Test::where('course_id', '=', $test->course_id)->get();
                $duplicates = Course::find($test->course_id)->tests()->whereYear('version', '=', now()->year)->count();
                return view('test.index', ['courseName'=>$courseName, 'tests'=>$tests, 'duplicates'=>$duplicates, 'id'=>$id])->with('success', 'Toets succesvol aangepast');
            default:
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Test::find($id)->delete();
        return redirect()->route('admin')->with('success', 'Toets succesvol verwijderd');
    }
}
