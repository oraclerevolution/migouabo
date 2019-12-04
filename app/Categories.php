<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['name','photo','description','id_seller'];

    public function subCategories(){
        return $this->hasMany('App\SubCategories');
    }

    public function seller(){
        return $this->belongsTo('App\¨Seller');
    }

}
