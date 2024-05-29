<?php

namespace App\Http\Controllers;

use App\Models\HistoriDanFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HistoriDanFotoController extends Controller
{
    public function list()
    {
        $histories = HistoriDanFoto::query()->paginate(10);
        return view('content.histori.list', [
            'histories' => $histories
        ]);
    }
    public function edit(Request $request, $id)
    {
        $histori = HistoriDanFoto::find($id);
        if ($histori === null) {
            abort(404);
        }
        return view('content.histori.edit', [
            'histori' => $histori
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required', 
        'deskripsi' => 'required'
    ]);

    $historidanfoto = HistoriDanFoto::find($request->id);
    if ($historidanfoto === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $historidanfoto->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    // Memperbarui data rumah
    $historidanfoto->deskripsi = $request->deskripsi;
    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        // Simpan nama file gambar atau path lengkapnya, tergantung pada kebutuhan aplikasi Anda
        $historidanfoto->gambar = $gambarName; // Simpan nama file gambar saja
        // $homes->gambar = $gambarPath; // Simpan path lengkap gambar
    } 
    
    try{
        $historidanfoto->save();
        // Langsung menuju ke URL yang diinginkan tanpa menggunakan nama route
        return redirect('/histori')->with('pesan', ['success','Berhasil Ubah berita']);
    } catch(\Exception $e){
        // Cetak pesan kesalahan untuk membantu men-debug
        dd($e->getMessage());
        // Redirect ke halaman yang sesuai dengan pesan kesalahan tertentu
        return redirect('/histori')->with('pesan', ['danger','Berita Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'deskripsi' => 'required'
    ]);
    $historidanfoto = new HistoriDanFoto();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $historidanfoto->gambar = $namaGambar;
    $historidanfoto->deskripsi = $request->deskripsi;
    $historidanfoto->save();

    return redirect(url('/histori'));
}

    public function add()
    {
        return view('content.histori.add');
    }
    public function delete(Request $request)
    {
        $idHistoriDanFoto = $request->id;
        $historidanfoto = HistoriDanFoto::find($idHistoriDanFoto);
        if ($historidanfoto === null) {
            return response()->json([], 404);
        }
        $historidanfoto->delete();
        return response()->json([], 200);
    }
}
