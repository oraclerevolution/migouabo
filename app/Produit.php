<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
     public function sousCategorie()
    {
        return $this->belongsTo('App\SousCategorie');
    }

}
