<?php

namespace App\Http\Controllers;

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
        return view('frontend.content.about');
    }
    public function service(){
        return view('frontend.content.service');
    }
    public function offering(){
        return view('frontend.content.offering');
    }
    public function schedule(){
        return view('frontend.content.schedule');
    }
    public function media(){
        return view('frontend.content.media');
    }
    public function kaumwanita(){
        return view('frontend.content.kaumwanita');
    }



}
