@extends('layouts.main2')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Modifier une categorie</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index.html"> {{ $product->sellerName }} </a></li>
                <li><a href="#"><span> {{ $product->categoryName }} </span></a></li>
                <li><a href="#"><span> {{ $product->subCategoryName }} </span></a></li>
                <li class="active"><span>ajouter un produit</span></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form action=" {{route('sellers.categories.sub-categories.products.update', ['seller'=>$product->sellerId,
                                                                                                            'category'=>$product->categoryId,
                                                                                                            'sub_category'=>$product->id,
                                                                                                            'product'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    {{ csrf_field() }}
                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Ajouter un nouveau produit</h6>
                                    <hr class="light-grey-hr"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="control-label mb-10">Nom du produit</label>
                                            <input value="{{ $product->name }}" type="text" name="name" class="form-control" placeholder="Fruits">
                                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                <label for="description" class="control-label mb-10">Description</label>
                                                <input value=" {{ $product->description }} " type="text" id="description" name="description" class="form-control" placeholder="azerty qsdfgh wxcvbn">
                                                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Sous categorie</label>
                                                <select name="subCategory" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    @foreach ($sub_categories as $subCategory)
                                                        <option value=" {{ $subCategory->id }} "> {{ $subCategory->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                                                <label class="control-label mb-10">Statut</label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" @if ($product->status==0) {{ 'checked' }} @else {{ '' }} @endif 
                                                                    name="stock" id="radio1" value="0">
                                                            <label for="radio1">En stock</label>
                                                        </div>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" @if ($product->status==1) {{ 'checked' }} @else {{ '' }} @endif name="stock" id="radio2" value="1">
                                                            <label for="radio2">Stock epuisé</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! $errors->first('stock', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                                <label for="price" class="control-label mb-10">Prix</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">Fcfa</div>
                                                    <input value="{{ $product->price }}" type="text" name="price" class="form-control" id="price" placeholder="1500 fcfa">
                                                </div>
                                                {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
                                                <label for="discount" class="control-label mb-10">Solde</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input value=" {{ $product->discount }} " type="text" class="form-control" id="discount" value="0" name="discount" placeholder="0%">
                                                </div>
                                                {!! $errors->first('discount', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    
                                    <!--/row-->
                                    
                                    <div class="seprator-block"></div>
                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>charger image</h6>
                                    <hr class="light-grey-hr"/>
                                    <div class="row">
                                    <div class="col-lg-12 {{ $errors->has('photo') ? 'has-error' : '' }}">
                                            <div class="img-upload-wrap">
                                                <img class="img-responsive" src="{{asset('public/storage/'.$product->photo )}}" style="height:200px;" alt="upload_img"> 
                                            </div>
                                            <div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Upload a new image</span>
                                                <input type="file" class="upload" name="photo">
                                            </div>
                                            {!! $errors->first('photo', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    
                                    <hr class="light-grey-hr"/>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>Modifier</span></button>
                                        <button type="button" class="btn btn-warning pull-left">Annuler</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

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