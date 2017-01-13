<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public $timestamps = false;
    public function genres()
    {
      return $this->belongsToMany('App\Genre');
    }
}
