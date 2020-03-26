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

    public function tests()
    {
        return $this -> hasMany('\App\Test','course_id', 'id');
    }
}
