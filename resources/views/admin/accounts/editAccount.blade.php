<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    @include('admin.layout.head')
    <title>List Produit | Qasmi Dashboard</title>


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
                            <h2 class="content-header-title float-left mb-0">Ajoute Produits</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('getAdmins') }}">Accounts</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('getAdmins') }}">Admins</a>
                                    </li>
                                    <li class="breadcrumb-item active">Mise a Jour Compte
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mise a Jour Les Information de Compte</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        @if(session('message'))
                                <div class="content-body  alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Error</h4>
                                    <p class="mb-0">
                                        {{ session('message') }}
                                    </p>
                                </div>
                                @endif
                                        <form action="{{ route('updateAccount',['id'=> $user->id]) }}" method="post" class="form" >
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->name }}" type="text" id="first-name-floating-icon" class="form-control" name="name" placeholder="Username">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-box"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Username</label>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->email}}" type="email" id="first-name-floating-icon" class="form-control" name="email" placeholder="E-mail">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-heart"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">E-mail</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input  type="text" id="first-name-floating-icon" class="form-control" name="password" placeholder="Ancien mot de passe">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Ancien mot de passe</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input  type="password" id="first-name-floating-icon" class="form-control" name="Newpassword" placeholder="Nouveau mot de passe">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Nouveau mot de passe</label>
                                                        </div>
                                                    </div>




                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Personnel Informations
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->firstName }}" type="text" id="first-name-floating-icon" class="form-control" name="firstName" placeholder="Prenom">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Prenom</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->lastName }}" type="text" id="first-name-floating-icon" class="form-control" name="lastName" placeholder="Nom">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Nom</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->adresse }}"  type="text"  id="first-name-floating-icon" class="form-control" name="adresse" placeholder="Adresse">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Adresse</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ $user->telephone }}" type="text" id="first-name-floating-icon" class="form-control" name="telephone" placeholder="Telephone">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Telephone</label>
                                                        </div>
                                                    </div>

                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Profile Parameters
                                                    </div>
                                                    <div class="col-md-6 col-12">


                                                            <fieldset class="form-group">
                                                                <select class="form-control" id="basicSelect" name="role">
                                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                                                    <option value="professional" {{ $user->role === 'professional' ? 'selected' : '' }}>Professional</option>
                                                                </select>
                                                            </fieldset>

                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Mise a Jour</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Réinitialiser</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->

    @include('admin.layout.footer')
    <!-- END: Footer-->
    @include('admin.layout.jsCall')



</body>
<!-- END: Body-->

</html>
