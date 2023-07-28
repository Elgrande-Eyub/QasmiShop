<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function savedSessionProccedCheckout(Request $request)
        {
            session()->forget('checkoutProduct');
            $checkoutProduct = [];
            $totalProducts = 0;
            foreach ($request->input('cartProducts', []) as $product) {
                $productData = [
                    'productID' => $product['productID'],
                    'productName' => $product['productName'],
                    'size' => $product['size'],
                    'price' => $product['price'],
                    'variation' => $product['variation'],
                    'quantity' => $product['quantity'],
                ];
                $totalProducts +=1;
                $checkoutProduct[] = $productData;

            }

            session()->put('totalProducts', $totalProducts);
            session()->put('checkoutProduct', $checkoutProduct);

        }


        public function getSessionProccedCheckout(Request $request)
        {
            $user=null;
            if(auth()->check()){
                $user = Auth::user();
            }
            $checkoutProduct= session()->get('checkoutProduct');
            $totalProducts= session()->get('totalProducts');
            return view('FrontEnd.checkout',compact('checkoutProduct','totalProducts','user'));
        }

}
