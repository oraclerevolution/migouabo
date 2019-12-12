<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\ProductRequest;
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
    public function store(ProductRequest $request)
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
    public function show($id_seller, $id_category, $id_subCategory, $id_product)
    {
        
        $product = DB::table('products')
                    ->join('sub_categories', 'sub_categories.id', '=', 'products.id_sub_category')
                    ->join('categories', 'categories.id', '=', 'sub_categories.id_category')
                    ->join('sellers', 'categories.id_seller', '=', 'sellers.id')
                    ->select('products.*',
                            'sub_categories.name AS subCategoryName', 'sub_categories.id AS subCategoryId',
                            'categories.name AS categoryName', 'categories.id AS categoryId',
                            'sellers.name AS sellerName', 'sellers.id AS sellerId',)
                    ->where('products.id','=',$id_product)
                    ->first();

        return  view('pages.products.detailsProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_seller, $id_category, $id_subCategory, $id_product)
    {
        $sub_categories=SubCategories::all();
        $product = DB::table('products')
                    ->join('sub_categories', 'sub_categories.id', '=', 'products.id_sub_category')
                    ->join('categories', 'categories.id', '=', 'sub_categories.id_category')
                    ->join('sellers', 'categories.id_seller', '=', 'sellers.id')
                    ->select('products.*',
                            'sub_categories.name AS subCategoryName', 'sub_categories.id AS subCategoryId',
                            'categories.name AS categoryName', 'categories.id AS categoryId',
                            'sellers.name AS sellerName', 'sellers.id AS sellerId',)
                    ->where('products.id','=',$id_product)
                    ->first();

        return view('pages.products.editProduct', compact('sub_categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id_seller, $id_category, $id_subCategory, $id_product)
    {
        $name_product=request('name');
        $description_product=request('description');
        $sub_category=request('subCategory');
        $stock_product=request('stock');
        $price_product=request('price');
        $status_product=request('stock');
        $discount_product=request('discount');
        $photo_product=request('photo');

        Product::where('id', $id_product)
                ->update(['name'=>$name_product,
                        'photo' => request()->photo->store('', 'public'),
                        'price'=>$price_product,
                        'description'=>$description_product,
                        'status'=>$status_product,
                        'discount'=>$discount_product,
                        'id_sub_category'=>$sub_category
                        ]);
        return redirect()->route('sellers.categories.sub-categories.products.show', ['seller'=>$id_seller, 'category'=>$id_category,
                                                                                    'sub_category'=>$id_subCategory, 'product'=>$id_product
                                                                                    ]);
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
