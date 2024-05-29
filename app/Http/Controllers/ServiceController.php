<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list()
    {
        $services = Service::query()->paginate(10);
        return view('content.service.list', [
            'services' => $services
        ]);
    }
    public function edit(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service === null) {
            abort(404);
        }
        return view('content.service.edit', [
            'service' => $service
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required', 
        'link_streaming' => 'required|url'
    ]);

    $services = Service::find($request->id);
    if ($services === null) {
        abort(404);
    }

    // Menghapus gambar lama
    if ($request->hasFile('gambar')) {
        $oldImagePath = storage_path('app/public/images/' . $services->gambar);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }

    // Memperbarui data Home
    $services->link_streaming = $request->link_streaming;
    
    if($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/images');
        $gambarName = $request->file('gambar')->hashName(); 
        // Simpan nama file gambar atau path lengkapnya, tergantung pada kebutuhan aplikasi Anda
        $services->gambar = $gambarName; // Simpan nama file gambar saja
        // $homes->gambar = $gambarPath; // Simpan path lengkap gambar
    } 
    
    try{
        $services->save();
        // Langsung menuju ke URL yang diinginkan tanpa menggunakan nama route
        return redirect('/services')->with('pesan', ['success','Berhasil Ubah berita']);
    } catch(\Exception $e){
        // Cetak pesan kesalahan untuk membantu men-debug
        dd($e->getMessage());
        // Redirect ke halaman yang sesuai dengan pesan kesalahan tertentu
        return redirect('/services')->with('pesan', ['danger','Berita Tidak Berhasil di Ubah']);
    }
}




public function insert(Request $request)
{
    $validated = $request->validate([
        'gambar' => 'image|required',
        'link_streaming' => 'required|url'
    ]);
    $services = new Service();

    // Menyimpan gambar
    $gambarPath = $request->file('gambar')->store('public/images');
    $namaGambar = $request->file( 'gambar' )->hashName();

    $services->gambar = $namaGambar;
    $services->link_streaming = $request->link_streaming;
    $services->save();

    return redirect(url('/services'));
}

    public function add()
    {
        return view('content.service.add');
    }
    public function delete(Request $request)
{
    $idService = $request->id;
    $service = Service::find($idService);
    if ($service === null) {
        return response()->json([], 404);
    }
    
    // Hapus gambar dari penyimpanan
    $oldImagePath = storage_path('app/public/images/' . $service->gambar);
    if (File::exists($oldImagePath)) {
        File::delete($oldImagePath);
    }

    // Hapus entri dari database
    $service->delete();
    
    return response()->json([], 200);
}

}
