<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
use App\Seller;
Use App\Http\Requests\SubCategoryRequest;
use Illuminate\Support\Facades\DB;

class subCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_seller, $id_category)
    {
        $seller=Seller::where('id', $id_seller)->first();
        $category=Categories::where('id', $id_category)->first();
        $subCategories=SubCategories::where('id_category', $id_category)->get();

        return view('pages.sub-categories.subCategories', compact('seller','category','subCategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_seller, $id_category)
    {
        $seller=Seller::where('id', $id_seller)->first();
        $category=Categories::where('id', $id_category)->first();

        return view('pages.sub-categories.add-subCategories', compact('seller','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $subCategory_name=request('name');
        $description=request('description');
        $id_category=request('category');
        
        
        subCategories::create([


            'name'=>$subCategory_name,
            'photo' => request()->photo->store('', 'public'),
            'description'=>$description,
            'id_category'=>$id_category
        ]);
        
        /*$seller=Seller::where('id', $seller)
                        ->first();*/
        $category=Categories::where('id', $id_category)
                                ->first();
        $id_seller=$category->id_seller;
        $seller=Seller::where('id', $id_seller)->first();
        $subCategories=SubCategories::where('id_category', $id_category)->get();
        return view('pages.sub-categories.subCategories', compact('seller','category','subCategories'));
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
