<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - Contact Nous</title>
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
                    <span></span> Contact-Nous
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">


                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="contact-from-area  wow FadeInUp animated">
                                        <h5 class="text-brand mb-10">Contact-Nous</h5>
                                        <p class="text-muted mb-30 font-sm">Votre adresse email ne sera pas publiée. Les champs requis sont indiqués *</p>
                                        <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="name" placeholder="Prénom" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="email" placeholder="Votre e-mail" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="telephone" placeholder="Votre Réléphone" type="tel">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="subject" placeholder="Sujet" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="textarea-style mb-30">
                                                        <textarea name="message" placeholder="Message"></textarea>
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">Envoyer le message</button>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pl-50 d-lg-block d-none">
                                    <img class="border-radius-15 mt-50" src="assets/imgs/page/contact-2.png" alt="">
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
