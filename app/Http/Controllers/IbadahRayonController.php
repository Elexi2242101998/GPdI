<?php

namespace App\Http\Controllers;

use App\Models\IbadahRayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IbadahRayonController extends Controller
{
    public function list()
    {
        $rayon = IbadahRayon::paginate(10);
        return view('content.rayon.list', [
            'rayon' => $rayon
        ]);
    }

    public function edit(Request $request, $id)
    {
        $rayon = IbadahRayon::find($id);
        if ($rayon === null) {
            abort(404);
        }
        return view('content.rayon.edit', [
            'rayon' => $rayon
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $rayon = IbadahRayon::find($request->id);
        if ($rayon === null) {
            abort(404);
        }

        // Menghapus gambar lama
        if ($request->hasFile('gambar')) {
            $oldImagePath = storage_path('app/public/images/' . $rayon->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data rayon
        $rayon->deskripsi = $request->deskripsi;
        $rayon->jadwal_ibadah = $request->jadwal_ibadah;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
            $gambarName = $request->file('gambar')->hashName();
            $rayon->gambar = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $rayon->save();
            return redirect('/rayon')->with('pesan', ['success', 'Berhasil Ubah berita']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/rayon')->with('pesan', ['danger', 'Berita Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'deskripsi' => 'required',
            'jadwal_ibadah' => 'required'
        ]);

        $rayon = new IbadahRayon();

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/images');
        $namaGambar = $request->file('gambar')->hashName();

        $rayon->gambar = $namaGambar;
        $rayon->deskripsi = $request->deskripsi;
        $rayon->jadwal_ibadah = $request->jadwal_ibadah;
        $rayon->save();

        return redirect(url('/rayon'));
    }

    public function add()
    {
        return view('content.rayon.add');
    }

    public function delete(Request $request)
    {
        $idRayon = $request->id;
        $rayon = IbadahRayon::find($idRayon);
        if ($rayon === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $rayon->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $rayon->delete();

        return response()->json([], 200);
    }
}
