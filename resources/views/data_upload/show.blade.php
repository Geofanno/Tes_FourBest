@extends('layouts.app')

@section('title', 'View Data Upload')

@section('content')
    <h2>View Data Upload</h2>
    <p><strong>No Bukti:</strong> {{ $upload->no_bukti }}</p>
    <p><strong>Tanggal Bukti:</strong> {{ $upload->tanggal_bukti }}</p>
    <p><strong>NPWP Pemotong:</strong> {{ $upload->npwp_pemotong }}</p>
    <p><strong>Nama Pemotong:</strong> {{ $upload->nama_pemotong }}</p>
    <p><strong>Identitas Penerima:</strong> {{ $upload->identitas_penerima }}</p>
    <p><strong>Nama Penerima:</strong> {{ $upload->nama_penerima }}</p>
    <p><strong>Penghasilan Bruto:</strong> {{ $upload->penghasilan_bruto }}</p>
    <p><strong>PPH:</strong> {{ $upload->pph }}</p>
    <p><strong>Kode Objek Pajak:</strong> {{ $upload->kode_objek_pajak }}</p>
    <p><strong>Masa Pajak:</strong> {{ $upload->masa_pajak }}</p>
    <p><strong>Tahun Pajak:</strong> {{ $upload->tahun_pajak }}</p>
    <p><strong>Status:</strong> {{ $upload->status }}</p>
    <p><strong>Rev No:</strong> {{ $upload->rev_no }}</p>
    <p><strong>Posting:</strong> {{ $upload->posting }}</p>
    <p><strong>ID Sistem:</strong> {{ $upload->id_sistem }}</p>
    <p><strong>File:</strong>
        @if ($upload->file_path)
            <a href="{{ asset('storage/' . $upload->file_path) }}" target="_blank">Download</a>
        @else
            No File
        @endif
    </p>
    <a href="{{ route('data_upload.index') }}" class="btn btn-secondary">Back</a>
@endsection
