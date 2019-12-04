<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     public function sous_categorie()
    {
        return $this->hasMany('App\SousCategorie');
    }

     public function vendeuse()
    {
        return $this->belongsTo('App\Vendeuse');
    }


}
