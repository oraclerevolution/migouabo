<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
use App\Seller;
use App\Product;
use Illuminate\Support\Facades\DB;
class NavMenuController extends Controller
{
    public function seller(){
        
        $sellers=Seller::all();
        return view('pages.sellers.vendeuses', compact('sellers'));
    }

    public function category(){
        $categories = DB::table('categories')
                    ->join('sellers', 'categories.id_seller', '=', 'sellers.id')
                    ->select('categories.*', 'sellers.name AS sellerName')
                    ->get();

            return view('pages.categories.allCategories', compact('categories'));
    }

    public function command(){
        
        return view('pages.commands.pending-commandes');
    }
}

