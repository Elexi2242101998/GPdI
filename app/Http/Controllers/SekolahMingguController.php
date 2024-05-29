<?php

namespace App\Http\Controllers;

use App\Models\IbadahSekolahMinggu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SekolahMingguController extends Controller
{
    public function list()
    {
        $sekMing = IbadahSekolahMinggu::query()->paginate(10);
        return view('content.sekming.list', [
            'sekMing' => $sekMing
        ]);
    }
    public function edit(Request $request, $id)
    {
        $sekMing = IbadahSekolahMinggu::find($id);
        if ($sekMing === null) {
            abort(404);
        }
        return view('content.sekming.edit', [
            'sekMing' => $sekMing
        ]);
    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'pelayanan' => 'required',
        'mdya' => 'required',
        'pratama' => 'required'
    ]);

    $sekMing = IbadahSekolahMinggu::find($request->id);
    if ($sekMing === null) {
        abort(404);
    } 
    $sekMing->pelayanan = $request->pelayanan;
    $sekMing->mdya = $request->mdya;
    $sekMing->pratama = $request->pratama;
    $sekMing->save();
    
    try{
        $sekMing->save();
        // Langsung menuju ke URL yang diinginkan tanpa menggunakan nama route
        return redirect('/sekolahminggu')->with('pesan', ['success','Berhasil Ubah Data Sekolah Minggu']);
    } catch(\Exception $e){
        // Cetak pesan kesalahan untuk membantu men-debug
        dd($e->getMessage());
        // Redirect ke halaman yang sesuai dengan pesan kesalahan tertentu
        return redirect('/sekolahminggu')->with('pesan', ['danger','Data Sekolah Minggu Tidak Berhasil di Ubah']);
    }
}

public function insert(Request $request)
{
    $validated = $request->validate([
        'pelayanan' => 'required',
        'mdya' => 'required',
        'pratama' => 'required',
    ]);
    $sekMing = new IbadahSekolahMinggu();
    $sekMing->pelayanan = $request->pelayanan;
    $sekMing->mdya = $request->mdya;
    $sekMing->pratama = $request->pratama;
    $sekMing->save();

    return redirect(url('/sekolahminggu'));
}

    public function add()
    {
        return view('content.sekming.add');
    }
    public function delete(Request $request)
    {
        $idSekMing = $request->id;
        $sekMing = IbadahSekolahMinggu::find($idSekMing);
        if ($sekMing === null) {
            return response()->json([], 404);
        }
        $sekMing->delete();
        return response()->json([], 200);
    }
}