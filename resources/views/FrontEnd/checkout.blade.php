<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Kasmi Distribution - Checkout</title>
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
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-12 mb-40">
                    <h1 class="heading-2 mb-10">Checkout</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">Il y a <span class="text-brand">{{ $totalProducts }}</span> produits dans votre Commande</h6>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center">
                <div class="col-lg-8 ">
                    <form id="storeCommande" action="{{ route('commande.store') }}" method="POST">
                        @csrf
                    <div class=" p-20" style="border: 1px rgba(177, 177, 177, 0.363) solid; border-radius:15px;">

                        <h4 style="margin-bottom: 1rem">Client Information</h4>
                        <p style="margin-bottom: 1rem">*S’il y a des renseignements qui ne sont pas inclus, ils seront automatiquement remplis avec les renseignements disponibles. Sinon, vous pouvez le remplir directement ici ou mettre à jour votre profil à partir d’ici.</p>

                        @if(session('errors'))
                        <div class="error-message">
                            @foreach(session('errors')->all() as $error)
                            <p></p>
                            <div class="content-body  alert alert-warning" role="alert">
                                <p class="mb-0">
                                    {{ $error }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div>
                            <div class="form-group">
                                <input type="text" required name="name" placeholder="Nom Complet*" value="{{ old('name', $user->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" required name="adresse" placeholder="Adresse de livraison*" value="{{ old('adresse', $user->adresse?? '') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" required name="telephone" placeholder="Telephone*" value="{{ old('telephone', $user->telephone ?? '') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
                            </div>
                        </div>

                        <hr>

                        <div style="margin-bottom: 1rem;display: flex;justify-content:space-between;align-items:center">
                            <h4 style="">Commandes</h4>
                            <p style="font-size: 1.3rem;font-weight:700">#00002</p>
                        </div>
                        <div class="articles">
                            @php
                            $totalPrice = 0;
                            @endphp
                            @foreach ($checkoutProduct as $index => $product)
                            <div style="display: flex;justify-content:space-between">
                                <div>
                                    <p style="font-size: 1.3rem;" data-variation-id={{ $product['variation'] }} data-product-id={{ $product['productID'] }}>{{ $loop->iteration }}. <span class="text-brand">{{ $product['productName'] }} {{ $product['size'] }}</span>  x <span >{{ $product['quantity'] }}</span></p>
                                </div>
                                <div>
                                    <p style="font-size: 1.3rem;font-weight:600"><span class="subTotal"> €{{ number_format($product['quantity'] * $product['price'], 2, '.', '') }}</span> </p>
                                </div>
                            </div>
                            @php
                            $totalPrice += $product['quantity'] * $product['price'];
                            @endphp
                            @endforeach



                        </div>

                        <div style="margin-top: 1rem;margin-bottom: 1rem">
                            <div style="display: flex;justify-content:end">

                                <div>
                                    Total Commande:<p style="font-size: 1.3rem;font-weight:700"><span class="Total">€{{ number_format($totalPrice, 2, '.', '') }}</span> </p>
                                </div>
                            </div>
                        </div>
<style>
    .action-btn {
  background-color: #FF7F00;
  border: none;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
  padding: 0.5em 1.25em;
  color: white;
  border-radius: 0.15em;
  transition: 0.3s;
  cursor: pointer;
  position: relative;
  display: block;
}

.action-btn:hover {
  background-color: #ff6600;
}

.action-btn:focus {
  outline: 0.05em dashed #ff6600;
  outline-offset: 0.05em;
}

.action-btn::after {
  content: '';
  display: block;
  width: 1.2em;
  height: 1.2em;
  position: absolute;
  left: calc(50% - 0.75em);
  top: calc(50% - 0.75em);
  border: 0.15em solid transparent;
  border-right-color: white;
  border-radius: 50%;
  animation: button-anim 0.7s linear infinite;
  opacity: 0;
}

@keyframes button-anim {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}

.action-btn.loading {
  color: transparent;
}

.action-btn.loading::after {
  opacity: 1;
}

/* em values are used to adjust button values such as padding, radius etc. based on font-size */
</style>

                        <div style="display:flex; justify-content:end;">
                            <a class="action-btn" id="login-btn"><i
                                class="fi-rs-refresh mr-10"></i>Confirmer La Commaned</a>
                        </div>

                    </div>
                </form>
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

<script src="{{ asset('../../../app-assets/js/website/commande.js') }}"></script>
<!-- Mirrored from demosc.chinaz.net/Files/DownLoad/moban/202110/moban5797/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2023 10:20:56 GMT -->

</html>
