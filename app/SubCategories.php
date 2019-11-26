<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    public function categories(){
        return $this->belongsTo('App\Categories','id_category');
    }

    public function product(){
        return $this->hasMany('App\Product','id_sub_category','id');
    }
}
