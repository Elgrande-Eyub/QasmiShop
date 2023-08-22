<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:20:56 GMT -->

<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - Cart</title>
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
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                    <span></span> Panier
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-12 mb-40">
                    <h1 class="heading-2 mb-10">Votre Panier</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">Il y a <span class="text-brand">{{ $count }}</span> Produits dans
                            Votre Panier</h6>
                        <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Vider le panier</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                    </th>
                                    <th scope="col" colspan="2">Produit</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Prix Unitaire</th>
                                    <th scope="col">Quantity</th>
                                     <th scope="col">Sous-Total</th>
                                    <th scope="col" class="end">Supprimer</th>
                                </tr>
                            </thead>
                            <form action="#" method="POST">
                                @csrf
                                <tbody>
                                    @foreach ($mergedProducts as $index => $product)
                                    @php
                                    $index = $loop->index;
                                    @endphp
                                        <tr data-cart-id="{{ $product->cartID }}">
                                            <td class="custome-checkbox pl-30">
                                                <input class="form-check-input" type="checkbox"
                                                name="selectedProduct[]" id="{{'selectedProduct'. $index }}"
                                                value="{{ $product->product_id }}">
                                              <label class="form-check-label" for="{{'selectedProduct'. $index }}"></label>

                                            </td>
                                            <td class="image product-thumbnail pt-40">
                                                <img src="{{ asset($product->image) }}" alt="#">
                                            </td>
                                            <td class="product-des product-name">
                                                <h6 class="mb-5">
                                                    <a class="product-name mb-10 text-heading nameProduct"
                                                        href="{{ route('product',['id' => $product->product_id]) }}">{{ $product->name }}</a>
                                                </h6>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width:90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                            </td>
                                            <td class="price" data-title="Price">
                                                <h4 class="text-body size" data-variation-id="{{ $product->variation_id }}" >{{ $product->sizeName }}</h4>
                                            </td>
                                            <td class="price comparedPrice" data-title="Price">
                                                @if ( session('role') === 'professional')
                                                <h4 class="text-body">{{ $product->grossitePrice }}</h4>
                                                @else
                                                <h4 class="text-body">{{ $product->comparedPrice }}</h4>
                                                @endif

                                            </td>
                                            <td class="text-center detail-info" data-title="Stock">
                                                <div class="detail-extralink mr-15">
                                                    <div class="detail-qty border radius">
                                                        <a href="#" class="qty-down updateQte" data-cart-id="{{ $product->cartID }}" data-item-id="{{ $product->itemID }}"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val quantity">{{ $product->quantity }}</span>
                                                        <a href="#" class="qty-up updateQte" data-cart-id="{{ $product->cartID }}" data-item-id="{{ $product->itemID }}"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>

                                                </div>
                                            </td>
                                             <td class="price " data-title="Price">
                                                <h4 class="text-brand totalSingle">
                                                    @if ( session('role') === 'professional')

                                                    €{{  number_format(($product->grossitePrice * $product->quantity), 2, '.', '') }}</h4>
                                                    @else
                                                    €{{  number_format(($product->comparedPrice * $product->quantity), 2, '.', '') }}</h4>
                                                    @endif

                                            </td>
                                            <td class="action text-center" data-title="Remove">
                                                <a class="delete-cart" data-cart-id="{{ $product->cartID }}" data-item-id="{{ $product->itemID }}" class="text-body"><i class="fi-rs-trash"></i></a>
                                          </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <button type="submit" class="btn btn-primary">Create Order</button> --}}
                            </form>

                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn mr-10 mb-sm-15" href="{{ route('index') }}"><i class="fi-rs-arrow-left mr-10"></i>continuer vos achats</a>
                        <a class="btn  mr-10 mb-sm-15" id="proceedToCheckout" ><i class="fi-rs-refresh mr-10"></i>procéder au paiement</a>
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

<script src="{{ asset('../../../app-assets/js/website/shopCart.js') }}"></script>
<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:20:56 GMT -->

</html>
