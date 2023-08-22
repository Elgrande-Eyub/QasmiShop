<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:21:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - Registre</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    @include('FrontEnd.layout.head')
</head>

<body>
    @include('FrontEnd.layout.navbar')
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Qasmi</a>
                    <span></span> Pages
                    <span></span> Register
                </div>
            </div>
        </div>
        <style>

            .block{
                display: block
            }
            .none{
                display: none
            }
        </style>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">

                                        <div class="heading_s1">
                                            <h1 class="mb-5">Créer un Compte</h1>
                                            <p class="mb-30">Vous avez déjà un compte ? <a href="{{ route('frontlogin') }}">Login</a></p>
                                        </div>
                                        @if(session('message'))
                                        <div class="content-body  alert alert-warning" role="alert">
                                            <p class="mb-0">
                                                {{ session('message') }}
                                            </p>
                                        </div>
                                        @endif
                                        @if(session('success'))
                                        <div class="content-body  alert alert-success" role="alert">
                                            <h4 class="alert-heading">Merci</h4>
                                            <p class="mb-0">
                                                {{ session('success') }}
                                            </p>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('registerQasmi') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required name="name" value="{{ old('name') }}"  placeholder="Nom d'utilisateur">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" required name="email" value="{{ old('email') }}" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" name="password" value="{{ old('password') }}" placeholder="Mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmer le mot de passe">
                                            </div>

                                            <div class="form-group none" id="telephineDiv">
                                                <input  type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone">
                                            </div>

                                            {{-- <input type="checkbox" name="isActive" value="1"> --}}
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="isProfessionel" id="isProfessionel" value="1">
                                                        <label class="form-check-label" for="isProfessionel"><span>Compte Professionnel</span></label>
                                                    </div>
                                                </div>
                                                <a href="#"></i>En savoir plus</a>
                                            </div>


                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Remarque :</strong> Vos données personnelles seront utilisées pour soutenir votre expérience tout au long de ce site Web, pour gérer l’accès à votre compte et à d’autres fins décrites dans notre politique de confidentialité</p>
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

     <!-- footer Start -->
     @include('FrontEnd.layout.footer')
     <!-- Preloader Start -->
     @include('FrontEnd.layout.Preloader')
     <!-- Vendor JS-->
     @include('FrontEnd.layout.javaCall')
            <script>
            $(document).ready(function() {
                var isProfessionelCheckbox = $('#isProfessionel');
                var telephoneDiv = $('#telephineDiv');

                // Initially hide the telephone input
                telephoneDiv.hide();

                isProfessionelCheckbox.on('change', function() {
                    if ($(this).is(':checked')) {
                        // Show the telephone input when checkbox is checked
                        telephoneDiv.show();
                    } else {
                        // Hide the telephone input when checkbox is unchecked
                        telephoneDiv.hide();
                    }
                });
            });
        </script>
</body>


<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:21:28 GMT -->
</html>
