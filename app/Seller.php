<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name','photo','description'];

    public function seller(){
        return $this->hasMany('App\Categories');
    }
}
