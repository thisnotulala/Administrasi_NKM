<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_equipment' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Equipment::create($request->all());

        return redirect()->route('equipment.index')->with('success', 'Equipment berhasil ditambahkan!');
    }

    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipment.show', compact('equipment'));
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'nama_equipment' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipment.index')->with('success', 'Equipment berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Equipment::destroy($id);

        return redirect()->route('equipment.index')->with('success', 'Equipment berhasil dihapus!');
    }

    public function exportPdf()
    {
        $equipment = Equipment::all();

        $pdf = Pdf::loadView('equipment.pdf', compact('equipment'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-equipment.pdf');
    }
}
