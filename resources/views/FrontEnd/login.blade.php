<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - login</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

   @include('FrontEnd.layout.head')
</head>

<body>
    @include('FrontEnd.layout.navbar')
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="assets/imgs/page/login-1.png" alt="">
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Connexion</h1>
                                            <p class="mb-30">Vous n’avez pas de compte ? <a href="{{ route('getRegisterQasmi') }}">Créer ici</a></p>
                                        </div>
                                  {{--       @if(Session::has('activeAccount'))
                                        <div class="  d-lg-block alert alert-danger  alert-validation-msg" role="alert">
                                            <i class="feather icon-info mr-1 align-middle"></i>
                                            <span>{{ $activeAccount }}</span>
                                        </div>

                                        @endif --}}

                                        @if(session('message'))
                                        <div class="content-body  alert alert-warning" role="alert">

                                            <p class="mb-0">
                                                {{ session('message') }}
                                            </p>
                                        </div>
                                        @endif

                                        <form method="POST" action="{{ route('userLogin') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" :value="old('email')"  name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="mot de pass">
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" name="remember"  type="checkbox" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label"  for="exampleCheckbox1"><span>se souvenir de moi</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Mot de passe oublié?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Connexion</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('FrontEnd.layout.footer')
    <!-- Preloader Start -->
    @include('FrontEnd.layout.Preloader')
    <!-- Vendor JS-->
    @include('FrontEnd.layout.javaCall')
</body>


<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:21:27 GMT -->
</html>
