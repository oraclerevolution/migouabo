<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['nom','photo','id_seller'];

    public function subCategories(){
        return $this->hasMany('App\SubCategories', 'id_category','id');
    }

}
