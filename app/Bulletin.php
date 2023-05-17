<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    public $table = 'bulletin';
    public $timestamps = false;


public function hasLevel(){

    return $this->hasOne('App\Level', 'id', 'level');

}


}
