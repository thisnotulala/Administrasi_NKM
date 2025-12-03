<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('material.index', compact('materials'));
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_material' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        Material::create($request->all());

        return redirect()->route('material.index')->with('success', 'Material berhasil ditambahkan');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('material.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $material->update($request->all());

        return redirect()->route('material.index')->with('success', 'Material berhasil diperbarui');
    }

    public function destroy($id)
    {
        Material::destroy($id);
        return redirect()->route('material.index')->with('success', 'Material berhasil dihapus');
    }
}
