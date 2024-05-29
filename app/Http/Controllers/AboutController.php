<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function list()
    {
        $about = About::query()->paginate(10);
        return view('content.about.list', [
            'about' => $about
        ]);
    }
    public function edit(Request $request, $id)
    {
        $about = About::find($id);
        if ($about === null) {
            abort(404);
        }
        return view('content.about.edit', [
            'about' => $about
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required'
    ]);

    $about = About::find($request->id);
    if ($about === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $about->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        // Simpan nama file gambar atau path lengkapnya, tergantung pada kebutuhan aplikasi Anda
        $about->gambar = $gambarName; // Simpan nama file gambar saja
        // $homes->gambar = $gambarPath; // Simpan path lengkap gambar
    } 
    
    try{
        $about->save();
        // Langsung menuju ke URL yang diinginkan tanpa menggunakan nama route
        return redirect('/about')->with('pesan', ['success','Berhasil Ubah gambar']);
    } catch(\Exception $e){
        // Cetak pesan kesalahan untuk membantu men-debug
        dd($e->getMessage());
        // Redirect ke halaman yang sesuai dengan pesan kesalahan tertentu
        return redirect('/about')->with('pesan', ['danger','Gambar Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required'
    ]);
    $about = new About();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $about->gambar = $namaGambar;
    $about->save();

    return redirect(url('/about'));
}

    public function add()
    {
        return view('content.about.add');
    }
    public function delete(Request $request)
    {
        $idAbout = $request->id;
        $about = About::find($idAbout);
        if ($about === null) {
            return response()->json([], 404);
        }
        $about->delete();
        return response()->json([], 200);
    }

}
