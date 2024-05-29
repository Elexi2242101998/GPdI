<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbadahMingguRaya; // Assuming the model is named IbadahMingguRaya
use App\Models\MingguRaya;
use Illuminate\Support\Facades\File;

class IbadahMingguRayaController extends Controller
{
    public function list()
    {
        $ibadahMingguRaya = MingguRaya::paginate(10); // Updated model name
        return view('content.ibadah_minggu_raya.list', [
            'ibadahMingguRaya' => $ibadahMingguRaya // Updated variable name
        ]);
    }

    public function edit(Request $request, $id)
    {
        $ibadahMingguRaya = MingguRaya::find($id); // Updated model name
        if ($ibadahMingguRaya === null) {
            abort(404);
        }
        return view('content.ibadah_minggu_raya.edit', [
            'ibadahMingguRaya' => $ibadahMingguRaya // Updated variable name
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'pelayanan' => 'required|string',
            'ibadah_raya1' => 'required|string',
            'ibadah_raya2' => 'required|string',
        ]);

        $ibadahMingguRaya = MingguRaya::find($request->id); // Updated model name
        if ($ibadahMingguRaya === null) {
            abort(404);
        }

        // Memperbarui data ibadah minggu raya
        $ibadahMingguRaya->pelayanan = $request->pelayanan;
        $ibadahMingguRaya->ibadah_raya1 = $request->ibadah_raya1;
        $ibadahMingguRaya->ibadah_raya2 = $request->ibadah_raya2;

        try {
            $ibadahMingguRaya->save();
            return redirect('/mingguraya')->with('pesan', ['success', 'Berhasil Ubah Ibadah Minggu Raya']);
        } catch (\Exception $e) {
            return redirect('/mingguraya')->with('pesan', ['danger', 'Ibadah Minggu Raya Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'pelayanan' => 'required|string',
            'ibadah_raya1' => 'required|string',
            'ibadah_raya2' => 'required|string',
        ]);

        $ibadahMingguRaya = new MingguRaya(); // Updated model name

        $ibadahMingguRaya->pelayanan = $request->pelayanan;
        $ibadahMingguRaya->ibadah_raya1 = $request->ibadah_raya1;
        $ibadahMingguRaya->ibadah_raya2 = $request->ibadah_raya2;
        $ibadahMingguRaya->save();

        return redirect(url('/mingguraya'));
    }

    public function add()
    {
        return view('content.ibadah_minggu_raya.add');
    }

    public function delete(Request $request)
    {
        $idIbadahMingguRaya = $request->id;
        $ibadahMingguRaya = MingguRaya::find($idIbadahMingguRaya); // Updated model name
        if ($ibadahMingguRaya === null) {
            return response()->json([], 404);
        }

        // Hapus entri dari database
        $ibadahMingguRaya->delete();

        return response()->json([], 200);
    }
}
