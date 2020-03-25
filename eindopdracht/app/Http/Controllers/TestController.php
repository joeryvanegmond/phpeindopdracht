<?php

namespace App\Http\Controllers;

use App\Rules\CorrectGrade;
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
        $tests = Course::find($id)->tests();
        $duplicates = Course::find($id)->tests()->whereYear('version', '=', now()->year)->count();
//        dd($duplicates);
        return view('test.index', ['courseName'=>$courseName, 'tests'=>$tests, 'duplicates'=>$duplicates, 'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *  @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $tags = Tag::pluck('tag', 'id');
        $date = now();
        $tests = Course::find($id)->tests()->where('version', now()->year);

        return view('test.create', ['tags'=>$tags, 'id'=>$id,'date'=>$date, 'tests'=>$tests]);
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
        ]);

                $test = new Test();
//                dd($test);
                $test->id = $request->input('id');
                $test->version = $request->input('version');
                $test->cijfer = $request->input('cijfer');
                $test->save();

                return redirect()->route('course.index')->with('success', 'Toets succesvol aangemaakt');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //TODO: find test by version not by ID.
        Test::find($id)->delete();
        return redirect()->route('course.index')->with('success', 'Toets succesvol verwijderd');
    }
}
