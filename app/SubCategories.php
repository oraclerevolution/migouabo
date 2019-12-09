<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{

    protected $fillable=['name','photo','description','id_category'];

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }
}
