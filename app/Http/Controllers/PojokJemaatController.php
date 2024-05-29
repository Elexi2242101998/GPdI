<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PojokJemaat; // Import model PojokJemaat
use Illuminate\Support\Facades\File;

class PojokJemaatController extends Controller
{
    public function list()
    {
        $pojokJemaat = PojokJemaat::paginate(10); // Ganti nama model
        return view('content.pojok_jemaat.list', [
            'pojokJemaat' => $pojokJemaat // Ganti nama variabel
        ]);
    }

    public function edit(Request $request, $id)
    {
        $pojokJemaat = PojokJemaat::find($id); // Ganti nama model
        if ($pojokJemaat === null) {
            abort(404);
        }
        return view('content.pojok_jemaat.edit', [
            'pojokJemaat' => $pojokJemaat // Ganti nama variabel
        ]);
    }

    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Validasi untuk file video
    ]);

    $pojokJemaat = PojokJemaat::find($request->id); // Ganti nama model
    if ($pojokJemaat === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $pojokJemaat->gambar); // Ganti nama field
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
    // Menghapus video lama
    if ($request->hasFile('video')) {
        $oldVideoPath = storage_path('app/public/videos/' . $pojokJemaat->video); // Ganti nama field
        if (File::exists($oldVideoPath)) {
            File::delete($oldVideoPath);
        }
    }

    // Memperbarui data pojok jemaat
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = basename($gambarPath);
        $pojokJemaat->gambar = $gambarName; // Simpan nama file gambar saja
    }

    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('public/videos'); // Simpan video di folder yang berbeda
        $videoName = basename($videoPath);
        $pojokJemaat->video = $videoName; // Simpan nama file video saja
    }

    try {
        $pojokJemaat->save();
        return redirect('/pojokjemaat')->with('pesan', ['success', 'Berhasil Ubah kontak']);
    } catch (\Exception $e) {
        dd($e->getMessage());
        return redirect('/pojokjemaat')->with('pesan', ['danger', 'Kontak Tidak Berhasil di Ubah']);
    }
}

public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Validasi untuk file video
    ]);

    $pojokJemaat = new PojokJemaat(); // Ganti nama model jika diperlukan

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = basename($gambarPath);

    // Menyimpan video
    $videoPath = $request->file('video')->store('public/videos'); // Simpan video di folder yang berbeda
    $namaVideo = basename($videoPath);

    // Menyimpan nama file ke database
    $pojokJemaat->gambar = $namaGambar; // Ganti nama field jika diperlukan
    $pojokJemaat->video = $namaVideo; // Ganti nama field jika diperlukan

    $pojokJemaat->save();

    return redirect(url('/pojokjemaat'));
}


    public function add()
    {
        return view('content.pojok_jemaat.add');
    }

    public function delete(Request $request)
    {
        $idPojokJemaat = $request->id;
        $pojokJemaat = PojokJemaat::find($idPojokJemaat); // Ganti nama model
        if ($pojokJemaat === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $pojokJemaat->gambar); // Ganti nama field
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $pojokJemaat->delete();

        return response()->json([], 200);
    }
}
