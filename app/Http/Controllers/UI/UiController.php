<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class UiController extends Controller
{
    public function index()
    {
        return view('users.user_index');
    }
    public function gallery_category()
    {
        return view('users.user_gallery_category');
    }   

    public function gallery_merch(Request $request){
        $request = $request->query('type');
        $images = [];
        if($request == 'sss'){
            $images = Storage::disk('public')->files('local/merch_local');
            return view('users.merch_gallery', compact('images'));
        }
        if($request == 'vintage'){
            $images = Storage::disk('public')->files('local/merch_vintage');
            return view('users.merch_gallery', compact('images'));            
        }
        return view('users.merch_gallery', compact('images'));
    }
    public function gallery_picture($type)
    {
        $images = Storage::disk('public')->files('local/tiki_tuesday');
        return view('users.user_gallery', compact('images'));
    }
    public function vinyl_gallery()
    {
        
        $images = Storage::disk('public')->files('local/vinyls');
        return view('users.vinyl_gallery', compact('images'));
    }
}   
