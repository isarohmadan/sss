<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Merch;
use App\Http\Controllers\CartController;
use App\Models\Merch_Category;
use App\Models\gallery_sss as gallery_sss_category;
use App\Models\gallery_sss_images;
class UiController extends Controller
{

    public static function getNavbarGallery(){
        $response = gallery_sss_category::all();
        if ($response->isEmpty()) {
            // Handle case where no records are found
            return [];
        }
        return $response;
    }
    public static function getNavbarMerch(){
        $response = Merch_Category::all();
        if ($response->isEmpty()) {
            // Handle case where no records are found
            return [];
        }
        return $response;
    }
    public static function getCartContent(){
        $data = new CartController();
        $cart = $data->getCartWithProduct();
        return $cart;
    }
    public function about()
    {
        return view('users.user_about', ['navbar_category'=>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }
    public function gallery_category()
    {
        return view('users.user_gallery_category' ,['navbar_category'=> ['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }   
    public function product_specific($merch_type,$slug_merch){
        // find using SLUG and the merch type should similar with the category not ID
        $data = Merch::where('slug_merch', $slug_merch)->first();
        return view('users.specific_product',compact('data') , ['navbar_category'=>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }
    public function gallery_merch(){
        $data = Merch::all();
        return view('users.merch_gallery', compact('data') , ['navbar_category'=>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }
    public function gallery_merch_type($merch_type){

        $getDataCategory = Merch_Category::where('slug_category', $merch_type)->first();
        $data = Merch::where('category_id', $getDataCategory['id_category'])->get();
        return view('users.merch_gallery', compact('data') , ['navbar_category'=>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }
    public function gallery_picture($type)
    {
        $categoryImage = gallery_sss_category::where('slug',$type)->first();
        $images = gallery_sss_images::where('sss_gallery_category_id',$categoryImage['id'])->get();
        $dataGallery = [];
        foreach ($images as $image) {
            foreach ($image->image_path as $path) {
                $dataGallery[] = [
                    'id_image' => $image->id_image,
                    'title' => $image->title,
                    'image_path' => $path['image_path'],
                ];
            }
        }
        return view('users.user_gallery', ['navbar_category'=>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()],'images'=>$dataGallery]);
    }
    public function vinyl_gallery()
    {
        
        $images = Storage::disk('public')->files('local/vinyls');
        return view('users.vinyl_gallery', compact('images') ,[ "navbar_category" =>['navbar_gallery' => $this->getNavbarGallery(),'navbar_merch' => $this->getNavbarMerch(), 'carts' => $this->getCartContent()]]);
    }
}   
