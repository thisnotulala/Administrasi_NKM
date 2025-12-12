<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sdm;
class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::orderBy('created_at', 'DESC')->get();
        return view('proyek.index', compact('proyek'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('proyek.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'nama_client' => 'nullable|string|max:255',
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
        $sdms = \App\Models\Sdm::all();
        return view('proyek.show', compact('proyek','sdms'));
    }

    public function edit(Proyek $proyek)
    {
        $clients = Client::all();
        return view('proyek.edit', compact('proyek','clients'));
    }


    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'nama_client' => 'nullable|string|max:255',
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
    public function assignCreate($proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        $sdms = Sdm::all();

        return view('proyek.assign.create', compact('proyek', 'sdms'));
    }
    public function assignStore(Request $request, $id)
    {
        $request->validate([
            'sdm_id' => 'required|exists:sdms,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $proyek = Proyek::findOrFail($id);

        // prevent duplicate assignment
        if ($proyek->sdms()->where('sdm_id', $request->sdm_id)->exists()) {
            return back()->with('error', 'SDM sudah diassign ke proyek ini.');
        }

        $sdm = Sdm::findOrFail($request->sdm_id);


        $proyek->sdms()->attach($request->sdm_id, [
            'peran' => $sdm->jabatan, // BENAR → ambil jabatan SDM
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return back()->with('success', 'SDM berhasil ditambahkan ke proyek.');
    }

    public function assignDelete($proyek_id, $sdm_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);

        $proyek->sdms()->detach($sdm_id);

        return back()->with('success', 'SDM berhasil dihapus dari proyek.');
    }

}
