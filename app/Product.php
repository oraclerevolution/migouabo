<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subCategories(){
        return $this->belongsTo('App\SubCategories','id_sub_category');
    }
}
