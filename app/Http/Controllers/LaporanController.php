<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Progress;
use App\Models\Pengeluaran;
use App\Models\Sdm;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // HALAMAN PILIH PROYEK
    public function index()
    {
        $proyeks = Proyek::all();
        return view('laporan.index', compact('proyeks'));
    }

    // LAPORAN PER PROYEK
    public function show(Proyek $proyek)
    {
        $progress = Progress::where('proyek_id', $proyek->id)->get();
        $pengeluaran = Pengeluaran::where('proyek_id', $proyek->id)->get();
        $sdm = $proyek->sdms; // relasi many-to-many

        return view('laporan.show', compact(
            'proyek',
            'progress',
            'pengeluaran',
            'sdm'
        ));
    }
}
