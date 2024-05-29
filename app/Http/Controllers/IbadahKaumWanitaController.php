<?php

namespace App\Http\Controllers;

use App\Models\KaumWanita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IbadahKaumWanitaController extends Controller
{
    public function list()
    {
        $kaumWanita = KaumWanita::paginate(10);
        return view('content.kaumwanita.list', [
            'kaumwanita' => $kaumWanita
        ]);
    }

    public function edit(Request $request, $id)
    {
        $kaumWanita = KaumWanita::find($id);
        if ($kaumWanita === null) {
            abort(404);
        }
        return view('content.kaumwanita.edit', [
            'kaumwanita' => $kaumWanita
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $kaumWanita = KaumWanita::find($request->id);
        if ($kaumWanita === null) {
            abort(404);
        }

        // Menghapus gambar lama
        if ($request->hasFile('gambar')) {
            $oldImagePath = storage_path('app/public/images/' . $kaumWanita->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data kaum wanita
        $kaumWanita->deskripsi = $request->deskripsi;
        $kaumWanita->jadwal_ibadah = $request->jadwal_ibadah;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
            $gambarName = $request->file('gambar')->hashName();
            $kaumWanita->gambar = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $kaumWanita->save();
            return redirect('/kaumwanita')->with('pesan', ['success', 'Berhasil Ubah berita']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/kaumwanita')->with('pesan', ['danger', 'Berita Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $kaumWanita = new KaumWanita();

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/images');
        $namaGambar = $request->file('gambar')->hashName();

        $kaumWanita->gambar = $namaGambar;
        $kaumWanita->deskripsi = $request->deskripsi;
        $kaumWanita->jadwal_ibadah = $request->jadwal_ibadah;
        $kaumWanita->save();

        return redirect(url('/kaumwanita'));
    }

    public function add()
    {
        return view('content.kaumwanita.add');
    }

    public function delete(Request $request)
    {
        $idKaumWanita = $request->id;
        $kaumWanita = KaumWanita::find($idKaumWanita);
        if ($kaumWanita === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $kaumWanita->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $kaumWanita->delete();

        return response()->json([], 200);
    }
}
