<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'omschrijving'];
    protected $dates = ['created_at','updatet_at'];

    public function teachers()
    {
        return $this -> belongsToMany(Teacher::class);
    }

    public function coordinator()
    {
        return $this -> hasOne('App\Teacher','id', 'coordinator');
    }

    public function tests()
    {
        return $this -> hasMany('\App\Test','course_id', 'id');
    }

    public function totalPointsInBlock($period)
    {
        $totalPoints = 0;
        foreach (Course::all()->where('periode', '=', $period) as $course) {
            $totalPoints =+ $course->studiepunten;
        }
        return $totalPoints;
    }

    public function earnedPoints($period)
    {
        $earnedPoints = 0;
        foreach (Course::all()->where('periode', '=', $period) as $course) {
            foreach($course->tests()->get() as $test)
            {
                if ($test->cijfer > 5)
                {
                    $earnedPoints =+ $course->studiepunten;
                }
            }
        }
        return $earnedPoints;
    }

    public function totalPoints()
    {
        $totalPoints = 0;
        foreach (Course::all() as $course) {
            $totalPoints =+ $course->studiepunten;
        }
        return $totalPoints;
    }

    public function totalEarnedPoints()
    {
        $totalPoints = 0;
        foreach (Course::all() as $course) {
            foreach($course->tests()->get() as $test)
            {
                if ($test->cijfer > 5)
                {
                    $totalPoints =+ $course->studiepunten;
                }
            }
        }
        return $totalPoints;
    }
}
