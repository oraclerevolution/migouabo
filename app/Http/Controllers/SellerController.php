<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;

class SellerController extends Controller
{
    public function display(){

        $sellers=Seller::all();
        return view('pages.sellers.vendeuses')->withSellers($sellers);
    }

    public function create(){
        return view('pages.sellers.add-vendeuse');
    }

    public function store(){
        $seller_name=request('seller_name');
        $description=request('description');

        Seller::create([
            'name'=>$seller_name,
            'photo'=>'a picture',
            'description'=>$description
        ]);
        
        return view('pages.sellers.vendeuses');
    }
}

