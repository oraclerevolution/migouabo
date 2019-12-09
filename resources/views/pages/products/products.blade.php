@extends('layouts.main2')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark"> {{ count($products) }} produits pour la sous catégorie <span class="text-uppercase"> {{$subCategory->name}} </span> </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <a href=" {{ route('sellers.categories.sub-categories.products.create', ['seller'=> $seller->id,
                                                                                            'category'=> $category->id,
                                                                                            'sub_category'=>$subCategory->id]) }} " class="btn btn-primary">Ajouter un produit</a>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        
        <!-- Product Row One -->
        <div class="row">
            @foreach ($products as $product)
                
                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <article class="col-item">
                                    <div class="photo">
                                        <div class="options">
                                            <a href="add-products.html" class="font-18 txt-grey mr-10 pull-left"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="font-18 txt-grey pull-left sa-warning"><i class="zmdi zmdi-close"></i></a>
                                        </div>
                                        
                                        <a href="javascript:void(0);"> <img src="{{asset('public/storage/'.$product->photo )}}" class="img-responsive" alt="Product Image" /> </a>
                                    </div>
                                    <div class="info">
                                        <h6>{{ $product->name }}</h6>
                                        <br>
                                        <a href=" {{ route('sellers.categories.sub-categories.products.show', ['seller'=> $seller->id,
                                                                                                        'category'=> $category->id,
                                                                                                        'sub_category'=>$subCategory->id,
                                                                                                        'product'=>$product->id] ) }} " class="btn btn-primary">détails</a>
                                    </div>
                                </article>
                            </div>
                        </div>	
                    </div>	
                </div>

            @endforeach
        </div>	
        <!-- /Product Row Four -->
        
    </div>
    
    <!-- Footer -->
    <footer class="footer container-fluid pl-30 pr-30">
        <div class="row">
            <div class="col-sm-12">
                <p>2017 &copy; Doodle. Pampered by Hencework</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->
    
</div>
@endsection