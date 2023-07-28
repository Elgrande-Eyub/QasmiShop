<?php

namespace App\Providers;

use App\Models\addToCart;
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
        $cartCount = 0;

        if (auth()->check()) {
            $cartCount = addToCart::where('user_id', auth()->user()->id)->count();

        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }

        $categories = produitCategorie::get();// Fetch your categories from the database or any other source
        $secteurs = secteur::get(); // Fetch your secteurs from the database or any other source
        View::share(['categories'=> $categories,'secteurs'=>$secteurs,'cartCount'=>$cartCount]);

    }
}
