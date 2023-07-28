<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    @include('admin.layout.head')


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>List Produit | Qasmi Dashboard</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">List Produits</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Produits</a>
                                    </li>
                                    <li class="breadcrumb-item active">List Produits
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    {{-- <th>POPULARITY</th> --}}
                                    <th>Visible Status</th>
                                    <th>PRIX</th>
                                    <th>STOCK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($produits as $produit)
                                    <tr>
                                        <td></td>
                                        <td class="product-name">{{ $produit->name }}</td>
                                        <td class="product-category">{{ $produit->categorie }}</td>

                                        <td>
                                            <div class="chip chip-{{ $produit->isPublic ? 'success' : 'error' }}">
                                                <div class="chip-body">
                                                    <div class="chip-text">

                                                        @if ($produit->isPublic == 1)
                                                            Visible
                                                        @else
                                                            Invisible
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price">{{ $produit->price }} DHs</td>
                                        <td class="product-price">{{ $produit->stock }}</td>

                                        <td class="product-action">
                                            <a href="{{ route('editProduit', ['id' =>  $produit->id]) }}" class="edit-produit" data-record-id="{{ $produit->id }}"><button type="button"
                                                    class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"><i
                                                        class="feather icon-edit"></i></button></a>


                                            <a  class="delete-produit" data-record-id="{{ $produit->id }}"><button type="button"
                                                    class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light "><i
                                                        class="feather icon-trash-2"></i></button></a>



                                            <div class="content-header-right ">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i
                                                            class="feather icon-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($produit->isPublic == 1)
                                                            <a class="dropdown-item isPublic" data-record-id="{{ $produit->id }}">Hide</a>
                                                        @else
                                                            <a class="dropdown-item isPublic" data-record-id="{{ $produit->id }}">Show</a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->

    @include('admin.layout.footer')
    <!-- END: Footer-->
    @include('admin.layout.jsCall')


    <script src="../../../app-assets/js/admin/produit/listProduit.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
</body>
<!-- END: Body-->

</html>
