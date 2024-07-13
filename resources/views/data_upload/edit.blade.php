@extends('layouts.app')

@section('title', 'Edit Data Upload')

@section('content')
    <h2>Edit Data Upload</h2>
    <form method="POST" action="{{ route('data_upload.update', $upload->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_bukti">No Bukti</label>
            <input type="text" name="no_bukti" id="no_bukti" class="form-control" value="{{ $upload->no_bukti }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_bukti">Tanggal Bukti</label>
            <input type="date" name="tanggal_bukti" id="tanggal_bukti" class="form-control" value="{{ $upload->tanggal_bukti }}" required>
        </div>
        <div class="form-group">
            <label for="npwp_pemotong">NPWP Pemotong</label>
            <input type="text" name="npwp_pemotong" id="npwp_pemotong" class="form-control" value="{{ $upload->npwp_pemotong }}" required>
        </div>
        <div class="form-group">
            <label for="nama_pemotong">Nama Pemotong</label>
            <input type="text" name="nama_pemotong" id="nama_pemotong" class="form-control" value="{{ $upload->nama_pemotong }}" required>
        </div>
        <div class="form-group">
            <label for="identitas_penerima">Identitas Penerima</label>
            <input type="text" name="identitas_penerima" id="identitas_penerima" class="form-control" value="{{ $upload->identitas_penerima }}" required>
        </div>
        <div class="form-group">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" value="{{ $upload->nama_penerima }}" required>
        </div>
        <div class="form-group">
            <label for="penghasilan_bruto">Penghasilan Bruto</label>
            <input type="number" step="0.01" name="penghasilan_bruto" id="penghasilan_bruto" class="form-control" value="{{ $upload->penghasilan_bruto }}" required>
        </div>
        <div class="form-group">
            <label for="pph">PPH</label>
            <input type="number" step="0.01" name="pph" id="pph" class="form-control" value="{{ $upload->pph }}" required>
        </div>
        <div class="form-group">
            <label for="kode_objek_pajak">Kode Objek Pajak</label>
            <input type="text" name="kode_objek_pajak" id="kode_objek_pajak" class="form-control" value="{{ $upload->kode_objek_pajak }}" required>
        </div>
        <div class="form-group">
            <label for="masa_pajak">Masa Pajak</label>
            <input type="text" name="masa_pajak" id="masa_pajak" class="form-control" value="{{ $upload->masa_pajak }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_pajak">Tahun Pajak</label>
            <input type="number" name="tahun_pajak" id="tahun_pajak" class="form-control" value="{{ $upload->tahun_pajak }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $upload->status }}" required>
        </div>
        <div class="form-group">
            <label for="rev_no">Rev No</label>
            <input type="number" name="rev_no" id="rev_no" class="form-control" value="{{ $upload->rev_no }}" required>
        </div>
        <div class="form-group">
            <label for="posting">Posting</label>
            <input type="text" name="posting" id="posting" class="form-control" value="{{ $upload->posting }}" required>
        </div>
        <div class="form-group">
            <label for="id_sistem">ID Sistem</label>
            <input type="text" name="id_sistem" id="id_sistem" class="form-control" value="{{ $upload->id_sistem }}" required>
        </div>
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
