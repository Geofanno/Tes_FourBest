<?php

namespace App\Http\Controllers;

use App\Models\MasterPerusahaan;
use Illuminate\Http\Request;

class MasterPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = MasterPerusahaan::all();
        return view('master_perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('master_perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'npwp' => 'required|unique:master_perusahaans',
        ]);

        MasterPerusahaan::create($request->all());
        return redirect()->route('master_perusahaan.index')
                         ->with('success', 'Master Perusahaan created successfully.');
    }

    public function show(MasterPerusahaan $masterPerusahaan)
    {
        return view('master_perusahaan.show', compact('masterPerusahaan'));
    }

    public function edit(MasterPerusahaan $masterPerusahaan)
    {
        return view('master_perusahaan.edit', compact('masterPerusahaan'));
    }

    public function update(Request $request, MasterPerusahaan $masterPerusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'npwp' => 'required|unique:master_perusahaans,npwp,' . $masterPerusahaan->id,
        ]);

        $masterPerusahaan->update($request->all());
        return redirect()->route('master_perusahaan.index')
                         ->with('success', 'Master Perusahaan updated successfully.');
    }

    public function destroy(MasterPerusahaan $masterPerusahaan)
    {
        $masterPerusahaan->delete();
        return redirect()->route('master_perusahaan.index')
                         ->with('success', 'Master Perusahaan deleted successfully.');
    }
    public function search(Request $request)
    {
        $term = $request->get('term');

        $results = array();

        $queries = MasterPerusahaan::where('nama_perusahaan', 'LIKE', '%' . $term . '%')->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->nama_perusahaan, 'identitas' => $query->npwp];
        }

        return response()->json($results);
    }
}
