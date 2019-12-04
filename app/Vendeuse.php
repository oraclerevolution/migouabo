<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendeuse extends Model
{
     public function vendeuse()
    {
        return $this->hasMany('App\Categorie');
    }

}
