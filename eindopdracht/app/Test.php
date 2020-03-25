<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use Traits\Encryptable;

//    protected $primaryKey = ['id'];
//    public $incrementing = 'true';

    protected $encryptable = [
//        'cijfer',
    ];

    public function course()
    {
        return $this -> hasOne('App\Course', 'id', 'id');
    }

    public function tag()
    {
        return $this -> hasOne('App\Tag', 'tag', 'tag');
    }
}
