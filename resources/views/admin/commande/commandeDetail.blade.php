<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    @include('admin.layout.head')

    <title>Commande Management</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('admin.layout.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('admin.layout.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
       {{--  <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">

                            <h2 class="content-header-title float-left mb-0">Commandes</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('commande.index') }}">Commandes</a>
                                    </li>
                                    <li class="breadcrumb-item active">Commande #{{ $commande->orderNumber }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button
                                class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a
                                    class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- invoice functionality start -->

                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img width="30%"
                                        src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v3.png') }}"
                                        alt="company logo">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h1>Commande</h1>
                                <div class="invoice-details mt-2">
                                    <h6>Statu De la Commande</h6>

                                    @if ($commande->status === 'En attente')
                                        <div class="chip chip-warning">
                                        @elseif($commande->status === 'En cours de livraison')
                                            <div class="chip chip-info">
                                            @elseif($commande->status === 'Livré')
                                                <div class="chip chip-success">
                                                @elseif($commande->status === 'Annulé')
                                                    <div class="chip chip-danger">
                                                    @elseif($commande->status === 'Retourné')
                                                        <div class="chip chip-secondary">
                                    @endif
                                    <div class="chip-body">
                                        @if ($commande->status === 'Retourné')
                                            <div class="chip-text" style="  text-decoration: line-through;">
                                                {{ $commande->status }}</div>
                                        @else
                                            <div class="chip-text">{{ $commande->status }}</div>
                                        @endif
                                    </div>
                                </div>
                                <h6>Statu de Paiement</h6>
                                @if ($commande->payment_status === 'Non payé')
                                    <div class="chip chip-warning">
                                    @elseif ($commande->payment_status === 'Payé')
                                        <div class="chip chip-success">
                                        @elseif ($commande->payment_status === 'Remboursé')
                                            <div class="chip chip-secondary">
                                            @elseif ($commande->payment_status === 'Annulé')
                                                <div class="chip chip-danger">
                                @endif
                                <div class="chip-body">
                                    @if ($commande->payment_status === 'Remboursé')
                                        <div class="chip-text" style="  text-decoration: line-through;">
                                            {{ $commande->payment_status }}</div>
                                    @else
                                        <div class="chip-text">{{ $commande->payment_status }}</div>
                                    @endif

                                </div>
                            </div>


                            <h6>Numero de Commande</h6>
                            <p>{{ $commande->orderNumber }}</p>
                            <h6 class="mt-2">Date de Commande</h6>
                            <p>{{ $commande->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-12 col-12 text-left">
                    <h6 class="mt-2">Information de CLient : </h6>
                    <div class="recipient-contact pb-2">
                        <p>
                            <i class="feather icon-user-check"></i>
                            {{ $commande->name }}
                        </p>
                        <p>
                            <i class="feather  icon-map-pin"></i>
                            {{ $commande->shipping_address }}
                        </p>
                        <p>
                            <i class="feather icon-mail"></i>
                            {{ $commande->email }}
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            {{ $commande->telephone }}
                        </p>
                    </div>
                </div>

            </div>

            <div id="invoice-items-details" class="pt-1 invoice-items-table">
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-borderless" style="border: solid 1px rgba(126, 126, 126, 0.095)">
                            <thead>
                                <tr>
                                    <th>Produits</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande->articles as $produit)
                                    <tr>
                                        <td><a target="blank"
                                                href="{{ route('product', ['id' => $produit->produit_id]) }}">{{ $produit->name }}</a>
                                        </td>
                                        <td>{{ $produit->quantity }} QTE</td>
                                        <td>{{ number_format($produit->subTotal, 2, '.', '') }}€</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="invoice-total-details" class="invoice-total-table">
                <div class="row">
                    <div class="col-7 offset-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td>{{ number_format($commande->total, 2, '.', '') }}€</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div> --}}

        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-12 mb-md-0 mb-4">
                  <div class="card invoice-preview-card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                        <div class="mb-xl-0 ">
                          <div class="d-flex svg-illustration  gap-2 align-items-center">
                            <img width="35%"
                            src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v2.png') }}"
                            alt="company logo">


                          </div>

                        </div>
                        <div>
                          <h4 class="fw-semibold mb-1">Commande #{{ $commande->orderNumber }}</h4>
                          <div class=" ">
                            <span>Date:</span>
                            <span class="fw-semibold">{{ $commande->created_at->format('d M Y') }}</span>
                          </div>
                          <div class=" pt-1">
                            <span>Status:</span>
                            <span class="fw-semibold">
                                @if ($commande->status === 'En attente')
                                <div class="chip chip-warning">
                                @elseif($commande->status === 'En cours de livraison')
                                    <div class="chip chip-info">
                                    @elseif($commande->status === 'Livré')
                                        <div class="chip chip-success">
                                        @elseif($commande->status === 'Annulé')
                                            <div class="chip chip-danger">
                                            @elseif($commande->status === 'Retourné')
                                                <div class="chip chip-secondary">
                            @endif
                            <div class="chip-body">
                                @if ($commande->status === 'Retourné')
                                    <div class="chip-text" style="  text-decoration: line-through;">
                                        {{ $commande->status }}</div>
                                @else
                                    <div class="chip-text">{{ $commande->status }}</div>
                                @endif
                            </div>
                        </span>
                          </div>
                          <div class="mb-2 pt-1">
                            <span>Paiement:</span>
                            <span class="fw-semibold">
                                  @if ($commande->payment_status === 'Non payé')
                                <div class="chip chip-warning">
                                @elseif ($commande->payment_status === 'Payé')
                                    <div class="chip chip-success">
                                    @elseif ($commande->payment_status === 'Remboursé')
                                        <div class="chip chip-secondary">
                                        @elseif ($commande->payment_status === 'Annulé')
                                            <div class="chip chip-danger">
                            @endif
                            <div class="chip-body">
                                @if ($commande->payment_status === 'Remboursé')
                                    <div class="chip-text" style="  text-decoration: line-through;">
                                        {{ $commande->payment_status }}</div>
                                @else
                                    <div class="chip-text">{{ $commande->payment_status }}</div>
                                @endif

                            </div>
                        </div></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                      <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-2 mb-sm-0 mb-2">
                          <h6 class="mb-3">Commande de :</h6>
                          <p class="mb-1">{{ $commande->name }}</p>
                          <p class="mb-1">{{ $commande->shipping_address }}</p>
                          <p class="mb-1">{{ $commande->telephone }}</p>
                          <p class="mb-0">{{ $commande->email }}</p>
                        </div>
                    {{--     <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                          <h6 class="mb-4">Bill To:</h6>
                          <table>
                            <tbody>
                              <tr>
                                <td class="pe-4">Total Due:</td>
                                <td><strong>$12,110.55</strong></td>
                              </tr>
                              <tr>
                                <td class="pe-4">Bank name:</td>
                                <td>American Bank</td>
                              </tr>
                              <tr>
                                <td class="pe-4">Country:</td>
                                <td>United States</td>
                              </tr>
                              <tr>
                                <td class="pe-4">IBAN:</td>
                                <td>ETD95476213874685</td>
                              </tr>
                              <tr>
                                <td class="pe-4">SWIFT code:</td>
                                <td>BR91905</td>
                              </tr>
                            </tbody>
                          </table>
                        </div> --}}
                      </div>
                    </div>
                    <div class="table-responsive border-top">
                      <table class="table m-0">
                        <thead>
                          <tr>
                            <th>Item</th>
                            <th>Size</th>
                            <th>Prix Unitaire</th>
                            <th>Qty</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($commande->articles as $produit)


                            <tr>
                                <td class="text-nowrap"><a style="color: #FF9F43" target="blank"
                                    href="{{ route('product', ['id' => $produit->produit_id]) }}">{{ $produit->name }}</a></td>
                                 <td class="text-nowrap">{{ $produit->size_name }}</td>
                                <td>€{{ number_format(($produit->subTotal/$produit->quantity), 2, '.', '') }}</td>
                                <td>{{ $produit->quantity }}</td>
                                <td>€{{ number_format($produit->subTotal, 2, '.', '') }}</td>
                              </tr>
                        @endforeach

                          <tr>
                            <td colspan="3" class="align-top px-4 py-4">
                              <p class="mb-2 mt-3">
                                <span class="ms-3">Merci pour votre Commande</span>
                              </p>

                            </td>
                            <td class="text-end pe-3 py-4">

                              <p class="mb-0 pb-3">Total:</p>
                            </td>
                            <td class="ps-2 py-4">

                              <p class="fw-semibold mb-0 pb-3">€{{ number_format($commande->total, 2, '.', '') }}</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>


                  </div>
                </div>
                <!-- /Invoice -->


              </div>



            </div>
            <!-- / Content -->


        </section>
        <!-- invoice page end -->

    </div>
    </div>
    </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->

    @include('admin.layout.footer')
    <!-- END: Footer-->
    @include('admin.layout.jsCall')

    <script src="../../../app-assets/js/admin/commande/commande.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>

</body>
<!-- END: Body-->

</html>
