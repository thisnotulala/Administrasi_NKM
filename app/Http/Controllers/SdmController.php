<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Sdm;
use App\Models\Proyek;
use Illuminate\Http\Request;

class SdmController extends Controller
{
    /** 
     * LIST SDM
     */
    public function index()
    {
        $sdm = Sdm::latest()->get();
        return view('sdm.index', compact('sdm'));
    }

    /** 
     * FORM TAMBAH SDM
     */
    public function create()
    {
        return view('sdm.create');
    }

    /** 
     * SIMPAN SDM BARU
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Sdm::create($request->all());

        return redirect()->route('sdm.index')->with('success', 'SDM berhasil ditambahkan');
    }

    /** 
     * DETAIL SDM + Riwayat Proyek
     */
    public function show($id)
    {
        $sdm = Sdm::with('proyeks')->findOrFail($id);
        $proyek = Proyek::all(); // untuk dropdown assign

        return view('sdm.show', compact('sdm', 'proyek'));
    }

    /** 
     * EDIT SDM
     */
    public function edit($id)
    {
        $sdm = Sdm::findOrFail($id);
        return view('sdm.edit', compact('sdm'));
    }

    /** 
     * UPDATE SDM
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $sdm = Sdm::findOrFail($id);
        $sdm->update($request->all());

        return redirect()->route('sdm.index')->with('success', 'SDM berhasil diperbarui');
    }

    /** 
     * DELETE SDM
     */
    public function destroy($id)
    {
        Sdm::findOrFail($id)->delete();

        return back()->with('success', 'SDM berhasil dihapus');
    }


    /* ======================================================
     *  FITUR PENUGASAN SDM KE PROYEK
     * ====================================================== */

    /** 
     * SIMPAN ASSIGN SDM KE PROYEK
     */
    public function assignStore(Request $request, $id)
    {
        $sdm = Sdm::findOrFail($id);

        $data = $request->validate([
            'proyek_id' => 'required|exists:proyeks,id',
            'peran' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Cegah duplicate assignment
        if ($sdm->proyeks()->where('proyek_id', $data['proyek_id'])->exists()) {
            return back()->with('warning','SDM sudah ditugaskan pada proyek tersebut');
        }

        $sdm->proyeks()->attach($data['proyek_id'], [
            'peran' => $data['peran'],
            'tanggal_mulai' => $data['tanggal_mulai'],
            'tanggal_selesai' => $data['tanggal_selesai'],
        ]);

        return redirect()->route('sdm.show', $sdm->id)->with('success','SDM berhasil ditugaskan ke proyek');
    }

    /** 
     * HAPUS PENUGASAN
     */
    public function unassign($sdmId, $proyekId)
    {
        $sdm = Sdm::findOrFail($sdmId);
        $sdm->proyeks()->detach($proyekId);

        return back()->with('success','Penugasan berhasil dihapus');
    }

    public function exportPdf()
    {
        $sdm = Sdm::with('proyeks')->orderBy('nama')->get();

        $pdf = Pdf::loadView('sdm.pdf', compact('sdm'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-sdm.pdf');
    }

}
