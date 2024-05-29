<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function read($judul)
    {
        echo $judul;
    }

    public function list()
    {
        $users = User::query()->paginate(10);
        return view('content.user.list', [
            'users' => $users
        ]);
    }
    public function profil()
    {
        $users = User::class;
        return view('content.user.profil', [
            'users' => $users
        ]);
    }
    public function edit(Request $request, $id)
    {
        $users = User::find($id);
        if ($users === null) {
            abort(404);
        }
        return view('content.user.edit', [
            'user' => $users
        ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
            'role' => 'required'
        ]);
        $users = User::find($request->id);
        if ($users === null) {
            abort(404);
        }
        $users->name = $request->name;
        $users->email = $request->email;
        $users->alamat = $request->alamat;
        $users->no_telepon = $request->no_telepon;
        $users->dob = $request->dob;
        $users->password = Hash::make($request->password);
        $users->role = $request->role;
        $users->save();
        return redirect(url('/user'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required|regex:/^[0-9\+]+$/',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
        ]);
        #sudah tervalidasi
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->alamat = $request->alamat;
        $users->no_telepon = $request->no_telepon;
        $users->dob = $request->dob;
        $users->password = bcrypt('12345678');
        $users->save();
        return redirect(url('/user'));

    }
    public function add()
    {
        return view('content.user.add');
    }
    public function delete(Request $request)
    {
        $idUser = $request->id;
        $user = User::find($idUser);
        if ($user === null) {
            return response()->json([], 404);
        }
        $user->delete();
        return response()->json([], 200);
    }

}
