<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tests()
    {
        return $this -> hasMany('App\Test', 'tag', 'tag');
    }
}
