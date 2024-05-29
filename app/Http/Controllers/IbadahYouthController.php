<?php

namespace App\Http\Controllers;

use App\Models\IbadahYouth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IbadahYouthController extends Controller
{
    public function list()
    {
        $youth = IbadahYouth::paginate(10);
        return view('content.youth.list', [
            'youth' => $youth
        ]);
    }

    public function edit(Request $request, $id)
    {
        $youth = IbadahYouth::find($id);
        if ($youth === null) {
            abort(404);
        }
        return view('content.youth.edit', [
            'youth' => $youth
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $youth = IbadahYouth::find($request->id);
        if ($youth === null) {
            abort(404);
        }

        // Menghapus gambar lama
        if ($request->hasFile('gambar')) {
            $oldImagePath = storage_path('app/public/images/' . $youth->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data youth
        $youth->deskripsi = $request->deskripsi;
        $youth->jadwal_ibadah = $request->jadwal_ibadah;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
            $gambarName = $request->file('gambar')->hashName();
            $youth->gambar = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $youth->save();
            return redirect('/youth')->with('pesan', ['success', 'Berhasil Ubah berita']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/youth')->with('pesan', ['danger', 'Berita Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $youth = new IbadahYouth();

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/images');
        $namaGambar = $request->file('gambar')->hashName();

        $youth->gambar = $namaGambar;
        $youth->deskripsi = $request->deskripsi;
        $youth->jadwal_ibadah = $request->jadwal_ibadah;
        $youth->save();

        return redirect(url('/youth'));
    }

    public function add()
    {
        return view('content.youth.add');
    }

    public function delete(Request $request)
    {
        $idYouth = $request->id;
        $youth = IbadahYouth::find($idYouth);
        if ($youth === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $youth->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $youth->delete();

        return response()->json([], 200);
    }  
}
