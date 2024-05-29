<?php

namespace App\Http\Controllers;

use App\Models\ProfilPendeta;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalUser = User::count();
        $adminUsers = User::where('role', 'admin')->get();
        $profilePendeta = ProfilPendeta::first();
        return view('content.dashboard', compact('totalUser', 'profilePendeta','adminUsers'));
    }
}
