<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','photo','price','description','status','discount','id_sub_category'];

    public function subCategories(){
        return $this->belongsTo('App\SubCategories');
    }
}
