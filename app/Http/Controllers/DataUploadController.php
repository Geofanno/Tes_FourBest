<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use App\Exports\DataUploadExport;
use Barryvdh\DomPDF\Facade as PDF;

class DataUploadController extends Controller
{
    public function index()
    {
        $uploads = DataUpload::all();
        return view('data_upload.index', compact('uploads'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('data_upload.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_bukti' => 'required',
            'tanggal_bukti' => 'required|date',
            'npwp_pemotong' => 'required',
            'nama_pemotong' => 'required',
            'identitas_penerima' => 'required',
            'nama_penerima' => 'required',
            'penghasilan_bruto' => 'required|numeric',
            'pph' => 'required|numeric',
            'kode_objek_pajak' => 'required',
            'masa_pajak' => 'required',
            'tahun_pajak' => 'required|digits:4',
            'status' => 'required',
            'rev_no' => 'required|integer',
            'posting' => 'required',
            'id_sistem' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $user = Auth::user();

        if ($request->hasFile('file')) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            DataUpload::create([
                'no_bukti' => $request->no_bukti,
                'tanggal_bukti' => $request->tanggal_bukti,
                'npwp_pemotong' => $user->npwp,
                'nama_pemotong' => $user->name,
                'identitas_penerima' => $request->identitas_penerima,
                'nama_penerima' => $request->nama_penerima,
                'penghasilan_bruto' => $request->penghasilan_bruto,
                'pph' => $request->pph,
                'kode_objek_pajak' => $request->kode_objek_pajak,
                'masa_pajak' => $request->masa_pajak,
                'tahun_pajak' => $request->tahun_pajak,
                'status' => $request->status,
                'rev_no' => $request->rev_no,
                'posting' => $request->posting,
                'id_sistem' => $request->id_sistem,
                'file_path' => $filePath,
            ]);
        }

        return redirect()->route('data_upload.index')
                         ->with('success', 'Data Upload created successfully.');
    }

    public function show($id)
    {
        $upload = DataUpload::findOrFail($id);
        return view('data_upload.show', compact('upload'));
    }

    public function edit($id)
    {
        $upload = DataUpload::findOrFail($id);
        return view('data_upload.edit', compact('upload'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_bukti' => 'required',
            'tanggal_bukti' => 'required|date',
            'npwp_pemotong' => 'required',
            'nama_pemotong' => 'required',
            'identitas_penerima' => 'required',
            'nama_penerima' => 'required',
            'penghasilan_bruto' => 'required|numeric',
            'pph' => 'required|numeric',
            'kode_objek_pajak' => 'required',
            'masa_pajak' => 'required',
            'tahun_pajak' => 'required|digits:4',
            'status' => 'required',
            'rev_no' => 'required|integer',
            'posting' => 'required',
            'id_sistem' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $upload = DataUpload::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($upload->file_path) {
                Storage::disk('public')->delete($upload->file_path);
            }

            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $upload->file_path = $filePath;
        }

        $upload->update($request->only([
            'no_bukti',
            'tanggal_bukti',
            'npwp_pemotong',
            'nama_pemotong',
            'identitas_penerima',
            'nama_penerima',
            'penghasilan_bruto',
            'pph',
            'kode_objek_pajak',
            'masa_pajak',
            'tahun_pajak',
            'status',
            'rev_no',
            'posting',
            'id_sistem',
        ]));

        return redirect()->route('data_upload.index')
                         ->with('success', 'Data Upload updated successfully.');
    }

    public function destroy($id)
    {
        $upload = DataUpload::findOrFail($id);
        if ($upload->file_path) {
            Storage::disk('public')->delete($upload->file_path);
        }
        $upload->delete();

        return redirect()->route('data_upload.index')
                         ->with('success', 'Data Upload deleted successfully.');
    }

    public function download($id)
    {
        $upload = DataUpload::findOrFail($id);

        if ($upload->file_path) {
            $fileName = $upload->no_bukti . '_' . $upload->npwp_pemotong . '_' . $upload->id_sistem . '_' . time() . '.' . pathinfo($upload->file_path, PATHINFO_EXTENSION);
            return Storage::disk('public')->download($upload->file_path, $fileName);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
