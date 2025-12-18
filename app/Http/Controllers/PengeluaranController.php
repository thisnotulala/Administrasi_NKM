<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pengeluaran;
use App\Models\Proyek;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::with('proyek', 'user')
            ->orderBy('tanggal', 'DESC')
            ->get();

        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('pengeluaran.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'jumlah' => 'required|numeric|min:0',
        ]);

        Pengeluaran::create([
            'proyek_id' => $request->proyek_id,
            'tanggal' => $request->tanggal,
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'dibuat_oleh' => auth()->id(),
        ]);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::with(['proyek', 'user'])->findOrFail($id);
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $proyek = Proyek::all();

        return view('pengeluaran.edit', compact('pengeluaran', 'proyek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proyek_id' => 'required',
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pengeluaran::findOrFail($id)->delete();

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil dihapus');
    }

    public function exportPdf()
    {
        $pengeluaran = Pengeluaran::with(['proyek', 'user'])
            ->orderBy('tanggal', 'DESC')
            ->get();

        $total = $pengeluaran->sum('jumlah');

        $pdf = Pdf::loadView('pengeluaran.pdf', compact('pengeluaran', 'total'))
                ->setPaper('A4', 'landscape');

        return $pdf->download('laporan-pengeluaran.pdf');
    }

}
