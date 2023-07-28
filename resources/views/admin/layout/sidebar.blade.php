<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    {{-- <div class="brand-logo"></div> --}}
                    {{-- <h2 class="brand-text mb-0">Qasmi Distrubtion</h2> --}}
                    <img width="90%" src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v3.png') }}" alt="branding logo">
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <li class=" nav-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right ">2</span></a>
            <li class=" navigation-header"><span>Apps</span>
            </li>



            <li class=" nav-item"><a href="{{ route('produits') }}"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Produit</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('produits') }}"><i class="feather icon-circle"></i><span class="menu-item" >List Produits</span></a>
                    </li>
                    <li><a href="{{ route('categorie.index') }}"><i class="feather icon-circle"></i><span class="menu-item" >Categories</span></a>
                    </li>
                    <li><a href="{{ route('secteur.index') }}"><i class="feather icon-circle"></i><span class="menu-item" >secteur</span></a>
                    </li>
                    <li><a href="{{ route('size.index') }}"><i class="feather icon-circle"></i><span class="menu-item" >Tailles/Poids</span></a>
                    </li>
                </ul>
            </li>

            <li><a href="{{ route('commande.index') }}"><i class="feather icon-home"></i>Commandes<span class="badge badge badge-warning badge-pill float-right ">0</span></a>

            <li class=" nav-item {{ request()->is('admin/accounts') ? 'active' : '' }}"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Accounts">Clients</span></a>
                <ul class="menu-content">

                    <li><a href="{{ route('getUsers') }}"><i class="feather icon-circle"></i><span class="menu-item" >Clients Réguliers</span></a>
                    </li>
                    <li><a href="{{ route('getProfessionals') }}"><i class="feather icon-circle"></i><span class="menu-item" >Professionnels</span></a>
                    </li>
                </ul>
            </li>
            {{-- <li class=" nav-item "><a href="app-calender.html"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Dashboard">Accounts</span></a> --}}
                <li class="nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Dashboard">Profile</span></a>
                    <li><a href="{{ route('getAdmins') }}"><i class="feather icon-circle"></i><span class="menu-item" >Admins</span></a>
                    </li>

        </ul>
    </div>
</div>
