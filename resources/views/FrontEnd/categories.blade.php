<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:20:56 GMT -->

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    @include('FrontEnd.layout.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    @include('FrontEnd.layout.navbar')

    <!--End header-->
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">{{ $cateogie->categorie }}</h1>
                            <div class="breadcrumb">
                                <a href="{{ route('index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                                <span></span> Categories
                                <span></span> {{ $cateogie->categorie }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Nous avons trouvé <strong class="text-brand">{{ $productCounter }}</strong> Articles pour vous!</p>
                        </div>

                    </div>
                    <div class="row product-grid">

                        <!--end product card-->
                        @foreach ($mergedProducts as $product)

                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6"
                            data-product-id="{{ $product->id }}">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product', ['id' => $product->id]) }}">
                                            <img class="default-img" src="{{ asset($product->image) }}"
                                                alt="">
                                            {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt=""> --}}
                                        </a>
                                    </div>


                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $product->categorie }}</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">{{ $product->name }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">{{ $product->variation['name'] }}</span>
                                    </div>
                                    <div class="product-card-bottom">
                                        @if(auth()->check() && auth()->user()->role === "professional")
                                        <div class="product-price">
                                            <span>€{{ $product->variation['grossitePrice']}}</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>€{{ $product->variation['comparedPrice'] }}</span>
                                            <span class="old-price">€{{ $product->variation['price'] }}</span>
                                        </div>
                                        @endif

                                        <div class="add-cart">

                                            <a class="addToCartButton"
                                                data-product-id="{{ $product->id }}"
                                                data-variation-id="{{  $product->variation['id']  }}"
                                                href="#"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Preloader Start -->
    @include('FrontEnd.layout.footer')
    <!-- Preloader Start -->
    @include('FrontEnd.layout.Preloader')
    <!-- Vendor JS-->
    @include('FrontEnd.layout.javaCall')
</body>

<script src="{{ asset('../../../app-assets/js/website/indexPage.js') }}"></script>

</html>
