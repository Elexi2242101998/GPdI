<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; // Assuming the model is named Schedule
use Illuminate\Support\Facades\File;

class ScheduleController extends Controller
{
    public function list()
    {
        $schedules = Schedule::paginate(10); // Updated model name
        return view('content.schedule.list', [
            'schedules' => $schedules // Updated variable name
        ]);
    }

    public function edit(Request $request, $id)
    {
        $schedule = Schedule::find($id); // Updated model name
        if ($schedule === null) {
            abort(404);
        }
        return view('content.schedule.edit', [
            'schedule' => $schedule // Updated variable name
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
        ]);

        $schedule = Schedule::find($request->id); // Updated model name
        if ($schedule === null) {
            abort(404);
        }

        // Menghapus gambar lama
        if ($request->hasFile('gambar')) {
            $oldImagePath = storage_path('app/public/images/' . $schedule->gambar); // Updated field name
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Memperbarui data schedule
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/images');
            $gambarName = $request->file('gambar')->hashName();
            $schedule->gambar = $gambarName; // Simpan nama file gambar saja
        }

        try {
            $schedule->save();
            return redirect('/schedule')->with('pesan', ['success', 'Berhasil Ubah Schedule']);
        } catch (\Exception $e) {
            return redirect('/schedule')->with('pesan', ['danger', 'Schedule Tidak Berhasil di Ubah']);
        }
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'image|required',
        ]);

        $schedule = new Schedule(); // Updated model name

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/images');
        $namaGambar = $request->file('gambar')->hashName();

        $schedule->gambar = $namaGambar;

        $schedule->save();

        return redirect(url('/schedule'));
    }

    public function add()
    {
        return view('content.schedule.add');
    }

    public function delete(Request $request)
    {
        $idSchedule = $request->id;
        $schedule = Schedule::find($idSchedule); // Updated model name
        if ($schedule === null) {
            return response()->json([], 404);
        }

        // Hapus gambar dari penyimpanan
        $oldImagePath = storage_path('app/public/images/' . $schedule->gambar); // Updated field name
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Hapus entri dari database
        $schedule->delete();

        return response()->json([], 200);
    }
}
