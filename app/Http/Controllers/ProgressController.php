<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Progress;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $progress = Progress::with('proyek')->latest()->get();
        return view('progress.index', compact('progress'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('progress.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'   => 'required',
            'persentase'  => 'required|integer|min:0|max:100',
            'keterangan'  => 'nullable',
            'foto'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'validasi' => 'pending',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('progress', 'public');
        }

        Progress::create([
            'proyek_id'   => $request->proyek_id,
            'persentase'  => $request->persentase,
            'keterangan'  => $request->keterangan,
            'foto'        => $foto,
            'validasi'    => 'pending',
            'dibuat_oleh' => Auth::id(),
        ]);

        return redirect('/progress')->with('success', 'Progress berhasil ditambahkan');
    }

    public function show($id)
    {
        $p = Progress::with(['proyek', 'user'])->findOrFail($id);
        return view('progress.show', compact('p'));
    }

    /* ======================
       ACC PROGRESS
    ====================== */
    public function validateProgress($id)
    {
        $p = Progress::findOrFail($id);

        if ($p->validasi === 'valid') {
        return redirect()->route('progress.index')
            ->with('info', 'Progress sudah disetujui.');
        }

        $p->update([
            'validasi' => 'valid'
        ]);

        return back()->with('success', 'Progress berhasil disetujui');
    }

    /* ======================
       TOLAK PROGRESS
    ====================== */
    public function revisiProgress(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required'
        ]);

        $p = Progress::findOrFail($id);

        if ($p->validasi === 'valid') {
            return back()->with('info', 'Progress yang sudah disetujui tidak bisa ditolak.');
        }
        $p->update([
            'validasi' => 'ditolak',
            'alasan'   => $request->alasan
        ]);


        return back()->with('warning', 'Progress ditolak dan diminta revisi');
    }

    public function exportPdf()
    {
        $progress = Progress::with(['proyek', 'user'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $pdf = Pdf::loadView('progress.pdf', compact('progress'))
                ->setPaper('A4', 'landscape');

        return $pdf->download('laporan-progress-proyek.pdf');
    }

}
