<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Traits\Encryptable;

    protected $encryptable = [
        'infix',
        'lastname',
    ];

    public function courses()
    {
        return $this -> belongsToMany(Course::class)->withTimestamps();
    }



}
