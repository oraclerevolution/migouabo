@extends('layouts.main2')

@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
        <!-- Product Row One -->
        
                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <article class="col-item">
                                    <div class="photo">
                                        <div class="options">
                                            <a href=" {{ route('sellers.categories.sub-categories.products.edit', ['seller'=>$product->sellerId,
                                                                                                                    'category'=>$product->categoryId,
                                                                                                                    'sub_category'=>$product->subCategoryId,
                                                                                                                    'product'=>$product->id ]) }} " 
                                                class="font-18 txt-grey mr-10 pull-left"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="font-18 txt-grey pull-left sa-warning"><i class="zmdi zmdi-close"></i></a>
                                        </div>
                                        
                                        <a href="javascript:void(0);"> <img src="{{asset('public/storage/'.$product->photo )}}" class="img-responsive" alt="Product Image" /> </a>
                                    </div>
                                    <div class="info text-center">
                                        <h6>{{ $product->name }}</h6>
                                        <br>
                                        <a href=" " class="btn btn-primary"> {{ $product->price }} Fcfa </a>
                                    </div>
                                </article>
                            </div>
                        </div>	
                    </div>	
                </div>

                <div class="col-lg-2 col-md-8 col-sm-8 col-xs-6">
                    <p> <strong >Desription :</strong> {{ $product->description }} </p>
                    <p> <strong> Sous-categorie : </strong> {{ $product->subCategoryName }} </p>
                    <p> <strong> categorie : </strong> {{ $product->categoryName }} </p>
                    <p> <strong> Vendeuse : </strong> {{ $product->sellerName }} </p>
                    <p> <strong> disponibilité : </strong> @if ($product->status==0)
                                                                <button class="btn btn-success"> En stock</button>
                                                            @else
                                                                <button class="btn btn-danger"> Stock épuisé</button>
                                                            @endif
                    </p>

                </div>
        </div>
    </div>

@endsection