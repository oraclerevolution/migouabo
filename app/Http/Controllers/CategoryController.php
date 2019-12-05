<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\CategoryRequest;
use App\Categories;
use App\Seller;
//use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$categories=DB::table('categories')->where('id_seller','=',$id);
        /*$categories = DB::table('categories')
                    ->join('sellers', 'categories.id_seller', '=', 'sellers.id')
                    ->select('categories.*', 'sellers.*')
                    ->where('categories.id_seller','=',$id)
                    ->get();*/
        $sellers=Seller::where('id',$id)
                        ->first();
        $categories=Categories::where('id_seller', $id)
                                ->get();
        
        return view('pages.categories.categories', compact('categories','sellers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sellers=Seller::where('id', $id)
                        ->first();
        return view('pages.categories.add-categorie')->withSellers($sellers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category_name=request('name');
        $description=request('description');
        $seller=request('seller');
        
        
        Categories::create([


            'name'=>$category_name,
            'photo' => request()->photo->store('', 'public'),
            'description'=>$description,
            'id_seller'=>$seller
        ]);
        
        $sellers=Seller::where('id', $seller)
                        ->first();
        $categories=Categories::where('id_seller', $seller)
                                ->get();
        return view('pages.categories.categories', compact('categories','sellers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
