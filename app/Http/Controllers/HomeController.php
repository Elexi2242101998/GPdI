<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function list()
    {
        $homes = Home::query()->paginate(10);
        return view('content.home.list', [
            'homes' => $homes
        ]);
    }
    public function edit(Request $request, $id)
    {
        $home = Home::find($id);
        if ($home === null) {
            abort(404);
        }
        return view('content.home.edit', [
            'home' => $home
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required', 
        'link_maps' => 'required|url', 
        'sunday_service' => 'required'
    ]);

    $homes = Home::find($request->id);
    if ($homes === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $homes->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    // Memperbarui data rumah~~
    $homes->link_maps = $request->link_maps;
    $homes->sunday_service = $request->sunday_service;
    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        $homes->gambar = $gambarName; // Simpan nama file gambar saja
    } 
    
    try{
        $homes->save();
        return redirect('/home')->with('pesan', ['success','Berhasil Ubah berita']);
    } catch(\Exception $e){
        dd($e->getMessage());
        return redirect('/home')->with('pesan', ['danger','Berita Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'link_maps' => 'required|url',
        'sunday_service' => 'required'
    ]);
    $home = new Home();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $home->gambar = $namaGambar;
    $home->link_maps = $request->link_maps;
    $home->sunday_service = $request->sunday_service;
    $home->save();

    return redirect(url('/home'));
}

    public function add()
    {
        return view('content.home.add');
    }
    public function delete(Request $request)
    {
        $idHome = $request->id;
        $home = Home::find($idHome);
        if ($home === null) {
            return response()->json([], 404);
        }
        
        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $home->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    
        // Hapus entri dari database
        $home->delete();
        
        return response()->json([], 200);
    }
    
}
