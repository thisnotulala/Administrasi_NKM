<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Progress;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // HALAMAN PILIH PROYEK
    public function index()
    {
        $proyeks = Proyek::all();
        return view('laporan.index', compact('proyeks'));
    }

    // TAMPILAN LAPORAN (WEB)
    public function show(Proyek $proyek)
    {
        $progress     = Progress::where('proyek_id', $proyek->id)->get();
        $pengeluaran  = Pengeluaran::where('proyek_id', $proyek->id)->get();
        $sdm          = $proyek->sdms;

        return view('laporan.show', compact(
            'proyek',
            'progress',
            'pengeluaran',
            'sdm'
        ));
    }

    // EXPORT PDF LAPORAN PROYEK
    public function exportPdf(Proyek $proyek)
    {
        $progress     = Progress::where('proyek_id', $proyek->id)->get();
        $pengeluaran  = Pengeluaran::where('proyek_id', $proyek->id)->get();
        $sdm          = $proyek->sdms;

        $pdf = Pdf::loadView('laporan.export-pdf', compact(
            'proyek',
            'progress',
            'pengeluaran',
            'sdm'
        ));

        return $pdf->download(
            'Laporan_Proyek_' . $proyek->nama_proyek . '.pdf'
        );
    }
}
