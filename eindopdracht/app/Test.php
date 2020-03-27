<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Test extends Model
{
    use Traits\Encryptable;

    protected $encryptable = [
//        'cijfer',
    ];

    public function course()
    {
        return $this -> hasOne('App\Course', 'id', 'course_id');
    }

    public function tag()
    {
        return $this -> hasOne('App\Tag', 'id', 'tag');
    }

    public function tagName($id)
    {
        return Tag::find($id)->first()->tag;
    }
}
