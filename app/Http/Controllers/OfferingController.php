<?php

namespace App\Http\Controllers;

use App\Models\Offering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfferingController extends Controller
{
    public function list()
    {
        $offerings = Offering::query()->paginate(10);
        return view('content.offering.list', [
            'offerings' => $offerings
        ]);
    }
    public function edit(Request $request, $id)
    {
        $offering = Offering::find($id);
        if ($offering === null) {
            abort(404);
        }
        return view('content.offering.edit', [
            'offering' => $offering
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'ayat' => 'required',
        'persembahan' => 'required',
        'janji_iman' => 'required',
        'qris' => 'image|required'
    ]);

    $offering = Offering::find($request->id);
    if ($offering === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('qris')) {
        $oldImagePath = storage_path('app/public/images/' . $offering->qris);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    // Memperbarui data rumah~~
    $offering->ayat = $request->ayat;
    $offering->persembahan = $request->persembahan;
    $offering->janji_iman = $request->janji_iman;
    
    if($request->hasFile('qris')) {
        $gambarPath = $request->file('qris')->store('public/images');
        $gambarName = $request->file('qris')->hashName(); 
        $offering->qris = $gambarName;
    } 
    
    try{
        $offering->save();
        return redirect('/offering')->with('pesan', ['success','offering Ubah berita']);
    } catch(\Exception $e){
        dd($e->getMessage());
        return redirect('/offering')->with('pesan', ['danger','offering Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'ayat' => 'required',
        'persembahan' => 'required',
        'janji_iman' => 'required',
        'qris' => 'image|required'
    ]);
    $offering = new Offering();

    // Menyimpan gambar
    $gambarPath = $request->file('qris')->store('public/images');
    $namaGambar = $request->file( 'qris' )->hashName();

    $offering->qris = $namaGambar;
    $offering->ayat = $request->ayat;
    $offering->persembahan = $request->persembahan;
    $offering->janji_iman = $request->janji_iman;
    $offering->save();

    return redirect(url('/offering'));
}

    public function add()
    {
        return view('content.offering.add');
    }
    public function delete(Request $request)
    {
        $idOffering = $request->id;
        $offering = Offering::find($idOffering);
        if ($offering === null) {
            return response()->json([], 404);
        }
        
        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $offering->qris);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    
        // Hapus entri dari database
        $offering->delete();
        
        return response()->json([], 200);
    }
}
