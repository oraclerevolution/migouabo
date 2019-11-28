<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Seller;

class CategoriesController extends Controller
{
    public function display(){
        return view('pages.categories.categories');
    }

    public function create(){
        $sellers=Seller::all();
        return view('pages.categories.add-categorie')->withSellers($sellers);
    }

    public function store(){
        dd('reza');
    }
}
