<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
     public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

     public function produit()
    {
        return $this->hasMany('App\Produit');
    }


}
