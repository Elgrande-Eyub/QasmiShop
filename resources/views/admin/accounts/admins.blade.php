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
    <title>DataTables - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
                            <h2 class="content-header-title float-left mb-0">List Admins</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Accounts</a>
                                    </li>
                                    <li class="breadcrumb-item active">Admins
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a
                                    class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <a href="" class="btn btn-white px-1 py-1 waves-effect waves-light"> <i
                                        class='feather icon-plus'></i> Add New</a>
                                {{--  <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </button> --}}
                                {{--  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @livewireScripts

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <td></td>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>

                                    <th>Telephone</th>
                                    <th>Account Status</th>
                                    <th>Active Status</th>
                                    {{-- <th>subCategory</th> --}}

                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="product" data-product-id="{{ $user->id }}">
                                        {{-- <input type="hidden" value="{{ $user->id }}" id="rowId" name="rowId"> --}}

                                        <td></td>
                                        <td class="Category">{{ $user->name }}</td>
                                        <td class="Category">{{ $user->email }}</td>
                                        <td class="Category">{{ $user->role }}</td>
                                        <td class="Category">{{ $user->telephone }}</td>
                                        <td class="Category">
                                            @if ($user->activeAccount == 0)
                                                <div class="chip chip-warning">
                                                    <div class="chip-body">
                                                        <div class="chip-text">in progress</div>
                                                    </div>
                                                </div>
                                            @elseif ($user->activeAccount == 1)
                                                <div class="chip chip-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text">Active</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="chip chip-danger">
                                                    <div class="chip-body">
                                                        <div class="chip-text">Bloqué</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="Category">

                                            @if ($user->online == 0)
                                                <div class="chip chip-danger">
                                                    <div class="chip-body">
                                                        <div class="chip-text">Offline</div>
                                                    </div>
                                                </div>
                                            @elseif ($user->online == 1)
                                                <div class="chip chip-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text">online</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>

                                        {{-- <td class="subCategory">{{ $size->subTitle }}</td> --}}
                                        <td class="product-action ">
                                            <div class="content-header-right ">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i
                                                            class="feather icon-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($user->activeAccount == 1)
                                                            <a class="dropdown-item"
                                                                href="{{ route('BlockAccount', ['id' => $user->id]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('BlockAccount-form').submit();">Blocker</a>
                                                            <form id="BlockAccount-form"
                                                                action="{{ route('BlockAccount', ['id' => $user->id]) }}"
                                                                method="post" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('ActiveAccount', ['id' => $user->id]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('ActiveAccount-form').submit();">Activer</a>
                                                            <form id="ActiveAccount-form"
                                                                action="{{ route('ActiveAccount', ['id' => $user->id]) }}"
                                                                method="post" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        @endif
                                                        <script>
                                                            $(document).ready(function() {
                                                                // Check if the session exists
                                                                var sessionExists = {{ session()->has('AccountStatus') ? 'true' : 'false' }};

                                                                if (sessionExists) {
                                                                    // Show the success toast
                                                                    toastr.success("{{ session('message') }}", "{{ session('userName') }}");
                                                                }

                                                            });
                                                        </script>
                                                        <a class="dropdown-item" href="{{ route('editAccount',['id'=>$user->id]) }}">Editer</a>


                                                        <a class="dropdown-item"
                                                        href="{{ route('DeleteAccount', ['id' => $user->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('DeleteAccount-form').submit();">Supprimer</a>
                                                    <form id="DeleteAccount-form"
                                                        action="{{ route('DeleteAccount', ['id' => $user->id]) }}"
                                                        method="post" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                            <span class="action-delete"><i class="feather icon-trash"></i></span> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- DataTable ends -->

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

    <script>
        $(document).ready(function() {



















            "use strict"
            // init list view datatable
            var dataListView = $(".data-list-view").DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: true,
                    targets: 0,
                    checkboxes: {
                        selectRow: true
                    }
                }],
                dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [
                    [4, 10, 15, 20],
                    [4, 10, 15, 20]
                ],
                select: {
                    style: "multi"
                },
                order: [
                    [1, "asc"]
                ],
                bInfo: false,
                pageLength: 4,
                /* buttons: [
                  {
                    text: "<i class='feather icon-plus'></i> Ajoute Un Admin",
                    action: function() {
                      $(this).removeClass("btn-secondary")
                      $(".add-new-data").addClass("show")
                      $(".overlay-bg").addClass("show")

                      $("#Categorie, #subCategorie").val("")
                      $('#TitleCategorie').text('Ajoute un Taille/Poid');
                      $('#submitCategorie').text('Ajouter Taille/Poid');
                      $('.formCategorie').attr('id', 'ajouteCategorie');

                    },
                    className: "btn-outline-primary"
                  }
                ], */
                initComplete: function(settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });

            dataListView.on('draw.dt', function() {
                setTimeout(function() {
                    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                    }
                }, 50);
            });

            // init thumb view datatable
            var dataThumbView = $(".data-thumb-view").DataTable({
                responsive: false,
                columnDefs: [{
                    orderable: true,
                    targets: 0,
                    checkboxes: {
                        selectRow: true
                    }
                }],
                dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [
                    [4, 10, 15, 20],
                    [4, 10, 15, 20]
                ],
                select: {
                    style: "multi"
                },
                order: [
                    [1, "asc"]
                ],
                bInfo: false,
                pageLength: 4,
                buttons: [{
                    text: "<i class='feather icon-plus'></i> Add New",
                    action: function() {
                        $(this).removeClass("btn-secondary")
                        $(".add-new-data").addClass("show")
                        $(".overlay-bg").addClass("show")
                    },
                    className: "btn-outline-primary"
                }],
                initComplete: function(settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            })

            dataThumbView.on('draw.dt', function() {
                setTimeout(function() {
                    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                    }
                }, 50);
            });

            // To append actions dropdown before add new button
            var actionDropdown = $(".actions-dropodown")
            actionDropdown.insertBefore($(".top .actions .dt-buttons"))


            // Scrollbar
            if ($(".data-items").length > 0) {
                new PerfectScrollbar(".data-items", {
                    wheelPropagation: false
                })
            }

            // Close sidebar
            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                $("#data-name, #data-price").val("")
                $("#data-category, #data-status").prop("selectedIndex", 0)
            })

            // On Edit
            $('.action-edit').on("click", function(e) {
                var row = $(this).closest('tr');
                var Category = row.find('.Category').text();
                var subCategory = row.find('.subCategory').text();
                var rowId = row.find('#rowId').val();


                $('#Categorie').val(Category);
                $('#subCategorie').val(subCategory);
                $('.add-new-data').addClass('show');
                $('.overlay-bg').addClass('show');

                $('#idCategorie').val(rowId);
                $('#TitleCategorie').text('Edit Taille/Poid');
                $('#submitCategorie').text('Update Taille/Poid');
                $('.formCategorie').attr('id', 'updateCategorie');

            });

            // On Delete
            $('.action-delete').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('td').parent('tr').fadeOut();
            });

            // dropzone init
            Dropzone.options.dataListUpload = {
                complete: function(files) {
                    var _this = this
                    // checks files in class dropzone and remove that files
                    $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on(
                        "click",
                        function() {
                            $(".dropzone")[0].dropzone.files.forEach(function(file) {
                                file.previewElement.remove()
                            })
                            $(".dropzone").removeClass("dz-started")
                        }
                    )
                }
            }
            Dropzone.options.dataListUpload.complete()

            // mac chrome checkbox fix
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        })
    </script>

    {{-- <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script> --}}
    {{-- <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script> --}}
    {{-- <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script> --}}
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>

</body>
<!-- END: Body-->

</html>
