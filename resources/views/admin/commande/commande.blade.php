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
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">List Commandes</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Qasmi</a>
                                    </li>

                                    <li class="breadcrumb-item active">Commandes
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
                                    <td></td>
                                    <th>Commande</th>
                                    <th>Order Number</th>
                                    <th>Nom Client</th>
                                    <th>Telephone</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>

                                    <th>Total Commande</th>


                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandes as $index => $commande)
                                    <tr >
                                        <input class="rowID" type="hidden" value="{{ $commande->id }}" id="rowId"
                                            name="rowId">

                                        <td></td>
                                        <th>#{{ $loop->index + 1}}</th>
                                        <td class="commandeID">#{{ $commande->orderNumber }}</td>
                                        <td class="commandeName">{{ $commande->name }}</td>
                                        <td class="commandeTelephone">{{ $commande->telephone }}</td>

                                        <td class="commandestatus" >
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


                    </td>




                    <td class="commandePaymentStatus" >
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

                    </td>



                    <td class="commandetotal">{{ $commande->total }} Dhs</td>

                    <td class="product-action">
                        <a href="{{ route('commande.show', ['commande' => $commande->id] )}}" class=" edit-button"><button type="button"
                                class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"><i
                                    class="feather icon-corner-up-left"></i></button></a>
                        <a class=" delete-button"><button type="button"
                                class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light "><i
                                    class="feather icon-trash-2"></i></button></a>

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

    <script src="../../../app-assets/js/admin/commande/commande.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>

</body>
<!-- END: Body-->

</html>
