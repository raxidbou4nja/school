<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //

    protected $fillable = ['mark', 'bulletin_id', 'subject_id'];


    public function subject(){

        return $this->hasOne('App\Subject', 'id' , 'subject_id');

    }

    public $timestamps = false;
}
