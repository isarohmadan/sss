<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Merch;
use App\Http\Controllers\UI\UiController;

class CartController extends Controller
{

    private function getSessionCart(){
        $cart = session()->get('cart', []);
        return $cart;
    }
    public function addToCartMerch(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = (int)$request->quantity;
        $size = $request->size;
        
        // Logika untuk mengambil data produk dari database (misalnya, Eloquent Model)
        $product = Merch::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        // Memperbarui atau menambahkan produk ke cart
        if (isset($cart[$productId])) {
            // Jika produk sudah ada di keranjang, periksa ukuran
            if (isset($cart[$productId]['sizes'][$size])) {
                // Jika ukuran sudah ada, tambahkan kuantitasnya
                $cart[$productId]['sizes'][$size] += $quantity;
            } else {
                // Jika ukuran belum ada, tambahkan ukuran baru dengan kuantitas
                $cart[$productId]['sizes'][$size] = $quantity;
            }
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru dengan ukuran dan kuantitas
            $cart[$productId] = [
                'name' => $product->title,
                'price' => $product->price,
                'sizes' => [
                    $size => $quantity,
                    
                ],
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
    }


    public function deleteFromCartMerch(Request $request)
    {
        $productId = $request->input('productId');
    
        $cart = session()->get('cart', []);
        if (!isset($cart[$productId])) {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
        // Remove the product from the cart
        unset($cart[$productId]);
    
        // Update the cart in the session
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Product removed from cart!'],200);
    }
    


    public function get_cart(){
        $cart = $this->getCartWithProduct();
        return response()->json($cart);
    }

    public function getCartWithProduct(){
        $cart = $this->getSessionCart();

        foreach ($cart as $productId => $product) {
            $product = Merch::find($productId);
            $cart[$productId]['product'] = $product;
        }

        return $cart;
    }

    public function cart()
    {
        $cart = $this->getCartWithProduct();
        // untuk saat ini pake data merch aja dulu. mau nyarik merch aja dulu dari database
        return view('users.carts_users', [
            'navbar_category'=>['navbar_gallery' => UiController::getNavbarGallery(),'navbar_merch' => UiController::getNavbarMerch(),'carts' => $cart]
            ],
        );
    }
}
