<?php

namespace App\Http\Controllers;

use App\Models\OurContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurContactController extends Controller
{
    public function list()
    {
        $contacts = OurContact::paginate(10);
        return view('content.contact.list', [
            'contacts' => $contacts
        ]);
    }

    public function edit(Request $request, $id)
    {
        $contact = OurContact::find($id);
        if ($contact === null) {
            abort(404);
        }
        return view('content.contact.edit', [
            'contact' => $contact
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'web' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'facebook' => 'required|url',
        ]);

        $contact = OurContact::find($request->id);
        if ($contact === null) {
            abort(404);
        }

        // Menghapus gambar lama
        if ($request->hasFile('gambar')) {
            $oldImagePath = storage_path('app/public/images/' . $contact->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data kontak
        $contact->alamat = $request->alamat;
        $contact->email = $request->email;
        $contact->no_telp = $request->no_telp;
        $contact->web = $request->web;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;
        $contact->facebook = $request->facebook;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
            $gambarName = $request->file('gambar')->hashName();
            $contact->gambar = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $contact->save();
            return redirect('/contact')->with('pesan', ['success', 'Berhasil Ubah kontak']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/contact')->with('pesan', ['danger', 'Kontak Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
            'alamat' => 'required',
            'email' => 'required|email|unique:table_our_contact',
            'no_telp' => 'required',
            'web' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'facebook' => 'required|url',
        ]);

        $contact = new OurContact();

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/images');
        $namaGambar = $request->file('gambar')->hashName();

        $contact->gambar = $namaGambar;
        $contact->alamat = $request->alamat;
        $contact->email = $request->email;
        $contact->no_telp = $request->no_telp;
        $contact->web = $request->web;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;
        $contact->facebook = $request->facebook;

        $contact->save();

        return redirect(url('/contact'));
    }

    public function add()
    {
        return view('content.contact.add');
    }

    public function delete(Request $request)
    {
        $idContact = $request->id;
        $contact = OurContact::find($idContact);
        if ($contact === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $contact->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $contact->delete();

        return response()->json([], 200);
    }
}
