<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - Accueil</title>
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
    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock">
                                    Sale Off
                                </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of
                                        Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price  font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('FrontEnd.layout.navbar')
    <!--End header-->
    <main class="main">
        <section class="home-slider style-2 position-relative mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="home-slide-cover">
                            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                                <div class="single-hero-slider single-animation-wrap"
                                    style="background-image: url(assets/imgs/slider/slider-3.png);">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">Pure Coffe<br> Big discount</h1>
                                        <p class="mb-65">Save up to 50% off on your first order</p>
                                        <form class="form-subcriber d-flex">
                                            <input type="email" placeholder="Your emaill address">
                                            <button class="btn" type="submit">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="single-hero-slider single-animation-wrap"
                                    style="background-image: url(assets/imgs/slider/slider-4.png);">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">Snacks box<br> daily save</h1>
                                        <p class="mb-65">Sign up for the daily newsletter</p>
                                        <form class="form-subcriber d-flex">
                                            <input type="email" placeholder="Your emaill address">
                                            <button class="btn" type="submit">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-arrow hero-slider-1-arrow"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-xl-block">
                        <div class="banner-img style-3 wow fadeIn animated animated animated">
                            <div class="banner-text mt-50">
                                <h2 class="mb-50">Delivered <br> to <span class="text-brand">your<br> home</span>
                                </h2>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-1.png" alt="">
                            <div class="banner-text">
                                <h4>Everyday Fresh & <br>Clean with Our<br> Products</h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-2.png" alt="">
                            <div class="banner-text">
                                <h4>Make your Breakfast<br> Healthy and Easy</h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="assets/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <h4>The best Organic <br>Products Online</h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="container">
                <div class="section-title style-2">
                    <h3>Produits Populaires</h3>

                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @php
                                        $counter=0;
                                    @endphp
                            @foreach ($mergedProducts as $product)
                                @if ($counter < 5)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 product"
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

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
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
                                    @php
                                        $counter++;
                                    @endphp
                                @else
                                @break
                            @endif
                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn"
                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                            Red Rice11</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">500g</span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$28.85</span>
                                            <span class="old-price">$32.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--En tab seven-->
                    </div>
                    <!--End tab-content-->
                </div>
    </section>

    <!--End Deals-->
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated">Top Selling</h4>
                    <div class="product-list-small wow fadeIn animated animated animated">
                        @php
                        shuffle($mergedProducts);
                        $counter=0;
                    @endphp
            @foreach ($mergedProducts as $product)
                @if ($counter < 3)
                <article class="row align-items-center hover-up">
                    <figure class="col-md-4 mb-0">
                        <a href="{{ route('product', ['id' => $product->id]) }}"><img src="{{ asset($product->image) }}"
                                alt=""></a>
                    </figure>
                    <div class="col-md-8 mb-0">
                        <h6>
                            <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                        </h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.5)</span>
                        </div>
                        @if(auth()->check() && auth()->user()->role === "professional")

                                                    <div class="product-price">
                                                        <span>€{{ $product->variation['grossitePrice']}} </span>

                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span>€{{$product->variation['comparedPrice']}} </span>
                                                        <span class="old-price">€{{ $product->variation['price'] }} </span>
                                                    </div>
                                                    @endif

                    </div>
                </article>
                    @php
                        $counter++;
                    @endphp
                @else
                @break
            @endif
        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated">Trending
                        Products</h4>
                    <div class="product-list-small wow fadeIn animated animated animated">
                        @php
                        shuffle($mergedProducts);
                        $counter=0;
                    @endphp
            @foreach ($mergedProducts as $product)
                @if ($counter < 3)
                <article class="row align-items-center hover-up">
                    <figure class="col-md-4 mb-0">
                        <a href="{{ route('product', ['id' => $product->id]) }}"><img src="{{ asset($product->image) }}"
                                alt=""></a>
                    </figure>
                    <div class="col-md-8 mb-0">
                        <h6>
                            <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                        </h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.5)</span>
                        </div>
                        @if(auth()->check() && auth()->user()->role === "professional")

                                                    <div class="product-price">
                                                        <span>€{{ $product->variation['grossitePrice']}} </span>

                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span>€{{$product->variation['comparedPrice']}} </span>
                                                        <span class="old-price">€{{ $product->variation['price'] }} </span>
                                                    </div>
                                                    @endif

                    </div>
                </article>
                    @php
                        $counter++;
                    @endphp
                @else
                @break
            @endif
        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated">Recently added
                    </h4>
                    <div class="product-list-small wow fadeIn animated animated animated">
                        @php
                        shuffle($mergedProducts);
                        $counter=0;
                    @endphp
            @foreach ($mergedProducts as $product)
                @if ($counter < 3)
                <article class="row align-items-center hover-up">
                    <figure class="col-md-4 mb-0">
                        <a href="{{ route('product', ['id' => $product->id]) }}"><img src="{{ asset($product->image) }}"
                                alt=""></a>
                    </figure>
                    <div class="col-md-8 mb-0">
                        <h6>
                            <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                        </h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.5)</span>
                        </div>
                        @if(auth()->check() && auth()->user()->role === "professional")

                                                    <div class="product-price">
                                                        <span>€{{ $product->variation['grossitePrice']}} </span>

                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span>€{{$product->variation['comparedPrice']}} </span>
                                                        <span class="old-price">€{{ $product->variation['price'] }} </span>
                                                    </div>
                                                    @endif

                    </div>
                </article>
                    @php
                        $counter++;
                    @endphp
                @else
                @break
            @endif
        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated">Top Rated</h4>
                    <div class="product-list-small wow fadeIn animated animated animated">

                        @php
                        shuffle($mergedProducts);
                        $counter=0;
                    @endphp
            @foreach ($mergedProducts as $product)
                @if ($counter < 3)
                <article class="row align-items-center hover-up">
                    <figure class="col-md-4 mb-0">
                        <a href="{{ route('product', ['id' => $product->id]) }}"><img src="{{ asset($product->image) }}"
                                alt=""></a>
                    </figure>
                    <div class="col-md-8 mb-0">
                        <h6>
                            <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                        </h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.5)</span>
                        </div>
                        @if(auth()->check() && auth()->user()->role === "professional")

                                                    <div class="product-price">
                                                        <span>€{{ $product->variation['grossitePrice']}} </span>

                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span>€{{$product->variation['comparedPrice']}} </span>
                                                        <span class="old-price">€{{ $product->variation['price'] }} </span>
                                                    </div>
                                                    @endif

                    </div>
                </article>
                    @php
                        $counter++;
                    @endphp
                @else
                @break
            @endif
        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End 4 columns-->
    <section class="popular-categories section-padding">
        <div class="container wow fadeIn animated">
            <div class="section-title">
                <div class="title">
                    <h3>Achat par Catégories </h3>
                    {{-- <a class="show-all" href="shop-grid-right.html">
                        All Categories
                        <i class="fi-rs-angle-right"></i>
                    </a> --}}
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                    id="carausel-8-columns-arrows"></div>
            </div>
            <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">


                    @foreach ($categories as $index => $categorie)
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="{{ route('categorieView',['id'=> $categorie->id]) }}"><img src="assets/imgs/theme/icons/category-1.svg" alt=""></a>
                        </figure>
                        <h6><a href="{{ route('categorieView',['id'=> $categorie->id]) }}">{{ $categorie->categorie }}</a></h6>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

</main>

@include('FrontEnd.layout.footer')
<!-- Preloader Start -->
@include('FrontEnd.layout.Preloader')
<!-- Vendor JS-->
@include('FrontEnd.layout.javaCall')

<script src="{{ asset('../../../app-assets/js/website/indexPage.js') }}"></script>
</body>


</html>
