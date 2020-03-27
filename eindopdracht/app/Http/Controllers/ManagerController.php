<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\Test;
use App\Tag;


class ManagerController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all()->where('version', now()->year);
        $sorted = $tests;
        $completed = $tests;
        switch (request('tag'))
        {
            case "docent":
                $sorted = $tests->sortBy(function($test){
                    return $test->course()->first()->coordinator()->first()->name;
                });
                break;
            case "categorie":
                $sorted = $tests->sortBy("soort");
                break;
            case "tijdstip":
                $sorted = $tests->sortByDesc("deadline");
                break;
            case "module":
                $sorted = $tests->sortBy(function($test){
                    return $test->course()->first()->name;
            });
                break;
            default:
                $sorted = $tests;
                break;
        }

        switch (request('complete')) {
            case "docent":
                $completed = $tests->sortBy(function ($test) {
                    return $test->course()->first()->coordinator()->first()->name;
                });
                break;
            case "categorie":
                $completed = $tests->sortBy("soort");
                break;
            case "tijdstip":
                $completed = $tests->sortByDesc("deadline");
                break;
            case "module":
                $completed = $tests->sortBy(function ($test) {
                    return $test->course()->first()->name;
                });
                break;
            default:
                $completed = $tests;
                break;
        }

        $courses = Course::all();
        $teachers = Teacher::all();

        return view('manager.index', ['courses'=>$courses, 'teachers'=>$teachers, 'tests'=>$tests, 'sorted'=>$sorted, 'completed'=>$completed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);

        $tags = Tag::pluck('tag', 'id');



        return view('manager.edit', ['test'=>$test,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test = Test::find($id);
        $course = Course::find($id);
        $course->tests()->associate($test, 'id', 'version');
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
