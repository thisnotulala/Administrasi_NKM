<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::all();
        return view('proyek.index', compact('proyek'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
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
        $proyek->update($request->all());
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diupdate!');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
