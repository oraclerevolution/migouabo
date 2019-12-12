@extends('layouts.main2')

@section('content')
<div class="wrapper pa-0">
    <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
            <a href="index.html">
                <img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
                <span class="brand-text">MIGOUABO</span>
            </a>
        </div>
        <div class="clearfix"></div>
    </header>
    
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Connectez à l'administration de MIGOUABO</h3>
                                    <h6 class="text-center nonecase-font txt-grey">Entrez vos identifiants ci-dessous</h6>
                                </div>	
                                <div class="form-wrap">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Adresse email</label>
                                            <input type="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Entrez votre email ici">
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Mot de passe</label>
                                            <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">Mot de passe oublié ?</a>
                                            <div class="clearfix"></div>
                                            <input type="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Entrez votre mot de passe">
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pr-10 pull-left">
                                                <input id="checkbox_2" required="" type="checkbox">
                                                <label for="checkbox_2">Garder ma session active</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">Connexion</button>
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
        
    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- Footer -->
<footer class="footer container-fluid pl-30 pr-30">
    <div class="row">
        <div class="col-sm-12">
            <p>2019 &copy; MIGOUABO. Developpé par MIGOUABO DEV GROUP</p>
        </div>
    </div>
</footer>
<!-- /Footer -->
@endsection