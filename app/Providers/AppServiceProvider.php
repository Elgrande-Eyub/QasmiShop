<?php

namespace App\Providers;

use App\Models\addToCart;
use App\Models\Commande;
use App\Models\produitCategorie;
use App\Models\secteur;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    public function boot(): void
    {
            $categories = produitCategorie::get();
            $secteurs = secteur::get();
            View::share(['categories'=> $categories,'secteurs'=>$secteurs]);



            View::composer(['FrontEnd.layout.navbar'], function ($view) {

        if (auth()->check()) {
            $cartCount = addToCart::where('user_id', auth()->user()->id)->count();

        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }


                $view->with('cartCount',$cartCount);
            });

        View::composer('admin.layout.sidebar', function ($view) {
            $numberOfCommands = Commande::count();
            $view->with('numberOfCommands', $numberOfCommands);
        });
    }
}
