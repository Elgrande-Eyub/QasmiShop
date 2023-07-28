<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    @include('admin.layout.head')


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Secteur Management</title>
        <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

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
                            <h2 class="content-header-title float-left mb-0">List Secteur</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Produits</a>
                                    </li>
                                    <li class="breadcrumb-item active">Secteur
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
                                    <th>Secteur
                                    </th>


                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody >
                                    @foreach ($secteurs as $secteur)
                                    <tr>
                                        <input class="rowID" type="hidden" value="{{ $secteur->id }}" id="rowId" name="rowId">

                                        <td></td>
                                        <td class="secteurName">{{ $secteur->secteur }}</td>

                                        <td class="product-action">
                                            <a class=" edit-button"><button type="button" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-edit"></i></button></a>
                                            <a class=" delete-button"><button type="button"  class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light "><i class="feather icon-trash-2"></i></button></a>


                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar ">
                        <div>

                          <div class="overlay-bg"></div>
                          <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                              <div>
                                <h4 class="text-uppercase Title">Ajoute un secteur</h4>
                              </div>
                              <div class="hide-data-sidebar">
                                <i class="feather icon-x"></i>
                              </div>
                            </div>
                            <div class="data-items pb-3">

                              <div class="data-fields px-2 mt-3">
                                <div class="row">
                                  <div class="col-sm-12 data-field-col">
                                    <label class="secteurLabel" for="secteur">Nom de Secteur</label>
                                    <input type="text" class="form-control secteurInput" >
                                  </div>


                                </div>
                              </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                              <div class="add-data-btn">
                                <button  class="btn btn-primary submitData" >Ajoute Le Secteur</button>
                              </div>
                              <div class="cancel-data-btn">
                                <button type="reset" class="btn btn-outline-danger">Annule</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- add new sidebar ends -->
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

    <script src="../../../app-assets/js/admin/Secteur/secteur.js"></script>
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>

</body>
<!-- END: Body-->

</html>
