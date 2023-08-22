<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthQasmi;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitCategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitVariationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\routeController;
use App\Http\Controllers\secteurController;
use App\Http\Controllers\sizesController;
use App\Http\Controllers\sizesController as ControllersSizesController;
use App\Models\produit;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['auth','verified', 'admin'])->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');

        /* route::get('produits/add', function () {
            return view('admin.produit.add');
        })->name('addProduit'); */

        Route::controller(ProduitController::class)->group(function () {
        route::get('produits', 'getProduits')->name('produits');
        route::get('produits/{id}', 'edit')->name('editProduit');
        route::post('produits/{id}', 'update')->name('updateProduit');
        route::get('addproduits', 'getAddPage')->name('addProduit');
        Route::post('addproduit', 'ajouteProduit')->name('ajouteProduit');
        Route::post('deleteproduit/{id}', 'deleteProduit')->name('deleteProduit');
        // Route::get('produits/sizes', 'setCategoriePage')->name('listProduits');
        Route::post('produits/public/{id}', 'visibleProduct')->name('visibleProduct');


        });


        /* Route::controller(ProduitCategorieController::class)->group(function () {
        Route::get('produits/categories', 'getData')->name('categories');
        Route::post('produits/categories/add', 'setCategoriePage')->name('ajouteCategories');
        Route::post('produits/categories/update', 'updateCategorie')->name('updateCategories');
        Route::post('produits/categories/delete/{id}', 'deleteCategorie')->name('deleteCategories');

    }); */

      /*   Route::controller(SizesController::class)->group(function () {
            route::get('produits/sizes', 'getSizesPage')->name('sizes');
            route::get('sizes', 'getSizesData')->name('getSizesData');
            Route::post('produits/sizes/add', 'setSizePage')->name('setSizePage');
            Route::post('produits/sizes/delete/{id}', 'delSizePage')->name('delSizePage');
        }); */

        Route::controller(AccountsController::class)->group(function () {
            route::get('accounts/admins', 'getAdmins')->name('getAdmins');
            route::get('accounts/users', 'getUsers')->name('getUsers');
            route::get('accounts/professionals', 'getProfessionals')->name('getProfessionals');

            route::get('accounts/{id}', 'editAccount')->name('editAccount');
            route::post('accounts/{id}', 'updateAccount')->name('updateAccount');

            Route::post('activeAccount/{id}', 'ActiveAccount')->name('ActiveAccount');
            Route::post('blockAccount/{id}', 'BlockAccount')->name('BlockAccount');
            Route::post('deleteAccount/{id}', 'deleteAccount')->name('DeleteAccount');
        });


        route::resource('secteur',SecteurController::class);
        route::resource('categorie',categorieController::class);
        route::resource('size',SizesController::class);
        route::resource('commande',CommandeController::class);
        // route::resource('commande',CommandeController::class);
    });

    require __DIR__.'/auth.php';
});

// Route::put('admin/produits/categories/update/{id}', [ProduitCategorieController::class,'updateCategorie'])->name('updateCategories');


    Route::middleware(['auth'])->group(function () {
        Route::post('userlogout', [AuthenticatedSessionController::class, 'userLogout'])
        ->name('userLogout');
    });



        /* Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/logout', [ProfileController::class, 'logout'])->name('profile.logout');
        });
        */

    Route::post('loginuser', [AuthenticatedSessionController::class, 'userLogin'])
    ->name('userLogin');



    // Front End Side
    Route::redirect('', 'index');
    Route::controller(routeController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
    Route::get('product/{id}', 'product')->name('product');
    Route::get('login', 'login')->name('frontlogin');
    Route::get('shopcart', 'cartPage')->name('shopCart');
    Route::get('register', 'register')->name('getRegisterQasmi');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('orderComfirmed', 'orderComfirmed')->name('orderComfirmed');
    Route::get('categorie/{id}', 'categorieView')->name('categorieView');
    Route::get('shop/{id}', 'shopView')->name('shopView');
    });

    Route::get('getvariation/{id}', [ProduitVariationController::class,'show'])->name('getvariation');

    Route::post('register', [AuthQasmi::class,'store'])->name('registerQasmi');


    /* Route::post('addCart', [AddToCartController::class,'addCart'])->name('addCart');
    Route::post('deleteCart/{id}', [AddToCartController::class,'deleteCart'])->name('deleteCart');
    Route::post('updateQuantity', [AddToCartController::class,'updateQuantity'])->name('updateQuantity'); */

    Route::post('checkoutSession', [checkoutController::class,'savedSessionProccedCheckout'])->name('sessionCheckout');
    Route::get('checkoutSession', [checkoutController::class,'getSessionProccedCheckout']);




    Route::controller(AddToCartController::class)->group(function () {
        Route::post('addCart','addCart')->name('addCart');
        Route::post('deleteCart/{id}', 'deleteCart')->name('deleteCart');
        Route::post('updateQuantity', 'updateQuantity')->name('updateQuantity');
    });
