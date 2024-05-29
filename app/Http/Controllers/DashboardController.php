<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalBerita = User::count();
        $totalKategori = User::count();
        $totalUser = User::count();

        return view('content.dashboard', compact('totalBerita', 'totalKategori','totalUser'));
    }
}
