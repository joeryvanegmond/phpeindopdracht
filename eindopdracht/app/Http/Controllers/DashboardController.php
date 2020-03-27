<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $periods = [1,2,3,4];
        $blocks = [1,2,3,4];
        $blockCounter = 1;
        $studypoints = 0;

        $modules = Course::all();
        return view('dashboard.index', ['modules'=>$modules, 'periods'=>$periods, 'blocks'=>$blocks, 'blockCounter'=>$blockCounter, 'studyPoints'=>$studypoints]);
    }
}
