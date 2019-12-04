<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
use App\Seller;
use App\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_seller, $id_category, $id_subCategory)
    {
        $seller=Seller::where('id', $id_seller)->first();
        $category=Categories::where('id',$id_category)->first();
        $subCategory=SubCategories::where('id', $id_subCategory)->first();

        $products=Product::where('id_sub_category', $id_subCategory)->get();
        return view('pages.products.products', compact('seller','category','subCategory','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_seller, $id_category, $id_subCategory)
    {
        $seller=Seller::where('id', $id_seller)->first();
        $category=Categories::where('id', $id_category)->first();
        $subCategory=SubCategories::where('id', $id_subCategory)->first();
        return view('pages.products.add-product', compact('seller','category','subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_name=request('name');
        $description=request('description');
        $id_subCategory=request('subCategory');
        $status=request('stock');
        $price=request('price');
        $discount=request('discount');
        
        
        Product::create([


            'name'=>$product_name,
            'photo' => request()->photo->store('', 'public'),
            'price'=>request('price'),
            'description'=>$description,
            'status'=>$status,
            'discount'=>$discount,
            'id_sub_category'=>$id_subCategory
        ]);
        
        $subCategory=SubCategories::where('id', $id_subCategory)->first();
        
        $id_category=$subCategory->id_category;
        $category=Categories::where('id', $id_category)->first();

        $id_seller=$category->id_seller;
        $seller=Seller::where('id', $id_seller)->first();

        $products=Product::where('id_sub_category',$id_subCategory )->get();
        
        return view('pages.products.products', compact('seller','category','subCategory','products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('qu\'est ce qui se passe');
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
