<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Client;
use App\Models\Sdm;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /* =======================
       INDEX
    ======================= */
    public function index()
    {
        $proyek = Proyek::orderBy('created_at', 'DESC')->get();
        return view('proyek.index', compact('proyek'));
    }

    /* =======================
       CREATE
    ======================= */
    public function create()
    {
        $clients = Client::all();
        return view('proyek.create', compact('clients'));
    }

    /* =======================
       STORE
    ======================= */
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek'     => 'required|string|max:255',
            'nama_client'     => 'nullable|string|max:255',
            'lokasi'          => 'nullable|string|max:255',
            'nilai_kontrak'   => 'nullable|numeric',
            'rencana_mulai'   => 'nullable|date',
            'rencana_selesai' => 'nullable|date|after_or_equal:rencana_mulai',
            'status'          => 'required|in:berjalan,selesai,tertunda',
        ]);

        Proyek::create($request->all());

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Proyek berhasil ditambahkan!');
    }

    /* =======================
       SHOW
    ======================= */
    public function show(Proyek $proyek)
    {
        return view('proyek.show', compact('proyek'));
    }

    /* =======================
       EDIT
    ======================= */
    public function edit(Proyek $proyek)
    {
        $clients = Client::all();
        return view('proyek.edit', compact('proyek', 'clients'));
    }

    /* =======================
       UPDATE
    ======================= */
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'nama_proyek'     => 'required|string|max:255',
            'nama_client'     => 'nullable|string|max:255',
            'lokasi'          => 'nullable|string|max:255',
            'nilai_kontrak'   => 'nullable|numeric',
            'rencana_mulai'   => 'nullable|date',
            'rencana_selesai' => 'nullable|date|after_or_equal:rencana_mulai',
            'status'          => 'required|in:berjalan,selesai,tertunda',
        ]);

        $proyek->update($request->all());

        // Jika proyek selesai → SDM kembali tersedia
        if ($request->status === 'selesai') {
            foreach ($proyek->sdms as $sdm) {
                $sdm->update(['status_ketersediaan' => 'tersedia']);
            }
        }

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Proyek berhasil diperbarui!');
    }

    /* =======================
       DESTROY
    ======================= */
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();

        return redirect()
            ->route('proyek.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }

    /* =======================
       ASSIGN SDM - FORM
    ======================= */
    public function assignCreate($proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);

        // hanya SDM yang tersedia
        $sdms = Sdm::where('status_ketersediaan', 'tersedia')->get();

        return view('proyek.assign.create', compact('proyek', 'sdms'));
    }

    /* =======================
       ASSIGN SDM - STORE (FINAL)
    ======================= */
    public function assignStore(Request $request, $proyek_id)
    {
        $request->validate([
            'sdm_id'          => 'required|exists:sdms,id',
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $proyek = Proyek::findOrFail($proyek_id);
        $sdm    = Sdm::findOrFail($request->sdm_id);

        // Cegah assign ganda di proyek yang sama
        if ($proyek->sdms()->where('sdm_id', $sdm->id)->exists()) {
            return redirect()
                ->route('proyek.show', $proyek_id)
                ->with('error', 'SDM sudah diassign ke proyek ini.');
        }

        // Assign SDM
        $proyek->sdms()->attach($sdm->id, [
            'peran'           => $sdm->jabatan,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        // Update status SDM
        $sdm->update([
            'status_ketersediaan' => 'ditugaskan'
        ]);

        return redirect()
            ->route('proyek.show', $proyek_id)
            ->with('success', 'SDM berhasil ditambahkan ke proyek.');
    }

    /* =======================
       ASSIGN SDM - DELETE
    ======================= */
    public function assignDelete($proyek_id, $sdm_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        $sdm    = Sdm::findOrFail($sdm_id);

        // Lepas SDM dari proyek
        $proyek->sdms()->detach($sdm_id);

        // Kembalikan status SDM
        $sdm->update([
            'status_ketersediaan' => 'tersedia'
        ]);

        return redirect()
            ->route('proyek.show', $proyek_id)
            ->with('success', 'SDM berhasil dihapus dari proyek.');
    }
}
