<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-middle header-middle-ptb-0 d-none d-lg-block">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <input type="hidden" id="userRole" data-role="{{ session('role') }}" />

                                <li><a href="{{ route('about') }}">À Propos de Nous</a></li>
                                @if (session('role') === 'user' || session('role') === 'professional')
                                    <li><a href="#">My Account</a></li>
                                @endif


                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block"
                                style="overflow: hidden; position: relative; height: 14px;">



                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>Besoin d’aide? Appelez-nous: <strong class="text-brand"> + 1800 900</strong></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('index') }}"><img
                            src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v2.png') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">

                            <input type="text" placeholder="Rechercher des Produits..." />
                        </form>
                    </div>
                    <div class="header-action-right " style="margin-right: 2rem">
                        <div class="header-action-2">


                            {{-- <div class="header-action-icon-2" style="margin-right: 1rem">
                                <a class="mini-cart-icon" href="{{ route('shopCart') }}">
                                    <img alt="Kasmi" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">{{ $cartCount }}</span>
                                </a>
                                <a  href="{{ route('shopCart') }}"><span class="lable">Panier</span></a>

                            </div> --}}

                            @if (auth()->check() && auth()->user()->role !== 'admin')
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Kasmi"
                                            src="{{ asset('assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="#"><span class="lable ml-0">MonCompte</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="#"><i class="fi fi-rs-user mr-10"></i>Profile</a></li>

                                            <li><a href="{{ route('userLogout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>déconnectez</a></li>
                                            <form id="logout-form" action="{{ route('userLogout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="header-action-icon-2">
                                    <a href="{{ route('frontlogin') }}">
                                        <img class="svgInject" alt="Kasmi"
                                            src="{{ asset('assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{ route('frontlogin') }}"><span class="lable ml-0">Connexion</span></a>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative" style="padding: 1rem">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('index') }}"><img
                            src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v3.png') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> Tous les Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                @php
                                    $categoriesCount = count($categories);
                                @endphp

                                @for ($i = 0; $i < $categoriesCount; $i++)
                                    @if ($i % 5 === 0)
                                        <ul>
                                    @endif

                                    <li>
                                        <a href="{{ route('categorieView', ['id' => $categories[$i]->id]) }}"> <img
                                                src="{{ asset('assets/imgs/theme/icons/category-1.svg') }}"
                                                alt="" />{{ $categories[$i]->categorie }}</a>
                                    </li>

                                    @if (($i + 1) % 5 === 0 || $i === $categoriesCount - 1)
                                        </ul>
                                    @endif
                                @endfor
                            </div>

                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="{{ request()->is('index') ? 'active' : '' }}"
                                        href="{{ route('index') }}">Accueil</a>
                                </li>

                                <li>
                                    <a class="{{ request()->is('shop/' . Route::current()->parameter('id')) ? 'active' : '' }}">Shop <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">

                                        @foreach ($secteurs as $secteur)
                                            <li><a
                                                    href="{{ route('shopView', ['id' => $secteur->id]) }}">{{ $secteur->secteur }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a  class="{{ request()->is('about') ? 'active' : '' }}"
                                        href="{{ route('about') }}">KASMI Distribution</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="hotline d-none d-lg-flex">
                    <div class="header-action-right " style="margin-right: 2rem">
                        <div class="header-action-2">


                            <div class="header-action-icon-2" style="margin-right: 1rem">
                                <a class="mini-cart-icon" href="{{ route('shopCart') }}">
                                    <img alt="Kasmi" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">{{ $cartCount }}</span>
                                </a>
                                <a href="{{ route('shopCart') }}"><span class="lable">Panier</span></a>

                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>

                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">

                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('shopCart') }}">
                                <img alt="Kasmi" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">{{ $cartCount }}</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="navbarMobile" class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('index') }}"><img
                        src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v3.png') }}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li>
                            <a class="{{ request()->is('index') ? 'active' : '' }}"
                                href="{{ route('index') }}">Accueil</a>
                        </li>
                       {{--  @for ($i = 0; $i < $categoriesCount; $i++)
                        @if ($i % 5 === 0)
                            <ul>
                        @endif

                        <li>
                            <a href="{{ route('categorieView', ['id' => $categories[$i]->id]) }}"> <img
                                    src="{{ asset('assets/imgs/theme/icons/category-1.svg') }}"
                                    alt="" />{{ $categories[$i]->categorie }}</a>
                        </li>

                        @if (($i + 1) % 5 === 0 || $i === $categoriesCount - 1)
                            </ul>
                        @endif
                    @endfor --}}

                    <li class="menu-item-has-children"><span class="menu-expand"><i
                                class="fi-rs-angle-small-down"></i></span>
                        <a href="#">Categories</a>
                        <ul class="dropdown" style="display: none;">
                            @foreach ($categories as $categorie)
                                <li><a href="{{ route('categorieView', ['id' => $categorie->id]) }}">{{ $categorie->categorie }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                        <li class="menu-item-has-children"><span class="menu-expand"><i
                                    class="fi-rs-angle-small-down"></i></span>
                            <a href="#">Shop</a>
                            <ul class="dropdown" style="display: none;">
                                @foreach ($secteurs as $secteur)
                                    <li><a href="{{ route('shopView', ['id' => $secteur->id]) }}">{{ $secteur->secteur }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="{{ request()->is('about') ? 'active' : '' }}"
                                href="{{ route('about') }}">Qasmi distribution</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>

            <div class="mobile-social-icon mb-50">

                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt=""></a>
            </div>
            <div class="site-copyright">Copyright 2023 © Iker. All rights reserved.</div>
        </div>
    </div>
</div>
