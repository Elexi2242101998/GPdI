<?php

namespace App\Http\Controllers;

use App\Models\KaumBapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IbadahKaumBapaController extends Controller
{
    public function list()
    {
        $KaumBapa = KaumBapa::query()->paginate(10);
        return view('content.kaumbapa.list', [
            'kaumbapa' => $KaumBapa
        ]);
    }
    public function edit(Request $request, $id)
    {
        $KaumBapa = KaumBapa::find($id);
        if ($KaumBapa === null) {
            abort(404);
        }
        return view('content.kaumbapa.edit', [
            'kaumbapa' => $KaumBapa
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required', 
        'deskripsi' => 'required', 
        'jadwal_ibadah' => 'required'
    ]);

    $KaumBapa = KaumBapa::find($request->id);
    if ($KaumBapa === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $KaumBapa->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    // Memperbarui data rumah~~
    $KaumBapa->deskripsi = $request->deskripsi;
    $KaumBapa->jadwal_ibadah = $request->jadwal_ibadah;
    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        $KaumBapa->gambar = $gambarName; // Simpan nama file gambar saja
    } 
    
    try{
        $KaumBapa->save();
        return redirect('/kaumbapa')->with('pesan', ['success','Berhasil Ubah berita']);
    } catch(\Exception $e){
        dd($e->getMessage());
        return redirect('/kaumbapa')->with('pesan', ['danger','Berita Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'deskripsi' => 'required',
        'jadwal_ibadah' => 'required'
    ]);
    $KaumBapa = new KaumBapa();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $KaumBapa->gambar = $namaGambar;
    $KaumBapa->deskripsi = $request->deskripsi;
    $KaumBapa->jadwal_ibadah = $request->jadwal_ibadah;
    $KaumBapa->save();

    return redirect(url('/kaumbapa'));
}

    public function add()
    {
        return view('content.kaumbapa.add');
    }
    public function delete(Request $request)
    {
        $idKaumBapa = $request->id;
        $KaumBapa = KaumBapa::find($idKaumBapa);
        if ($KaumBapa === null) {
            return response()->json([], 404);
        }
        
        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $KaumBapa->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    
        // Hapus entri dari database
        $KaumBapa->delete();
        
        return response()->json([], 200);
    }
}
