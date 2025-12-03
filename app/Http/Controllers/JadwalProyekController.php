<?php

namespace App\Http\Controllers;

use App\Models\JadwalProyek;
use App\Models\LogJadwalProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalProyekController extends Controller
{
    public function index()
    {
        $jadwal = JadwalProyek::with('proyek')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        JadwalProyek::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal proyek berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalProyek::findOrFail($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalProyek::findOrFail($id);

        // simpan log sebelum update
        LogJadwalProyek::create([
            'jadwal_id' => $jadwal->id,
            'tanggal_mulai_lama' => $jadwal->tanggal_mulai,
            'tanggal_mulai_baru' => $request->tanggal_mulai,
            'tanggal_selesai_lama' => $jadwal->tanggal_selesai,
            'tanggal_selesai_baru' => $request->tanggal_selesai,
            'user_id' => Auth::id(),
        ]);

        // update data
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal diperbarui dan log disimpan');
    }

    public function show($id)
    {
        $jadwal = JadwalProyek::with('logs.user')->findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    public function destroy($id)
    {
        JadwalProyek::destroy($id);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
