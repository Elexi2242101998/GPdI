<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilPendeta; // Assuming the model is named ProfilPendeta
use Illuminate\Support\Facades\File;

class ProfilPendetaController extends Controller
{
    public function list()
    {
        $profilPendeta = ProfilPendeta::paginate(10); // Updated model name
        return view('content.profil_pendeta.list', [
            'profilPendeta' => $profilPendeta // Updated variable name
        ]);
    }

    public function edit(Request $request, $id)
    {
        $profilPendeta = ProfilPendeta::find($id); // Updated model name
        if ($profilPendeta === null) {
            abort(404);
        }
        return view('content.profil_pendeta.edit', [
            'profilPendeta' => $profilPendeta // Updated variable name
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'foto_pendeta' => 'image|required',
            'nama_pendeta' => 'required|string',
            'moto' => 'required|string',
            'instagram' => 'required|url',
            'wa' => 'required|string',
            'facebook' => 'required|url',
        ]);

        $profilPendeta = ProfilPendeta::find($request->id); // Updated model name
        if ($profilPendeta === null) {
            abort(404);
        }

        // Menghapus foto lama
        if ($request->hasFile('foto_pendeta')) {
            $oldImagePath = storage_path('app/public/images/' . $profilPendeta->foto_pendeta); // Updated field name
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data profil pendeta
        $profilPendeta->nama_pendeta = $request->nama_pendeta; // Updated field name
        $profilPendeta->moto = $request->moto; // Updated field name
        $profilPendeta->instagram = $request->instagram; // Updated field name
        $profilPendeta->wa = $request->wa; // Updated field name
        $profilPendeta->facebook = $request->facebook; // Updated field name
        if ($request->hasFile('foto_pendeta')) {
            $gambarPath = $request->file('foto_pendeta')->store('public/images');
            $gambarName = $request->file('foto_pendeta')->hashName();
            $profilPendeta->foto_pendeta = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $profilPendeta->save();
            return redirect('/profilependeta')->with('pesan', ['success', 'Berhasil Ubah Profil Pendeta']);
        } catch (\Exception $e) {
            return redirect('/profilependeta')->with('pesan', ['danger', 'Profil Pendeta Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'foto_pendeta' => 'image|required',
            'nama_pendeta' => 'required|string',
            'moto' => 'required|string',
            'instagram' => 'required|url',
            'wa' => 'required|string',
            'facebook' => 'required|url',
        ]);

        $profilPendeta = new ProfilPendeta(); // Updated model name

        // Menyimpan foto
        $gambarPath = $request->file('foto_pendeta')->store('public/images');
        $namaGambar = $request->file('foto_pendeta')->hashName();
        $profilPendeta->foto_pendeta = $namaGambar;
        $profilPendeta->nama_pendeta = $request->nama_pendeta; // Updated field name
        $profilPendeta->moto = $request->moto; // Updated field name
        $profilPendeta->instagram = $request->instagram; // Updated field name
        $profilPendeta->wa = $request->wa; // Updated field name
        $profilPendeta->facebook = $request->facebook; // Updated field name

        $profilPendeta->save();

        return redirect(url('/profilependeta'));
    }

    public function add()
    {
        return view('content.profil_pendeta.add');
    }

    public function delete(Request $request)
    {
        $idProfilPendeta = $request->id;
        $profilPendeta = ProfilPendeta::find($idProfilPendeta); // Updated model name
        if ($profilPendeta === null) {
            return response()->json([], 404);
        }

        // Hapus foto dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $profilPendeta->foto_pendeta); // Updated field name
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $profilPendeta->delete();

        return response()->json([], 200);
    }
}
