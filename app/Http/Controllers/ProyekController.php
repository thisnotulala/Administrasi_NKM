<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::orderBy('created_at', 'DESC')->get();
        return view('proyek.index', compact('proyek'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'pemilik_proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nilai_kontrak' => 'nullable|numeric',
            'rencana_mulai' => 'nullable|date',
            'rencana_selesai' => 'nullable|date|after_or_equal:rencana_mulai',
            'status' => 'required|in:berjalan,selesai,tertunda',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function show(Proyek $proyek)
    {
        return view('proyek.show', compact('proyek'));
    }

    public function edit(Proyek $proyek)
    {
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'pemilik_proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nilai_kontrak' => 'nullable|numeric',
            'rencana_mulai' => 'nullable|date',
            'rencana_selesai' => 'nullable|date|after_or_equal:rencana_mulai',
            'status' => 'required|in:berjalan,selesai,tertunda',
        ]);

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
