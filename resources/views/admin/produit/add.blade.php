<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    @include('admin.layout.head')
    <title>List Produit | Qasmi Dashboard</title>

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
                            <h2 class="content-header-title float-left mb-0">Ajoute Produits</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Qasmi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Produits</a>
                                    </li>
                                    <li class="breadcrumb-item "><a href="#">List Produits</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ajoute Produit
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
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajoute un nouveau Produit</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        @if (session('message'))
                                            <div class="content-body  alert alert-warning" role="alert">
                                                <h4 class="alert-heading">Error</h4>
                                                <p class="mb-0">
                                                    {{ session('message') }}
                                                </p>
                                            </div>
                                        @endif
                                        <form id="formData" action="#" method="post" class="form"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input type="text" id="first-name-floating-icon"
                                                                class="form-control" name="sku" placeholder="SKU"
                                                                value="{{ old('sku') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Unique SKU</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('name') }}" type="text"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="name" placeholder="Titre du Produit">
                                                            <div class="form-control-position">

                                                                <i class="feather icon-type"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Nom Complet de
                                                                Produit</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('type') }}" type="text"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="type" placeholder="Type: Organique ...">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-box"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Type</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('expireDays') }}" type="number"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="expireDays"
                                                                placeholder="Jours d'Utilisation apres l'ovrire">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-heart"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Jours d'Utilisation
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <div
                                                            class="form-group d-flex justify-content-center align-items-center">
                                                            <div class="mr-2">
                                                                <span>Categorie</span>
                                                            </div>
                                                            <select name="category" class="select2 form-control">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->categorie }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <div
                                                            class="form-group d-flex justify-content-center align-items-center">
                                                            <div class="mr-2">
                                                                <span>Secteur</span>
                                                            </div>
                                                            <select name="secteur" class="select2 form-control">
                                                                <option value=""></option>
                                                                @foreach ($secteurs as $secteur)
                                                                    <option value="{{ $secteur->id }}">
                                                                        {{ $secteur->secteur }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    </div>




                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('dateProduction') }}" type="date"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="dateProduction">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Date de
                                                                Production</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('dateExpired') }}" type="date"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="dateExpired">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Date de
                                                                Expiration</label>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-floating-icon">Taille/Poids</label>
                                                            <select name="sizes[]" class="select2 form-control"
                                                                multiple="multiple">
                                                                @foreach ($sizes as $size)
                                                                    <option value="{{ $size->id }}">
                                                                        {{ $size->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Tarification
                                                    </div>

                                                    <div class="col-md-12 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">

                                                            <fieldset style="margin-right:2rem ">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" value="false"
                                                                        name="varaitionButton">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Produit Variation ?</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <button type="button" disabled
                                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light addVariation" name="addVariation">Ajoute
                                                            un Variation</button>

                                                    </div>
                                                    <div class="col-md-12 col-12 productVariation">



                                                        <div class="contentPV"
                                                            style="margin-bottom:1rem;border: 1px rgba(177, 177, 177, 0.429) solid;border-radius:15px; padding-top:1.3rem">
                                                            <div class="col-md-12 col-12">

                                                                <div class="form-group" data-select2-id="126">
                                                                    <label
                                                                        for="first-name-floating-icon">Taille/Poids</label>
                                                                    <select name="size"
                                                                        class=" form-control "
                                                                       >
                                                                         @foreach ($sizes as $size)
                                                                            <option value="{{ $size->id }}">
                                                                                {{ $size->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div
                                                                    class="form-label-group position-relative has-icon-left">
                                                                    <input value="{{ old('price') }}" type="number"
                                                                        id="first-name-floating-icon"
                                                                        class="form-control price" name="price"
                                                                        placeholder="Prix de Produit">
                                                                    <div class="form-control-position">
                                                                        <i class="feather  icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">Prix de
                                                                        Produit</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div
                                                                    class="form-label-group position-relative has-icon-left">
                                                                    <input value="0" type="number"
                                                                        min="0" max="100"
                                                                        id="first-name-floating-icon"
                                                                        class="form-control discount" name="sold"
                                                                        placeholder="Sold en Percentage">
                                                                    <div class="form-control-position">
                                                                        <i class="feather  icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">Sold
                                                                        (Percentage ex:20%)</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-12">
                                                                <div
                                                                    class="form-label-group position-relative has-icon-left">
                                                                    <input type="hidden" class="priceDiscounted"
                                                                        name="comparedPrice">
                                                                    <input disabled value="{{ old('comparedPrice') }}"
                                                                        type="number" id="first-name-floating-icon"
                                                                        class="form-control priceDiscounted"
                                                                        placeholder="Apres Sold" name="comparedPrice">
                                                                    <div class="form-control-position">
                                                                        <i class="feather  icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">Apres
                                                                        Sold</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-label-group position-relative has-icon-left">
                                                                    <input value="{{ old('stock') }}" type="number"
                                                                        id="first-name-floating-icon" class="form-control stock"
                                                                        name="stock" placeholder="Stock Available">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">Stock</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div
                                                                    class="form-label-group position-relative has-icon-left">
                                                                    <input value="{{ old('grossitePrice') }}"
                                                                        type="number" id="first-name-floating-icon"
                                                                        class="form-control .grossitePrice" name="grossitePrice"
                                                                        placeholder="Le prix De Grossiste">
                                                                    <div class="form-control-position">
                                                                        <i class="feather  icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">Le prix De
                                                                        Grossiste</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-label-group position-relative has-icon-left">
                                                                    <input value="{{ old('minCommande') }}" type="number"
                                                                        id="first-name-floating-icon" class="form-control stock"
                                                                        name="minCommande" placeholder="minimum Commande">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-package"></i>
                                                                    </div>
                                                                    <label for="first-name-floating-icon">min Commande Pour Grossiste Prix</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        tarification
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('price') }}" type="number"
                                                                id="first-name-floating-icon" class="form-control price"
                                                                name="price" placeholder="Prix de Produit">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Prix de
                                                                Produit</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('sold') }}" type="number"
                                                            min="0" max="100"  id="first-name-floating-icon" class="form-control discount"
                                                                name="sold" placeholder="Sold en Percentage">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Sold (Percentage ex:20%)</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input type="hidden"  class="priceDiscounted"  name="comparedPrice">
                                                            <input disabled value="{{ old('comparedPrice') }}" type="number"
                                                                id="first-name-floating-icon" class="form-control priceDiscounted"
                                                                placeholder="Apres Sold">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Apres
                                                                Sold</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group position-relative has-icon-left">
                                                            <input value="{{ old('grossitePrice') }}" type="number"
                                                                id="first-name-floating-icon" class="form-control"
                                                                name="grossitePrice"
                                                                placeholder="Le prix De Grossiste">
                                                            <div class="form-control-position">
                                                                <i class="feather  icon-package"></i>
                                                            </div>
                                                            <label for="first-name-floating-icon">Le prix De
                                                                Grossiste</label>
                                                        </div>
                                                    </div>
--}}
                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Information sur Emballage et livraison
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea class="form-control" name="PackagingDelivery" id="label-textarea" rows="3"
                                                                placeholder="Label in Textarea">{{ old('PackagingDelivery') }}</textarea>
                                                            <label for="label-textarea">Label in Textarea</label>
                                                        </fieldset>
                                                    </div>

                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Description
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea data-length=350 class="form-control char-textarea" name="preDescription" id="textarea-counter"
                                                                rows="3" placeholder="Bref Description">{{ old('preDescription') }}</textarea>
                                                            <label for="label-textarea">Bref Description</label>
                                                            <small class="counter-value float-right"><span
                                                                    class="char-count">0</span> / 350 </small>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea class="form-control" id="label-textarea" rows="3" name="description"
                                                                placeholder="Description Detailles">{{ old('description') }}</textarea>
                                                            <label for="label-textarea">Description Detailles</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Usage recommandé
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea data-length=350 class="form-control char-textarea" name="Usage" id="textarea-counter" rows="3"
                                                                placeholder="Usage recommandé">{{ old('Usage') }}</textarea>
                                                            <label for="label-textarea">Usage recommandé</label>
                                                            <small class="counter-value float-right"><span
                                                                    class="char-count">0</span> / 350 </small>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        autres ingrédients
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea data-length=350 class="form-control char-textarea" name="autres" id="textarea-counter" rows="3"
                                                                placeholder="attention que l'acheteur concerne">{{ old('autres') }}</textarea>
                                                            <label for="label-textarea">autres ingrédients</label>
                                                            <small class="counter-value float-right"><span
                                                                    class="char-count">0</span> / 350 </small>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-bold-600 font-medium-2  col-12 mb-1">
                                                        Attention
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea data-length=350 class="form-control char-textarea" name="Warnings" id="textarea-counter" rows="3"
                                                                placeholder="attention que l'acheteur concerne">{{ old('Warnings') }}</textarea>
                                                            <label for="label-textarea">attention que l'acheteur
                                                                concerne</label>
                                                            <small class="counter-value float-right"><span
                                                                    class="char-count">0</span> / 350 </small>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <input value="{{ old('image[]') }}" multiple
                                                                type="file" id="first-name-floating-icon"
                                                                class="form-control image" name="image[]">
                                                            <label for="label-textarea">Uploude Images</label>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button id="submitForm"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
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

    <script src="../../../app-assets/js/admin/addProduit.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>

</body>
<!-- END: Body-->

</html>
