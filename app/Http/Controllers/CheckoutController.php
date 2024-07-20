<?php

// app/Http/Controllers/CartController.php


namespace App\Http\Controllers;

use App\Http\Controllers\UI\UiController;
use Illuminate\Http\Request;
use App\Models\Merch;
use App\Http\Controllers\CartController;
use Illuminate\Validation\Rules\Exists;

class CheckoutController extends Controller
{
    private function get_cart(){
        $cart = new CartController();
        $cartData = $cart->get_cart();
        return $cartData;
    }

    private function validateTheCart($data){
        $arrayCart = [];
        if(empty($data)){
            return [];
        }

        foreach ($data as $cart => $value) {
            $merch = Merch::where('id_merch', $cart)->exists();
            if(!$merch){
                return [];
            }
            $arrayCart[] = $value;
        }

        return $arrayCart;
    }

    public function checkoutPage(){
        $dataCart = $this->get_cart();
        $cart = $this->validateTheCart(json_decode($dataCart->content(),true));
        $Ui = new UiController();
        if(empty($cart)){
            return redirect()->route('gallery_merches');
        }
        return view('users.checkout', ['navbar_category'=>['navbar_gallery' => $Ui->getNavbarGallery(),'navbar_merch' => $Ui->getNavbarMerch(), 'carts' => $Ui->getCartContent()], 'cart' => $cart]);
    }

}
