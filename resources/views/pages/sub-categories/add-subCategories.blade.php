@extends('layouts.main2')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">ajouter une categorie</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>e-commerce</span></a></li>
                <li class="active"><span>ajouter une categorie</span></li>
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
                                <form action=" {{ route('sellers.categories.sub-categories.store', [ 'seller'=>$seller->id,
                                                                                                    'category'=>$category->id] ) }}
                                                                                                    " method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Ajouter une nouvelle catégorie</h6>
                                    <hr class="light-grey-hr"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
                                                <label class="control-label mb-10">Nom de la sous catégorie</label>
                                                <input type="text" name="name" class="form-control" placeholder="Fruits">
                                                {{ $errors->first('name','<span class="help-block">:message</span>' ) }}
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                <label for="description" class="control-label mb-10">Description</label>
                                                <input type="text" id="description" name="description" class="form-control" placeholder="Description de la sous catégorie">
                                                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Catégorie</label>
                                                <select name="category" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    
                                                        
                                                        <option value=" {{ $category->id }} "> {{ $category->name }} </option>

                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="seprator-block"></div>
                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>charger image</h6>
                                    <hr class="light-grey-hr"/>
                                    <div class="row">
                                    <div class="col-lg-12 {{ $errors->has('photo') ? 'has-error' : '' }}">
                                            <div class="img-upload-wrap">
                                                <img class="img-responsive" src="{{asset('public/tests/dist/img/chair.jpg')}}" alt="upload_img"> 
                                            </div>
                                            <div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Upload a new image</span>
                                                <input type="file" name="photo" id="photo" class="upload">
                                            </div>
                                            {!! $errors->first('photo','<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    
                                    <hr class="light-grey-hr"/>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>Ajouter</span></button>
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