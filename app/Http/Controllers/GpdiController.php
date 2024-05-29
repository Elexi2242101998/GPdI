<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use Illuminate\Http\Request;

class GpdiController extends Controller
{
    public function index(){
        $home = Home::first();
        return view('frontend.content.home', [
            'home' => $home
        ]);
    }
    public function about(){
        $about = About::first();
        return view('frontend.content.about',[
            'about' => $about
        ]);
    }
    public function service(){
        $service = About::first();
        return view('frontend.content.service',[
            'service' => $service
        ]);
    }
}
