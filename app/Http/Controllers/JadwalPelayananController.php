<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JadwalPelayananController extends Controller
{
    public function list()
    {
        $JadwalPelayanan = JadwalPelayanan::query()->paginate(10);
        return view('content.jadwalpelayanan.list', [
            'jadwalpelayanan' => $JadwalPelayanan
        ]);
    }
    public function edit(Request $request, $id)
    {
        $JadwalPelayanan = JadwalPelayanan::find($id);
        if ($JadwalPelayanan === null) {
            abort(404);
        }
        return view('content.jadwalpelayanan.edit', [
            'jadwalpelayanan' => $JadwalPelayanan
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required'
    ]);

    $JadwalPelayanan = JadwalPelayanan::find($request->id);
    if ($JadwalPelayanan === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $JadwalPelayanan->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        $JadwalPelayanan->gambar = $gambarName; // Simpan nama file gambar saja
    } 
    
    try{
        $JadwalPelayanan->save();
        return redirect('/jadwalpelayanan')->with('pesan', ['success','Berhasil Ubah berita']);
    } catch(\Exception $e){
        dd($e->getMessage());
        return redirect('/jadwalipelayanan')->with('pesan', ['danger','Berita Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required'
    ]);
    $JadwalPelayanan = new JadwalPelayanan();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $JadwalPelayanan->gambar = $namaGambar;
    $JadwalPelayanan->save();

    return redirect(url('/jadwalpelayanan'));
}

    public function add()
    {
        return view('content.jadwalpelayanan.add');
    }
    public function delete(Request $request)
    {
        $idJadwal = $request->id;
        $JadwalPelayanan = JadwalPelayanan::find($idJadwal);
        if ($JadwalPelayanan === null) {
            return response()->json([], 404);
        }
        
        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $JadwalPelayanan->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    
        // Hapus entri dari database
        $JadwalPelayanan->delete();
        
        return response()->json([], 200);
    }
}
